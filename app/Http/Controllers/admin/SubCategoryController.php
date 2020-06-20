<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
class SubCategoryController extends Controller
{

    public function get_sub_category()
    {
      $main_active = 'category' ;
      $sub_active = 'sub_category' ;
      return view('adminpanel.category.sub_index',compact('main_active','sub_active'));
    }

    public function get_category()
    {
      $cats = Category::whereNull('cat_id')->with('sub_category')->latest('category.created_at')->get();
      return response()->json($cats);
    }

    public function index()
    {
        $cats = Category::whereNotNull('cat_id')->with('category')->latest('category.created_at')->paginate(5);
        return response()->json($cats);
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
        $cat = Category::create($request->all());
        return response()->json($cat);
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
      $cat = Category::where('_id',$id)->first();
      return response()->json($cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$en,$id)
    {
        Category::find($id)->update($request->all());
        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($en,$id)
    {
      $cat=Category::find($id)->delete();
      return response()->json($cat);
    }

    //get all with offset
    public function show_offset_number($en,$offset) {
      $offset = (int)$offset;
      $data = Category::whereNotNull('cat_id')->with('category')->latest('category.created_at')->paginate($offset);
      return $data;
    }

    public function search_sub_category($en,$key)
    {
      $data = Category::whereNotNull('cat_id')->with('category')->latest('category.created_at')->where(function($query) use ($key){
          $query->where('category_name','like', '%' . $key . '%');
      })->paginate(5);
      return $data;
    }
}
