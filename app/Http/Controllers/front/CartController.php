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
class CartController extends Controller
{

    public function get_cart()
    {
      $products = Cart::where('user_id',Auth::id())->get();
      $sub_total= Cart::where('user_id',Auth::id())->sum('total_price');
      foreach ($products as $product) {
        $pro = Product::find($product->product_id);
        $product['product_name'] = $pro->product_name;
        $product['image']        = $pro->images[0]->image;
      }
      return response()->json(['products' => $products , 'sub_total' => $sub_total]);
    }
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
         return view('front.cart.index',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','carts'));
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
        $request->request->add(['user_id' => Auth::id()]);
        $request->request->add(['total_price' => $request->price * $request->quantity]);
        Cart::create($request->all());
        return redirect(App::getLocale().'/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return redirect(App::getLocale().'/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($en,$id)
    {
      //delete
      Cart::find($id)->delete();
      //get all again
      $products = Cart::where('user_id',Auth::id())->get();
      $sub_total= Cart::where('user_id',Auth::id())->sum('total_price');
      foreach ($products as $product) {
        $pro = Product::find($product->product_id);
        $product['product_name'] = $pro->product_name;
        $product['image']        = $pro->images[0]->image;
      }
      return response()->json(['products' => $products , 'sub_total' => $sub_total]);
    }

    public function change_quantity_price($en,$id,$quantity)
    {
      //update
      $update_cart = Cart::find($id);
      $update_cart->quantity = $quantity;
      $update_cart->total_price=$quantity * $update_cart->price;
      $update_cart->save();
      //get all again
      $products = Cart::where('user_id',Auth::id())->get();
      $sub_total= Cart::where('user_id',Auth::id())->sum('total_price');
      foreach ($products as $product) {
        $pro = Product::find($product->product_id);
        $product['product_name'] = $pro->product_name;
        $product['image']        = $pro->images[0]->image;
      }
      return response()->json(['products' => $products , 'sub_total' => $sub_total]);
    }

    public function remove_all()
    {
      //delete
      Cart::where('user_id',Auth::id())->delete();
      //get all again
      $products = Cart::where('user_id',Auth::id())->get();
      $sub_total= Cart::where('user_id',Auth::id())->sum('total_price');
      foreach ($products as $product) {
        $pro = Product::find($product->product_id);
        $product['product_name'] = $pro->product_name;
        $product['image']        = $pro->images[0]->image;
      }
      return response()->json(['products' => $products , 'sub_total' => $sub_total]);
    }

    public function calculate_shipping()
    {
      $price = 50;
      return $price;
    }

    public function checkout($en,Request $request){
      $products = Cart::where('user_id',Auth::id())->get();
      $order = Order::create([
        'order_id' => rand(1000,9999) ,
        'user_id' => Auth::id() ,
        'number_of_product' => 0 ,
        'total_price' => 0 ,
        'country' => $request->city ,
         'state' => $request->state ,
         'zip_code' => $request->zip ,
         'info' => $request->info,
         'shipping_price' => $request->ship_val ,
         'order_status' => 'active'
      ]);
      foreach ($products as $product) {
        $detail=Order_detail::create([
          'order_id' => $order->_id ,
          'product_id' => $product->product_id ,
          'qty' => $product->quantity,
          'total_price' => $product->total_price ,
          'price' => $product->price
        ]);
        $order->number_of_product+=1;
        $order->total_price+=$product->total_price;
        $order->save();
      }
      //delete
      Cart::where('user_id',Auth::id())->delete();
    }
}
