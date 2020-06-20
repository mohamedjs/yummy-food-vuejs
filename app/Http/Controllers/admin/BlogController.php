<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Blog;
use App\Blog_category;
use App\Tag;
class BlogController extends Controller
{

    public function get()
    {
      $main_active = 'main_blog' ;
      $sub_active = 'blog' ;
      $categorys=Blog_category::all();
      $tags=Tag::all();
      return view('adminpanel.blog.blog_index',compact('main_active','sub_active','categorys','tags'));
    }


    public function index()
    {
        $blog = Blog::with('tags','category')->latest('blogs.created_at')->paginate(5);
        $categorys=Blog_category::all();
        $tags=Tag::all();
        return response()->json(['blog' => $blog , 'tags' => $tags , 'categorys' => $categorys]);
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
        $blog = Blog::create($request->all());
        $tag = $request->only('tag_id');
        foreach($tag as $tag_id){
        $blog->tags()->attach($tag_id);
      }
        return response()->json($blog);
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
      $blog = Blog::with('tags','category')->where('_id',$id)->first();
      return response()->json($blog);
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
        Blog::find($id)->update($request->all());
        $tag = $request->only('tag_id');
        foreach($tag as $tag_id){
        Blog::find($id)->tags()->syncWithoutDetaching($tag_id);
      }
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
      Blog::find($id)->tags()->detach();
      Blog::find($id)->delete();
      return response()->json('yes');
    }

    //get all with offset
    public function show_offset_number($en,$offset) {
      $offset = (int)$offset;
      $data = Blog::with('tags','category')->latest('blogs.created_at')->paginate($offset);
      return $data;
    }

    public function search($en,$key)
    {
      $data = Blog::with('tags','category')->latest('blogs.created_at')->where(function($query) use ($key){
          $query->where('title','like', '%' . $key . '%');
      })->paginate(5);
      return $data;
    }

    public function search_by_category($en,$id)
    {
      $data = Blog::with('tags','category')->latest('blogs.created_at')->where('blogs.blog_cat_id',$id)->paginate(5);
      return $data;
    }
}
