<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\About_us;
use App\Blog;
use App\Product_review;
use App\Cart;
use Auth;
class ProductController extends Controller
{

    public function show($en,$id)
    {
        $main_active = 'product' ;
        $sub_active = 'product' ;
        $categorys = Category::with('category','sub_category')->get();
        $about = About_us::first();
        $blogs = Blog::all();
        $product = Product::with(['images','colors','toppings'])->where('_id',$id)->first();
        //dd($product->user_reviews());
        $all_product = Product::with(['images','colors','toppings'])->get();
        $realted_product = Product::with(['images','colors','toppings'])->where('category_id',$product->category_id)->get();
        $category = Category::find($product->category_id);
        //return $product;
        foreach ($all_product as $prod) {
          $rate = $prod->rate($prod->_id);
          $prod->rate       = $rate->rate;
          $prod->count_user = $rate->count_user;
        }
        $carts = Cart::where('user_id',Auth::id())->get();
        $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
        return view('front.product.index',compact('main_active','sub_active','about','sub_total','product','blogs',
                    'category','categorys','id','all_product','realted_product','carts'));
    }

    public function get_product($en,$id)
    {
      $categorys = Category::with('category','sub_category')->get();
      $about = About_us::first();
      $blogs = Blog::all();
      $product = Product::with(['images','colors','toppings'])->where('_id',$id)->first();
      $category = Category::find($product->category_id);
      $all_product = Product::with(['images','colors','toppings'])->take(10)->get();
      foreach ($all_product as $prod) {
        $rate = $prod->rate($prod->_id);
        $prod->rate       = $rate->rate;
        $prod->count_user = $rate->count_user;
      }
      return response()->json(['categorys' => $categorys , 'about' => $about , 'category' => $category ,
                               'product' => $product , 'all_product' => $all_product]);
    }

    public function add_rate(Request $request)
    {
      $request->request->add(['user_id' => Auth::id()]);
      $review  = Product_review::create($request->all());
      $product = Product::find($request->product_id);
      $rate    = $product->rate($request->product_id);
      $user    = $product->rate_user($request->product_id);
      //dd($rate);
      return response()->json(['rate' => $rate ,'user' => $user]);
    }

    public function size_price($en,$p_id,$size)
    {
      $product = Product::find($p_id);
      if($size=="Small"){
        return $product->price_small;
      }
      else if($size=="Medium"){
        return $product->price_medium;
      }
      else{
        return $product->price_larg;
      }

    }

    public function get_rate($en,$id)
    {
      $product = Product::find($id);
      return response()->json($product->rate($id));
    }

    public function create()
    {
      $id = '5c0b9f4b5f627d4234339953';
      $d_id= "5c0b9f215f627d4234339951";
      for ($i=1; $i <= 1 ; $i++) {
        $data = json_decode(file_get_contents("https://www.food2fork.com/api/search?key=c2ccf3e7ac7cdc39e0dfd3c333d2643a&q=burger&page=".$i));
        foreach ($data->recipes as $data1) {
          // $product = json_decode(file_get_contents("http://www.food2fork.com/api/get?key=f9abe289971df5e11846fb6fcf213faf&rId=".$data1->recipe_id));
          // $de='';
          // foreach ($product->recipe->ingredients as  $value) {
          //   $de.=$value;
          // }

          $ext=pathinfo($data1->image_url,PATHINFO_EXTENSION);
          $name = time().rand(11111,99999).'.'.$ext;
          $file = file_get_contents($data1->image_url);
          $save = file_put_contents('admin/product/'.$name ,$file);
          $new_product = Product::create([
            'product_name' => substr($data1->title, 0,10),
            'discount' => 4 ,
            'datiles' => 'Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
                             nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a
                             sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non
                             mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia
                             nostra. Version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                             lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                             Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.
                             Nam nec tellus a odio tincidunt auctor a ornare odio. Version of Lorem Ipsum.
                             Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                             lorem quis bibendum auctor Nisi elit consequat ipsum, nec sagittis sem nibh id elit Duis sed odio sit
                          amet nibh vulputate cursus a sit amet mau' ,
            'category_id' => $d_id ,
            'quantity' => 20 ,
            'price_small' => 120 ,
            'price_medium' => 140 ,
            'price_larg' => 150
          ]);
          for ($j=0; $j<4 ; $j++) {
            $new_product->images()->create([
              'image' => $name,

            ]);
            $new_product->toppings()->create([
              'topping_name' => 'new',
              'price_topping' => 2
            ]);
            $new_product->colors()->create([
              'color' => '#000',
              'price_color' => 2
            ]);
          }

        }
      }
    }


}
