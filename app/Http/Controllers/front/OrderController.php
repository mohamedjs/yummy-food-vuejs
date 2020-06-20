<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\Order_detail;
use App\Category;
use App\About_us;
use App\Blog;
use Auth;
use App;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $main_active = 'home' ;
         $sub_active = 'home' ;
         $categorys = Category::all();
         $about = About_us::first();
         $blogs = Blog::all();
         $products = Product::all();
         $carts = Cart::where('user_id',Auth::id())->get();
         $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
         $orders = Order::where('user_id',Auth::id())->get();
         return view('front.order.index',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','orders','carts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($en,$id)
    {
      $main_active = 'home' ;
      $sub_active = 'home' ;
      $categorys = Category::all();
      $about = About_us::first();
      $blogs = Blog::all();
      $products = Product::all();
      $carts = Cart::where('user_id',Auth::id())->get();
      $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
      $order = Order::find($id);
      return view('front.order.show',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','order','carts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($en,$id)
    {

    }


}
