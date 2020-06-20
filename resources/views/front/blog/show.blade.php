@extends('front.layouts.layout')

@section('content')
<div id="app" style="display:none"></div>
<section class="heading-content">
  <div class="heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner heading-group">
          <div class="breadcrumb-group">
            <h1 class="hidden">Blogs</h1>
            <div class="breadcrumb clearfix">
              <span itemscope="" itemtype="#"><a href="{{asset(App::getLocale().'/')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
              </span>
              <span class="arrow-space"></span>
              <span itemscope="" itemtype="#">
                <a href="{{asset(App::getLocale().'/articles')}}" title="Blogs" itemprop="url"><span itemprop="title">Blogs</span></a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="article-content">
  <div class="article-wrapper">
    <div class="container">
      <div class="row">
        <div id="shopify-section-article-template" class="shopify-section">
          <div class="article-inner" itemscope="" itemtype="#">
            <meta itemprop="datePublished" content="2017-10-26 22:43:08 -0400">
            <meta itemprop="dateModified" content="2017-10-26 22:47:00 -0400">
            <meta itemscope="" itemprop="mainEntityOfPage" itemtype="#" itemid="/blogs/news/the-art-of-food-22">

            <div itemprop="publisher" itemscope="" itemtype="#">
              <div itemprop="logo" itemscope="" itemtype="#">
                <meta itemprop="url" content="{{$blog->image}}">
              </div>
              <meta itemprop="name" content="Shopify">
            </div>
            <div id="article">
              <div class="col-sm-9 article">
                <!-- Begin article -->
                <div class="article-body clearfix">
                  <div class="group-blog-top">
                    <div class="top-banner article_banner_show article-image" itemprop="image" itemscope="" itemtype="#">
                      <img src="{{$blog->image}}" alt="">
                      <meta itemprop="url" content="{{$blog->image}}">
                      <meta itemprop="width" content="863">
                      <meta itemprop="height" content="575">
                    </div>
                    <div class="article-title">
                      <h1 class="article-name" itemprop="headline">{{$blog->title}}</h1>
                    </div>
                    <ul class="article-info list-inline">
                      <li class="article-date"><span> {{$blog->created_at->format('M d Y')}}</span></li>
                      <li class="article-author" itemprop="author" itemscope="" itemtype="#">
                        <span>By</span>
                        <span itemprop="name"> Admin</span>
                      </li>
                      <li class="article-comment">
                        <span>
                          <a href="#">
                            <span id="count_comment">{{count($blog->comments)}}</span> Comment(s)
                          </a>
                        </span>
                      </li>
                    </ul>
                  </div>
                  <div class="articleinfo_group">
                    <div id="article-content" itemprop="description">
                      <p>{{$blog->body}}</p>
                    </div>
                    <div class="group-blog-btm">
                      <div class="tags-area col-sm-6">
                        <span class="btm-title">Tags : </span>
                        @foreach($blog->tags as $tag)
                        <a href="{{asset(App::getLocale().'/articles')}}" title="Show articles tagged {{$tag->tag_name}}">{{$tag->tag_name}}</a>
                        @endforeach
                      </div>
                      <div class="share-with supports-fontface col-sm-6">
                        <span class="btm-title">Share: </span>
                        <div class="social-blog social-sharing is-clean" data-permalink="#">
                          <a target="_blank" href="#" class="share-facebook">
                            <span class="fa fa-facebook"></span>
                          </a>
                          <a target="_blank" href="#" class="share-twitter">
                            <span class="fa fa-twitter"></span>
                          </a>
                          <a target="_blank" href="#" class="share-pinterest">
                            <span class="fa fa-pinterest"></span>
                          </a>
                          <a target="_blank" href="#" class="share-google">
                            <!-- Cannot get Google+ share count with JS yet -->
                            <span class="fa fa-google-plus"></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End article -->
                <!-- Related Posts  -->
                <div class="related-body clearfix">
                  <span class="related-title">Related post</span>
                  <div class="related-content">
                    <div class="related-content-inner related-blog-slider">
                      @foreach($blogs->shuffle()->take(4) as $blog)
                      <div class="related-inner">
                        <div class="related-group article">
                          <div class="related-left">
                            <img src="{{$blog->image}}" alt="">
                          </div>
                          <div class="related-right">
                            <div class="article-title">
                              <h2 class="article-name"><a href="{{asset(App::getLocale().'/article/'.$blog->_id)}}">{{$blog->title}}</a></h2>
                            </div>
                            <ul class="article-info list-inline">
                              <li class="article-date"><span>{{$blog->created_at->format('M d Y')}}</span></li>
                              <li class="article-author" itemprop="author" itemscope="" itemtype="#">
                                <span>By</span>
                                <span itemprop="name">cs-fastfood Admin</span>
                              </li>
                              <li class="article-comment">
                                <span>
                                  <a href="#">
                                    <span>{{count($blog->comments)}}</span> Comment
                                  </a>
                                </span>
                              </li>
                            </ul>
                            <div class="article-content">
                              <p>{{substr($blog->body,0,500)}}
                              </p>
                            </div>
                            <a class="_btn" href="{{asset(App::getLocale().'/article/'.$blog->_id)}}">Read more</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <!-- End Related Posts -->
                <!-- Begin comments -->
                <div id="vue-comment">
                  <div id="comments" class="comments">
                    <ul class="nav nav-tabs">
                      <li class="comment-title active">
                        <a href="#comment_tab_1" data-toggle="tab">
                          Comments
                        </a>
                      </li>
                      <li class="comment-title">
                        <a href="#comment_tab_2" data-toggle="tab">
                          Leave your comment
                        </a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="comment_tab_1">
                        <div class="comment border-bottom clearfix" v-for="comment in blog.comments">
                          <div class="cmt-author"><b>@{{comment.name}}</b></div>
                          <div class="cmt-date">
                            <span class="date-hour">
                                  @{{moment(comment.created_at).format('hh:ss a')}}
                                </span>
                            <span class="date-day">
                                  @{{moment(comment.created_at).format('LL')}}
                                </span>
                          </div>
                          <div class="cmt-content">
                            <p>@{{comment.comment}}
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="comment_tab_2">
                        <form  @submit.prevent="add_comment()" method="post" id="form-submit" id="comment_form" class="comment-form" accept-charset="UTF-8">
                          <h2 class="article-title"><span>Leave your comment</span></h2>
                          <div class="group_form">
                            <div class="col-sm-6">
                              <div class="form-item">
                                <label for="comment_author">Your Name</label>
                                <input type="text" id="comment_author" v-model="user.name" size="40" class="text">
                              </div>
                              <div class="form-item">
                                <label for="comment_email">Email Address</label>
                                <input type="text" id="comment_email" v-model="user.email" size="40" class="text">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label for="comment_body">Comment</label>
                              <textarea id="comment_body" v-model="user.comment" cols="40" rows="5" class="text"></textarea>
                            </div>
                            <div class="col-sm-12">
                              <input type="submit" value="Submit Comment" class="_btn" id="comment-submit">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End comments -->
              </div>
              <div class="col-sm-3 sidebar-blog sidebar">
                <div class="sidebar-block blog-search">
                  <div class="sidebar-content">
                    <form class="search" action="#" style="position: relative;">
                      <input type="hidden" name="type" value="article">
                      <input type="text" name="q" class="search_box" placeholder="Search ports here..." value="" autocomplete="off">
                      <button class="search-submit" type="button">
                        <span class="cs-icon icon-search"></span>
                      </button>
                    </form>
                    <div class="search-results" style="position: absolute; left: 0px; top: 100%; display: none;"></div>
                  </div>
                </div>
                <div class="sidebar-block blog-category">
                  <h3 class="sidebar-title">
                    <span class="text">Category</span>
                    <span class="cs-icon icon-minus"></span>
                  </h3>
                  <div class="sidebar-content">
                    <ul class="category">
                      @foreach($blog_cats as $cat)
                      <li class="nav-item">
                        <a href="{{asset(App::getLocale().'/articles')}}">
                          {{$cat->category_name}}
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="sidebar-block blogs-recent">
                  <h3 class="sidebar-title">
                    <span class="text">Recent posts</span>
                    <span class="cs-icon icon-minus"></span>
                  </h3>
                  <div class="sidebar-content recent-article">
                    <div class="ra-item-inner">
                      @foreach($blogs->shuffle()->take(4) as $blog)
                      <div class="ra-item">
                        <div class="article-left">
                          <img src="{{$blog->image}}" alt="">
                        </div>
                        <div class="article-right">
                          <h5><a href="{{asset(App::getLocale().'/articles')}}">{{$blog->title}}</a></h5>
                          <span class="date">{{$blog->created_at->format('M d Y')}}</span>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="sidebar-block blog-tags clearfix">
                  <h3 class="sidebar-title">
                    <span class="text">Tags</span>
                    <span class="cs-icon icon-minus"></span>
                  </h3>
                  <div class="sidebar-content">
                    <ul class="tags-inner">
                      @foreach($blog_tags as $tag)
                      <li><a href="{{asset(App::getLocale().'/articles')}}" title="Show articles tagged {{$tag->tag_name}}">{{$tag->tag_name}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="sidebar-block blog-banner">
                  <div class="sidebar-content">
                    <a href="{{asset(App::getLocale().'/')}}"><img src="{{$about->image}}" alt=""></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
const app =new Vue({
  el:'#vue-comment',
  data:{
    blog:[],
    user:{'name' : '' , 'email': '' , 'comment' : '' },
    uri:"{{asset(App::getLocale().'/article/comment/add')}}",
    url:"{{asset(App::getLocale().'/article/get/blog')}}",
  },
  methods:{
    get_item(){
      var _this = this;
      axios.get(_this.url+'/{{$blog->_id}}').then(function (response) {
        _this.blog = response.data;

      });

    },
    add_comment(){
      var _this = this
      axios.post(this.uri+'/{{$blog->_id}}',this.user)
        .then(function (response){
              _this.get_item()
          }).catch(
              error => console.log(error)
          )
    }
  },
  created(){
    this.get_item()
  }
});
</script>
@endsection
