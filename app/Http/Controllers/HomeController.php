<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\User;
use App\Product;
use Jenssegers\Agent\Agent;



class HomeController extends Controller
{
    public $user, $shop, $product;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Shop $shop, Product $product)
    {
        $this->user = $user;
        $this->shop = $shop;
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendors = $this->user->role('vendors')->where('status','active')->get();
        $shops = $vendors->map(function($query){
            return $query->shop;
        });


        //using jessengers Agent to check for mobile view
        $agent = new Agent();
//        dd($agent->isMobile());


        if( $agent->isMobile()){
            //display if mobile
             return view('frontend.mobile.index');

        }else{
            //display if desktop
            return view('frontend.index',[
            'shops' => $shops,
            ]);
        }
        
    }

    public function shop(Shop $shop)
    {
        if(!$shop){
            abort(404);
        }
        return view('frontend.shop',[
            'shop' => $shop,
        ]);

    }


    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function shops()
    {
        $vendors = $this->user->role('vendors')->where('status','active')->get();
        $shops = $vendors->map(function($query){
            return $query->shop;
        });

        return view('frontend.shops',[
            'shops' => $shops,
        ]);
    }

    public function search()
    {
        $search = request()->detail;
        $query = $this->product->query();

        if ($search) {
            $query->where(function ($value) use ($search) {
                $value->where('product_name', 'like', "%{$search}%");
                $value->orWhere('product_description', 'like', "%{$search}%");
            });
        }

        $query_output = $query->with(['shop'=>function($query){
            $query->select('shop_address', 'shop_city', 'shop_id','shop_name');
        }])->select('shop_id','product_id','product_image','product_name','product_price')->get();

        return $query_output;
    }

    public function placeSearch()
    {
        $search = request()->search_place;
        $query = $this->shop->query();

        if(!$search){
            $search = request()->autocomplete;

            if(!$search){
                return back();
            }
        }

        $query->where(function ($value) use ($search) {
            $value->where('shop_city', 'like', "%{$search}%");
            $value->orWhere('shop_address', 'like', "%{$search}%");
        });

        $shops = $query->whereHas('user',function($query){
            $query->where('status','active');
        })->get();

        return view('frontend.shop-search',[
            'shops' => $shops,
            'location' => $search,
        ]);
    }

}
