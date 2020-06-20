<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\About_us;
use App\Blog;
use App\Cart;
use Auth;
class CategoryController extends Controller
{

    public function show($en,$id)
    {
        $main_active = 'catgeory' ;
        $sub_active = 'catgeory' ;
        $categorys = Category::with(['category','sub_category'])->get();
        $about = About_us::first();
        $blogs = Blog::all();
        $category = Category::find($id);
        if(count($category->sub_category) > 0){
          $catgory_id = Category::where('cat_id',$id)->pluck('_id');
          $cat_id = [];
          foreach ($catgory_id as $cate_id) {
            array_push($cat_id,$cate_id);
          }
          $products=Product::whereIn('category_id',$cat_id)->latest('products.created_at')->paginate(10);
        }
        else {
          $products=$category->products()->latest('products.created_at')->paginate(10);
        }
        $carts = Cart::where('user_id',Auth::id())->get();
        $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
        //dd($products);
        return view('front.category.index',compact('main_active','sub_active','about','sub_total','products','blogs','category','categorys','id','carts'));
    }

    public function get_products($en,$id,Request $request)
    {
      $categorys = Category::all();
      $about = About_us::first();
      $category = Category::find($id);
      $products = [];
      if(count($category->sub_category) > 0){
        $catgory_id = Category::where('cat_id',$id)->pluck('_id');
        $cat_id = [];
        foreach ($catgory_id as $cate_id) {
          array_push($cat_id,$cate_id);
        }
        $products=Product::with(['images','colors','toppings'])->whereIn('category_id',$cat_id);
        if($request->has('column') && $request->has('sort_type')){
          $products = $products->orderBy($request->column,$request->sort_type);
        }
        $products = $products->paginate(12);
      }
      else {
        $products=Product::with(['images','colors','toppings'])->where('category_id',$id);
        if($request->has('column') && $request->has('sort_type')){
          $products = $products->orderBy($request->column,$request->sort_type);
        }
        $products = $products->paginate(12);
      }

      $all_product = Product::with(['images','colors','toppings'])->take(3)->get();

      foreach ($products as $pro) {
        $rate = $pro->rate($pro->_id);
        $pro->rate       = $rate->rate;
        $pro->count_user = $rate->count_user;
      }

      foreach ($all_product as $prod) {
        $rate = $prod->rate($prod->_id);
        $prod->rate       = $rate->rate;
        $prod->count_user = $rate->count_user;
      }

      return response()->json(['categorys' => $categorys , 'about' => $about , 'category' => $category ,
                               'products' => $products , 'all_product' => $all_product]);
    }

}
