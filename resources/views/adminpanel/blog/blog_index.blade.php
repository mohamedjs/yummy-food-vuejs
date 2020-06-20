@extends('adminpanel.layouts.layout')

@section('menu-header')
<h2>Home</h2>
<div class="right-wrapper pull-right">
  <ol class="breadcrumbs">
    <li>
      <a href="{{asset('/adminpanel')}}">
        <i class="fa fa-home"></i>
      </a>
    </li>
    <li><span>Blog</span></li>
    <li><span>Blog</span></li>
  </ol>

</div>
@endsection

@section('content')
<div id="app" style="display:none"></div>
<div id="blog">
  <!-- blog form -->
  <div class="row" style="margin-bottom:1%">
    <div class="col-md-12">
      <form  @submit.prevent="add_blog()" method="post" id="form-submit">
        <div class="panel-body">
          <div class="modal-wrapper">
            <div class="modal-text" id="blog_input">
              <div class="form-group">
                <label class="col-sm-3 control-label" id="sub_name">Blog Category Name <span class="required">*</span></label>
                <div class="col-sm-9">
                  <select class="form-control input-sm mb-md" v-model="blog.blog_cat_id">
                    <option v-for="cat in categorys" :value="cat._id">@{{cat.category_name}}</option>
                  </select>
                </div>
              </div>
              <div  class="form-group">
                <label class="col-sm-3 control-label" id="sub_name">blog Title <span class="required">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="title" v-model="blog.title" v-validate="'required|min:5'"   class="form-control" placeholder="eg.: Action" required="">
                  <div class="text-danger">@{{ errors.first('title') }}</div>
                </div>
              </div>
              <div  class="form-group">
                <label class="col-sm-3 control-label" id="sub_name">blog Body <span class="required">*</span></label>
                <div class="col-sm-9">
                  <textarea name="body" v-model="blog.body" rows="8" cols="80"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" id="sub_name">Blog Tag Name <span class="required">*</span></label>
                <div class="col-sm-8">
                  <select class="form-control input-sm mb-md" v-model="tag_id.tag_id">
                    <option v-for="tag in tags" :value="tag._id">@{{tag.tag_name}}</option>
                  </select>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" @click="add_tag()"><span class="fa fa-plus"></span></button>
                </div>
              </div>
              <div class="form-group" v-for="val in tag_id">
                <label class="col-sm-3 control-label" id="sub_name">Blog Tag Name <span class="required">*</span></label>
                <div class="col-sm-8">
                  <select class="form-control input-sm mb-md" v-model="val.tag_id">
                    <option v-for="tag in tags" :value="tag._id">@{{tag.tag_name}}</option>
                  </select>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" @click="add_tag()"><span class="fa fa-plus"></span></button>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-offset-sm-1 control-label" id="sub-icon">Blog Image <span class="required">*</span></label>
                <div class="col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                      <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                      </div>
                      <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Change</span>
                        <span class="fileupload-new">Select file</span>
                        <input type="file" v-validate="'required|mimes:image/*'" data-vv-as="image" ref="file" name="image"  @change="uploadFiles()" />
                      </span>
                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                  </div>
                </div>
                <div class="text-danger" >@{{ errors.first('image') }}</div>
              </div>
            </div>
          </div>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-md-12 text-right">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </div>
        </footer>
      </form>
    </div>
  </div>
  <!-- start: page -->
  <div class="row">
      <div class="col-md-12">
        <section class="panel">
          <header class="panel-heading" style="height:60px">
            <div class="panel-actions">
              <a href="#" class="fa fa-caret-down"></a>
              <a href="#" class="fa fa-times"></a>
            </div>
            <div class="col-sm-3">
              <select class="form-control input-sm mb-md" @change="offset_number()" v-model="offset">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value ="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
            <div class="col-sm-3">
              <div class="input-group input-search">
                <input type="text" class="form-control" @keyup="search()" v-model="search_key" name="q" id="q" placeholder="Search...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
              </div>

            </div>
            <div class="col-sm-3">
              <select class="form-control input-sm mb-md" @change="search_category()" v-model="filter_cat">
                <option v-for="cat in categorys" :value="cat._id">@{{cat.category_name}}</option>
              </select>
            </div>
          </header>
          <div class="panel-body media-gallery">
            <div class="mg-main">
              <div class="row mg-files">
                <div class="isotope-item col-sm-6 col-md-4 col-lg-3" v-for="blog in blogs">
                  <div class="thumbnail">
                    <div class="thumb-preview">
                      <a class="thumb-image" :href="blog.image">
                        <img :src="blog.image" class="img-responsive" alt="Project">
                      </a>
                      <div class="mg-thumb-options">
                        <div class="mg-zoom"><i class="fa fa-trash-o" @click="delete_blog(blog._id)"></i></div>
                        <div class="mg-toolbar">
                          <div class="mg-option checkbox-custom checkbox-inline">
                            <input type="checkbox" id="file_2" value="1">
                            <label for="file_2">SELECT</label>
                          </div>
                          <div class="mg-group pull-right">
                            <a @click="edit_blog(blog)">EDIT</a>
                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                              <i class="fa fa-caret-up"></i>
                            </button>
                            <ul class="dropdown-menu mg-menu" role="menu">
                              <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                              <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <h5 class="mg-title text-semibold">@{{blog.title}}</h5>
                    <div class="mg-description">
                      <small class="pull-left text-muted">@{{blog.category.category_name}}</small>
                      <small class="pull-right text-muted">@{{blog.created_at}}</small>
                      <small v-for="tag in blog.tags">@{{tag.tag_name}}-</small>
                    </div>
                  </div>
                </div>
              </div>
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
        </section>
      </div>
    </div>
  <!-- end: page -->
</div>
@endsection

@section('script')
<script type="text/javascript">

  const app = new Vue({
    el:'#blog',
    data:{
      blogs:[],
      blog:{'title' : '' , 'body' : '' , 'image' : '' , 'blog_cat_id': '' },
      tag_id:[],
      data : new FormData(),
      pagination:[],
      search_key:'',
      offset:'',
      filter_cat:'',
      id:'',
      categorys:[],
      tags:[],
      uri:"{{asset(App::getLocale().'/adminpanel/blog')}}",
      url_image: "{{asset('/')}}"
    },
    methods:{
      get_item:function (){
        var _this = this
        axios.get(this.uri).then(function (response) {
          console.log(response.data.blog.data);
          _this.blogs = response.data.blog.data;
          _this.pagination = response.data.blog;
          _this.categorys=response.data.categorys;
          _this.tags=response.data.tags;
        });
      },
      add_blog:function(e){
        var _this=this
        const config = {  headers: { 'content-type': 'multipart/form-data' } }
        this.data.append('title' , this.blog.title)
        this.data.append('body' , this.blog.body)
        this.data.append('blog_cat_id' , this.blog.blog_cat_id)
        for (let i = 0; i < this.tag_id.length; i++) {
           this.data.append('tag_id[]' , this.tag_id[i].tag_id)
        }
        axios.post("{{asset(App::getLocale().'/adminpanel/blog')}}",this.data).then(function(response){
            _this.get_item()
            for (let i = 0; i < _this.tag_id.length; i++) {
               _this.tag_id[i].tag_id=''
               _this.data= new FormData()
            }
            _this.tag_id=[]
          }).catch(
              error => console.log(error)
          )
      },
      edit_blog:function(blog){
        this.blog.blog_name = blog.blog_name ;

        this.id= blog._id;
          $('#form-submit').hide();
          $('#form-edit').show();
      },
      update_blog:function(id){
          var _this=this
          this.blog._method="patch";
          console.log(this.blog);
        axios.post("{{asset(App::getLocale().'/adminpanel/blog_blog/')}}/"+id, this.blog)
          .then(function (response){
                $('#form-submit').show()
                $('#form-edit').hide()
                _this.get_item()
              }).catch(
                error => console.log(error)
              )
      },
      delete_blog:function(id){
        var _this=this
        axios.delete("{{asset(App::getLocale().'/adminpanel/blog')}}/"+id).then(
          function(response){
            _this.get_item()
          }).catch(
              error => console.log(error)
          )
      },
      changePage(uri){
        console.log(uri);
        this.uri = uri ;
        console.log(this.uri);
        this.get_item();
      },
      uploadFiles (){
        let files = this.$refs.file.files;
        for (let i = 0; i < files.length; i++) {
           this.data.append('image[]' , files[i])
        }
      },
      offset_number(){
        var _this = this;
        var uri='{{asset(App::getLocale()."/adminpanel/blog/filter")}}/'+this.offset
        axios.get(uri).then(function (response) {
          _this.blogs = response.data.data;
          _this.pagination = response.data;
        });
      },
      search(){
        var _this = this;
        var uri='{{asset(App::getLocale()."/adminpanel/blog/search")}}/'+this.search_key;
        axios.get(uri).then(function (response) {
          _this.blogs = response.data.data;
          _this.pagination = response.data;

        });

      },
      search_category(){
        var _this = this;
        var uri='{{asset(App::getLocale()."/adminpanel/blog/category")}}/'+this.filter_cat;
        axios.get(uri).then(function (response) {
          _this.blogs = response.data.data;
          _this.pagination = response.data;

        });

      },
      add_tag:function(){
        this.tag_id.push({ tag_id: '' });
      }
    },
    created:function created(){
      this.get_item();
    }
  });
</script>
@endsection
