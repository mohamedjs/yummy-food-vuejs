<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\About_us;
use App\Blog;
use App\Comment;
use App\Blog_category;
use App\Tag;
use App\Cart;
use Auth;
class BlogController extends Controller
{

    public function get()
    {
        $main_active = 'home' ;
        $sub_active = 'home' ;
        $categorys = Category::all();
        $about = About_us::first();
        $blogs = Blog::with('comments')->get();
        $carts = Cart::where('user_id',Auth::id())->get();
        $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
        return view('front.blog.index',compact('main_active','sub_active','about','blogs','categorys','carts','sub_total'));
    }

    public function index()
    {
      $blog_cat = Blog_category::all();
      $blog_tag = tag::all();
      $blogs    = Blog::with('comments')->latest('created_at')->paginate(5);

      return response()->json(['blog_cats' => $blog_cat , 'blog_tags' => $blog_tag , 'blogs' => $blogs]);
    }


    public function show($en,$id)
    {
      $blog = Blog::with('comments')->where('_id',$id)->first();
      $main_active = 'home' ;
      $sub_active = 'home' ;
      $categorys = Category::all();
      $about = About_us::first();
      $blogs = Blog::with('comments')->get();
      $blog_cats = Blog_category::all();
      $blog_tags = tag::all();
      $carts = Cart::where('user_id',Auth::id())->get();
      $sub_total =Cart::where('user_id',Auth::id())->sum('total_price');
      return view('front.blog.show',compact('main_active','sub_active','about',
      'blog','categorys','blogs','blog_tags','blog_cats','carts','sub_total'));
    }

    public function get_blog($en,$id)
    {
      $blog = Blog::with('comments')->where('_id',$id)->first();
      return $blog;
    }

    public function search_by_category($en,$id)
    {
      $blogs = Blog::with('comments')->where('blog_cat_id',$id)->latest('blogs.created_at')->paginate(5);
      $blog_cat = Blog_category::all();
      $blog_tag = tag::all();
      return response()->json(['blog_cats' => $blog_cat , 'blog_tags' => $blog_tag , 'blogs' => $blogs]);
    }

    public function search_by_tag($en,$id)
    {
      $tag = Tag::where('_id',$id)->pluck('blog_id');
      $tag_id = [];
      foreach ($tag as $tag_id) {
        array_push($tag_id,$tag_id);
      }
      $blogs = Blog::with('comments')->whereIn('_id',$tag_id)->latest('blogs.created_at')->paginate(5);
      $blog_cat = Blog_category::all();
      $blog_tag = tag::all();
      return response()->json(['blog_cats' => $blog_cat , 'blog_tags' => $blog_tag , 'blogs' => $blogs]);
    }

    public function search($en,$key)
    {
      $blogs = Blog::with('comments')->where(function($q) use ($key){
        $q->where('blogs.title','like', '%' . $key . '%');
        $q->orwhere('blogs.body','like', '%' . $key . '%');
      })->latest('blogs.created_at')->paginate(5);
      $blog_cat = Blog_category::all();
      $blog_tag = tag::all();
      return response()->json(['blog_cats' => $blog_cat , 'blog_tags' => $blog_tag , 'blogs' => $blogs]);
    }


    public function add_comment(Request $request,$en,$id)
    {
      $blog = Blog::find($id);
      $request->request->add(['user_id' => Auth::id()]);
      $blog->comments()->create($request->all());
      return 'yes';
    }

}
