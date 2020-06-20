<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Product_image;
use App\Product_color;
use App\Product_topping;
use App\Category;
use App\Events\MessageEvent;
use App;
class ProductController extends Controller
{


    public function get_product()
    {
      $products = Product::with('images','toppings','colors','category')->latest('product.created_at')->paginate(8);
      $cats= Category::whereNotNull('cat_id')->get();
      return response()->json(['products'=>$products , 'cats' => $cats]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Product::where('product_name','Extra Crispy')->delete();
      $main_active = "product";
      $sub_active = "product";
      return view('adminpanel.product.index',compact('main_active','sub_active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $main_active = "product";
      $sub_active = "product";
      $categorys = Category::all();
      return view('adminpanel.product.add_product',compact('main_active','sub_active','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['images','topping_name','price_topping','color','price_color']);
        $product=Product::create($data);
        // add images
        for ($i=0; $i <count($request->images) ; $i++)
        {
            $img_name = time().rand(11111,99999).'.'.$request->images[$i]->getClientOriginalExtension();
            $request->images[$i]->move(public_path('admin/product/'),$img_name);
            Product_image::create([
                'product_id' => $product->id,
                'image' => $img_name
            ]);
        }
        //add topping
        for ($i=0; $i <count($request->topping_name) ; $i++)
        {

            Product_topping::create([
                'product_id' => $product->id,
                'topping_name' => $request->topping_name[$i],
                'price_topping'  => $request->price_topping[$i]
            ]);
        }

        //add color
        for ($i=0; $i <count($request->color) ; $i++)
        {

            Product_color::create([
                'product_id' => $product->id,
                'color' => $request->color[$i],
                'price_color'  => $request->price_color[$i]
            ]);
        }

        event(new MessageEvent("new product is added"));

        return redirect(App::getLocale().'/adminpanel/product');
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
    public function edit($en,$id)
    {
      $main_active = "product";
      $sub_active = "product";
      $product = Product::with('images','toppings','colors','category')->find($id)->first();
      //dd($product->images);
      $categorys = Category::whereNotNull('cat_id')->get();
      return view('adminpanel.product.edit_product',compact('main_active','sub_active','product','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$en, $id)
    {
      //dd($request->only(['toppings','price_toppings']));
        $product=Product::find($id);
        // $product->toppings()->update($request->only(['topping_name','price_topping']));
        // $product->colors()->update($request->only(['color','price_color']));

        // edit images
        if($request->images){
          for ($i=0; $i <count($request->images) ; $i++)
          {
              $img_name = time().rand(11111,99999).'.'.$request->images[$i]->getClientOriginalExtension();
              $request->images[$i]->move(public_path('admin/product/'),$img_name);
              Product_image::create([
                  'product_id' => $id,
                  'image' => $img_name
              ]);
          }
        }
        //edit topping
        for ($i=0; $i <count($request->topping_name) ; $i++)
        {

            Product_topping::updateOrCreate(['product_id' => $id],[
                'topping_name' => $request->topping_name[$i],
                'price_topping'  => $request->price_topping[$i]
            ]);
        }

        //edit color
        for ($i=0; $i <count($request->color) ; $i++)
        {

            Product_color::updateOrCreate(['product_id' => $id],[
                'color' => $request->color[$i],
                'price_color'  => $request->price_color[$i]
            ]);
        }
        $product->update($request->all());
        return redirect(App::getLocale().'/adminpanel/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($en,$id)
    {
        Product::find($id)->delete();
        Product_topping::where('product_id',$id)->delete();
        Product_color::where('product_id',$id)->delete();
        Product_image::where('product_id',$id)->delete();
        return response()->json('ok');
    }

    //get all with offset
    public function show_offset_number($en,$offset) {
      $offset = (int)$offset;
      $data = Product::with('images','toppings','colors','category')->latest('products.created_at')->paginate($offset);
      return $data;
    }

    //get all with offsfilter with offsetet
    public function get_category($n,$id) {
      $data=Product::with('images','toppings','colors','category')->latest('products.created_at')->
                   where('categorys._id',$id)->paginate(15);
      return $data;
    }

    public function search_product($en,$key)
    {
      $data = Product::with('images','toppings','colors','category')->latest('products.created_at')->where(function($query) use ($key){
          $query->orwhere('product_name','like', '%' . $key . '%');
      })->paginate(15);
      return $data;
    }

    public function remove_image($en,$id)
    {
      Product_image::find($id)->delete();
      return response()->json('ok');
    }


}
