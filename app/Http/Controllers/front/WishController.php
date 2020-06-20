<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\Order_detail;
use App\Wish_list;
use App\Category;
use App\About_us;
use App\Blog;
use Auth;
use App;
class WishController extends Controller
{

    public function get_wish()
    {
      $products = Wish_list::where('user_id',Auth::id())->get();
      $sub_total= Wish_list::where('user_id',Auth::id())->sum('total_price');
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
      return view('front.wish.index',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','carts'));
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
        Wish_list::create($request->all());
        return redirect(App::getLocale().'/wishlist');
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
        //
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
      Wish_list::find($id)->delete();
    }
}
