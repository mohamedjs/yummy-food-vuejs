<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\About_us;
use App\Our_people;
use App\Blog;
use App\Cart;
use App\Hour_work;
use Auth;
class FrontController extends Controller
{

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
        return view('front.index',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','carts'));
    }



    public function about_us()
    {
        $main_active = 'home' ;
        $sub_active = 'home' ;
        $categorys = Category::all();
        $about = About_us::first();
        $blogs = Blog::all();
        $products = Product::all();
        $carts = Cart::where('user_id',Auth::id())->get();
        $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
        $peoples = Our_people::all();
        return view('front.setting.about',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','carts','peoples'));
    }


    public function contact()
    {
        $main_active = 'home' ;
        $sub_active = 'home' ;
        $categorys = Category::all();
        $about = About_us::first();
        $blogs = Blog::all();
        $products = Product::all();
        $carts = Cart::where('user_id',Auth::id())->get();
        $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
        $hours = Hour_work::all();
        return view('front.setting.contact',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','carts','hours'));
    }

}
