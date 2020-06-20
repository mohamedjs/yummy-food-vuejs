<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Tag;
class TagController extends Controller
{

    public function get()
    {
      $main_active = 'main_blog' ;
      $sub_active = 'tag' ;
      return view('adminpanel.blog.tag_index',compact('main_active','sub_active'));
    }


    public function index()
    {
        $category = Tag::latest('tags.created_at')->paginate(5);
        return response()->json($category);
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
        //dd($request->all());
        $category = Tag::create($request->all());
        return response()->json($category);
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
      $category = Tag::where('_id',$id)->first();
      return response()->json($category);
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
      //  dd($id,$request->all());
        Tag::find($id)->update($request->all());
        return 'yes';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($en,$id)
    {
      $category=Tag::find($id)->delete();
      return response()->json($category);
    }

    //get all with offset
    public function show_offset_number($en,$offset) {
      $offset = (int)$offset;
      $data = Tag::latest('tags.created_at')->paginate($offset);
      return $data;
    }

    public function search($en,$key)
    {
      $data = Tag::latest('tags.created_at')->where(function($query) use ($key){
          $query->where('category_name','like', '%' . $key . '%');
      })->paginate(5);
      return $data;
    }
}
