<?php

namespace App\Http\Controllers;

use App\Notifications\OrderNotification;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Support\Paystacks;
use Jenssegers\Agent\Agent;

class OrderController extends Controller
{
    public $order;
    public $paystack;

    public function __construct(Order $order)
    {
        $this->middleware(['web','auth']);
        $this->order = $order;
        $this->paystack = new Paystacks();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->order;
        // dd($orders);
        return view('frontend.orders',[
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Cart::session(auth()->id())->getContent()->count()){
            return redirect('/cart');
        }
        $items = \Cart::session(auth()->id())->getContent();

        $agent = new Agent();
        if ($agent->isMobile()) {
            return view('frontend.mobile.checkout',[
                'items' => $items,
            ]);
        }else{
            return view('frontend.checkout',[
                'items' => $items,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fullname' => 'required|regex:/^[A-Za-z0-9_.,\'\"() ]+$/',
            'address' => 'required|regex:/^[A-Za-z0-9_.,\'\"() ]+$/',
            'city' => 'required|regex:/^[A-Za-z0-9_.,\'\"() ]+$/',
            'phone' => 'required|numeric',
        ]);

        $data = [
            'order_id' => 'Order-'.Str::random(6),
            'shipping_fullname' => $request->fullname,
            'shipping_address' => $request->address,
            'shipping_city' => $request->city,
            'shipping_phone' => $request->phone,
            'grand_total' => \Cart::session(auth()->id())->getTotal(),
            'item_count' => \Cart::session(auth()->id())->getContent()->count(),
            'status' => 'pending',
        ];

        $ordered = auth()->user()->order()->create($data);

        //Order Items
        $orderItems = \Cart::session(auth()->id())->getContent();

        foreach($orderItems as $item){
            $ordered->items()->attach($ordered->order_id,[
                'product_id'=> $item->id,
                'price' => $item->price,
                'quantity' => $item->quantity,
            ]);
        }

        //User Email Notitification
        auth()->user()->notify(new OrderNotification($ordered, $orderItems));

        //Clear cart list
        \Cart::session(auth()->id())->clear();

        return redirect()->route('order.payment',$ordered->order_id);
    }

    public function payment(Order $order)
    {
        return view('frontend.payment',[
            'order' => $order
        ]);
    }

    public function processPayment(Request $request, Order $order)
    {
        if($request->payment_method=='card'){
            $order->fill([
                'payment_method' => 'card',
            ])->save();
            return $this->paystack($request, $order);
        }

        if($request->payment_method == 'on_delivery'){
            $order->fill([
                'payment_method' => 'on_delivery',
            ])->save();
            return $this->payOnDelivery($order);
        }
    }

    private function paystack(Request $request, Order $order)
    {
        $data =array(
            '_token' => csrf_token(),
            'email' => auth()->user()->email,
            'amount' => $order->grand_total,
            'quantity' => 1,
            'currency' => 'NGN',
            'metadata' => json_encode($array = ['type' => 'order', 'order_id' => $order->order_id]),
                'reference' => $this->paystack->genTranxRef(),
            'orderID' => $order->order_id,
            );

        $request->request->add($data);
        // dd($request);
        // $request->request->remove('payment_method');

        try {
            return $this->paystack->getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            alert()->error('The paystack token has expired. Please refresh the page and try again.'.$e)->persistent('close');
            return redirect()->back();
        }
    }

    public function handleGatewayCallback()
    {
        $paymentData = $this->paystack->getPaymentData();
        $data = $paymentData['data'];

        if($data['status']=='success'){
            $order = Order::find($data['metadata']['order_id']);
            $order->fill([
                'status' => 'processing',
                'is_paid' => 1,
            ])->save();

            return redirect()->route('order.confirmation', $order->order_id);
        }
    }

    private function payOnDelivery(Order $order)
    {
        if($order->is_paid){
            return redirect('/order');
        }

        $order->fill([
            'status' => 'processing',
        ])->save();

        return redirect()->route('order.confirmation', $order->order_id);

    }

    public function confirmation(Order $order)
    {
        if($order->payment_method=='card'){
            return $this->cardConfirmation($order);
        }

        if($order->payment_method == 'on_delivery'){
            return $this->onDeliveryConfirmation($order);
        }
    }

    private function cardConfirmation($order)
    {
        return  view('frontend.cardConfirmation', [
            'order' => $order,
        ]);
    }

    private function onDeliveryConfirmation($order)
    {
        return  view('frontend.onDeliveryConfirmation', [
            'order' => $order,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $item = $order->items->each(function($query){
            return $query;
        });
        return $item;
    }
}
