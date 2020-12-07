<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Product;
use Illuminate\Support\Str;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','web']);
    }

    public function addToCart(Product $product)
    {
        $cart = \Cart::session(auth()->id())->add(
            [
                'id' => $product->product_id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product,
            ]
        );

        // alert()->success('success','Item added to cart');
        // return back();

         return response()->json([
                'msg' => 'Added to cart'
                ]);

    }

    public function index()
    {
        $items =\Cart::session(auth()->id())->getContent();
        return view('frontend.cart',[
            'items' => $items,
        ]);
    }

    public function update(Request $request, $item)
    {
        $this->validate($request,[
            'quantity' => 'required|numeric|gt:0',
        ]);

        \Cart::session(auth()->id())->update($item, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity,
            ))
        );

        return back();

    }


    public function destroy($item)
    {
        \Cart::session(auth()->id())->remove($item);

        // return back();
        return response()->json([
                'msg' => 'Removed'
                ]);
    }

    public function returnCartCount(){

        $count = \Cart::session(auth()->id())->getContent()->count();
        
       
        
         return response()->json([
                'count' => $count,
                'msg' => 'Added to cart'
                ]);
    }

}
