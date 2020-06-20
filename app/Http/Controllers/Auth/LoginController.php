<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Category;
use App\Product;
use App\About_us;
use App\Our_people;
use App\Blog;
use App\Cart;
use App\Hour_work;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
      //protected $redirectTo = '/';
      protected function redirectTo()
      {
        if(Auth::user()->user_type == 3){
          return  '/';
        }
        else{
            return  '/adminpanel';
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
      $main_active = 'home' ;
      $sub_active = 'home' ;
      $categorys = Category::all();
      $about = About_us::first();
      $blogs = Blog::all();
      $products = Product::all();
      $carts = Cart::where('user_id',Auth::id())->get();
      $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
      return view('auth.login',compact('main_active','sub_active','about','sub_total','blogs','products','categorys','carts'));
    }
}
