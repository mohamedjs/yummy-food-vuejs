@extends('front.layouts.layout')

@section('content')
<div id="app" style="display:none"></div>
<div id="blogss">
  <section class="heading-content">
    <div class="heading-wrapper">
      <div class="container">
        <div class="row">
          <div class="page-heading-inner heading-group">
            <div class="breadcrumb-group">
              <h1 class="hidden">Blogs</h1>
              <div class="breadcrumb clearfix">
                <span itemscope="" itemtype="#"><a :href="base_uri" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
                </span>
                <span class="arrow-space"></span>
                <span itemscope="" itemtype="#">
                  <a :href="uri+'s'" title="Blogs" itemprop="url"><span itemprop="title">Blogs</span></a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="blog-content">
    <div class="blog-wrapper">
      <div class="container">
        <div class="row">
          <div id="shopify-section-blog-template" class="shopify-section">
            <div class="blog-inner">
              <div id="blog">
                <div class="col-sm-9 articles" v-if="blogs.length > 0">
                  <div class="articles-group">
                    <div class="articles-group-inner">
                      <div class="article clearfix article-big" v-cloak>
                        <div class="group-blog-top">
                          <div class="top-banner article_banner_show article-image">
                            <a :href="uri+'/'+blogs[0]._id">
                              <vue-load-image>
                                 <img slot="image" :src="blogs[0].image" />
                                 <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                                 <div slot="error">@{{blogs[0].title}}</div>
                               </vue-load-image>
                            </a>
                          </div>

                          <div class="article-title">
                            <h2 class="article-name"><a :href="uri+'/'+blogs[0]._id">@{{blogs[0].title}}</a></h2>
                          </div>
                          <ul class="article-info list-inline">
                            <li class="article-date">@{{blogs[0].created_at}}</li>
                            <li class="article-author">
                              <span>By</span> Admin
                            </li>
                            <li class="article-comment">
                              <span>
                                <a href="uri+'/'+blogs[0]._id">
                                  <span>@{{blogs[0].comments.lenght}}</span> Comment(s)
                                </a>
                              </span>
                            </li>
                          </ul>
                        </div>
                        <div class="articleinfo_group">
                          <div class="article-content">
                            <p>
                              @{{blogs[0].body.substring(0, 500)}}
                            </p>
                          </div>
                          <a class="_btn" :href="uri+'/'+blogs[0]._id">Read more</a>
                        </div>
                      </div>
                      <div class="article clearfix article-small" v-cloak v-for="blog in blogs.slice(1)">
                        <div class="group-blog-top">
                          <div class="top-banner article_banner_show article-image">
                            <a :href="uri+'/'+blog._id">
                              <vue-load-image>
                                 <img slot="image" :src="blog.image" />
                                 <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                                 <div slot="error">@{{blog.title}}</div>
                               </vue-load-image>
                            </a>
                          </div>

                          <div class="article-title">
                            <h2 class="article-name"><a :href="uri+'/'+blog._id">@{{blog.title}}</a></h2>
                          </div>
                          <ul class="article-info list-inline">
                            <li class="article-date">@{{blog.created_at}}</li>
                            <li class="article-author">
                              <span>By</span> Admin
                            </li>
                            <li class="article-comment">
                              <span>
                                <a href="article.html">
                                  <span>@{{blog.comments.length}}</span> Comment(s)
                                </a>
                              </span>
                            </li>
                          </ul>
                        </div>
                        <div class="articleinfo_group">
                          <div class="article-content">
                            <p>
                              @{{blogs[0].body.substring(0, 300)}}
                            </p>
                          </div>
                          <a class="_btn" :href="uri+'/'+blog._id">Read more</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="pagination_group">
                    <nav>
                      <ul class="pagination">
                          <li :class="[ pagination.prev_page_url===null ? 'disabled' : '']">
                              <a href="#" aria-label="Previous"
                                 @click.prevent="changePage(pagination.prev_page_url)">
                                  <span aria-hidden="true">«</span>
                              </a>
                          </li>
                          <li v-for="page in pagination.last_page"
                          :class="[ page == pagination.current_page ? 'active' : '']">
                              <a @click.prevent="changePage(pagination.path+'?page='+page)" href="#">@{{ page }}</a>
                          </li>
                          <li :class="[ pagination.next_page_url===null ? 'disabled' : '']">
                              <a href="#" aria-label="Next"
                                 @click.prevent="changePage(pagination.next_page_url)">
                                  <span aria-hidden="true">»</span>
                              </a>
                         </li>
                     </ul>
                   </nav>
                  </div>
                </div>
                <div class="col-sm-3 sidebar-blog sidebar">
                  <div class="sidebar-block blog-search">
                    <div class="sidebar-content">
                      <form class="search"  style="position: relative;">
                        <input type="text" name="q" class="search_box" v-model="search_key" @keyup="search()" placeholder="Search ports here..." value="" autocomplete="off">
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
                        <li class="nav-item" v-for="cat in cats">
                          <a href="#" @click="search_by_category(cat._id)">
                            @{{cat.category_name}}
                          </a>
                        </li>
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
                        <div class="ra-item" v-for="blog in blogs.slice(0,3)">
                          <div class="article-left">
                            <vue-load-image>
                               <img slot="image" :src="blog.image" />
                               <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                               <div slot="error">@{{blog.title}}</div>
                             </vue-load-image>

                          </div>
                          <div class="article-right">
                            <h5><a :href="uri+'/'+blog._id">@{{blog.title}}</a></h5>
                            <span class="date">@{{blog.created_at}}</span>
                          </div>
                        </div>
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
                        <li v-for="tag in tags" ><a href="#" @click="filter_by_tag(tag._id)" :title="'Show articles tagged '+tag.tag_name">@{{tag.tag_name}}</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="sidebar-block blog-banner">
                    <div class="sidebar-content">
                      <a :href="base_uri">
                        <vue-load-image>
                           <img slot="image" :src="about_image" />
                           <img slot="preloader" :src="url_image+'svg/image-loader.8402b89.gif'" class="img-responsive"/>
                           <div slot="error">about</div>
                         </vue-load-image>
                      </a>
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
</div>
@endsection

@section('script')
<script type="text/javascript">

  const app =new Vue({
    el:'#blogss',
    data:{
      cats:[],
      tags:[],
      blogs:[],
      pagination:[],
      uri:"{{asset(App::getLocale().'/article')}}",
      url:"{{asset(App::getLocale().'/article')}}",
      base_uri:"{{asset(App::getLocale().'/')}}",
      url_image: "{{asset('/')}}",
      about_image:"{{$about->image}}",
      search_key:''
    },
    methods:{
      get_item:function (){
        var _this = this
        axios.get(this.url).then(function (response) {
          _this.blogs = response.data.blogs.data;
          _this.pagination = response.data.blogs;
          _this.cats=response.data.blog_cats;
          _this.tags=response.data.blog_tags;
        });
      },
      search(){
        var _this = this
        var ur = this.url+'/filter/search/'+this.search_key
        axios.get(ur).then(function (response) {

          _this.blogs = response.data.blogs.data;
          _this.pagination = response.data.blogs;
          _this.cats=response.data.blog_cats;
          _this.tags=response.data.blog_tags;
        });
      },
      search_by_category(id){

        var _this = this
        var ur = this.url+'/filter/cat/'+id
        axios.get(ur).then(function (response) {
          _this.blogs = response.data.blogs.data;
          _this.pagination = response.data.blogs;
          _this.cats=response.data.blog_cats;
          _this.tags=response.data.blog_tags;
        });
      },
      filter_by_tag(id){

        var _this = this
        var ur = this.url+'/filter/tag/'+id
        axios.get(ur).then(function (response){
          _this.blogs = response.data.blogs.data;
          _this.pagination = response.data.blogs;
          _this.cats=response.data.blog_cats;
          _this.tags=response.data.blog_tags;
        });
      },
      changePage(uri){
        this.url = uri ;
        this.get_item();
      }
    },
    created(){
      this.get_item()

    }
  });
</script>
@endsection
