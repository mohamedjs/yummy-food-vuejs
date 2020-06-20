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
    <li><span>Blog Categeory</span></li>
  </ol>

</div>
@endsection

@section('content')
<div id="app" style="display:none"></div>
<div id="blog_category">
  <!-- category form -->
  <div class="row" style="margin-bottom:1%">
    <div class="col-md-12">
      <form  @submit.prevent="add_category()" method="post" id="form-submit">
        <div class="panel-body">
          <div class="modal-wrapper">
            <div class="modal-text" id="category_input">
              <div  class="form-group">
                <label class="col-sm-3 control-label" id="sub_name">Blog Category Name <span class="required">*</span></label>
                <div class="col-sm-9">
                  <input type="text"  v-model="category.category_name" v-validate="'required|min:5'" name="category name"  class="form-control" :class="{'has-error': errors.has('category name') }" placeholder="eg.: Action" >
                  <div class="text-danger" >@{{ errors.first('category name') }}</div>
                </div>
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
      <form  @submit.prevent="update_category(id)" method="post" id="form-edit" style="display:none;">
        <div class="panel-body">
          <div class="modal-wrapper">
            <div class="modal-text" id="category_input">
              <div  class="form-group">
                <label class="col-sm-3 control-label" id="sub_name">Category Name <span class="required">*</span></label>
                <div class="col-sm-9">
                  <input type="text" name="category_name" v-model="category.category_name" v-validate="category.category_name" data-rules="required|email"  class="form-control" placeholder="eg.: Action" required="">
                  <div class="text-danger">@{{ errors.first('category_name') }}</div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-md-12 text-right">
              <button class="btn btn-primary" type="submit">edit</button>
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
            <div class="col-sm-6">
              <select class="form-control input-sm mb-md" @change="offset_number()" v-model="offset">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value ="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
            <div class="col-sm-6">
              <div class="input-group input-search">
                <input type="text" class="form-control" @keyup="search()" v-model="search_key" name="q" id="q" placeholder="Search...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
              </div>

            </div>
          </header>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover mb-none table-border">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>category Name</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>

                  <tr v-for="category in categorys">
                    <td>#</td>
                    <td>@{{category.category_name}}</td>
                    <td class="actions-hover actions-fade">
                      <button class="modal-with-zoom-anim"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top"  data-original-title="edit category" @click="edit_category(category)"></i></button>
                      <button ><i class="fa fa-eye" data-toggle="tooltip" data-placement="top"  data-original-title="view category & sub"></i></button>
                      <button class="delete-row modal-basic" data-toggle="tooltip" data-placement="top"  data-original-title="delete category" @click="delete_category(category._id)"><i class="fa fa-trash-o"></i></button>
                    </td>
                  </tr>

                </tbody>
              </table>
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
    el:'#blog_category',
    data:{
      categorys:[],
      category:{'category_name' : '' },
      pagination:[],
      search_key:'',
      offset:'',
      id:'',
      uri:"{{asset(App::getLocale().'/adminpanel/blog_category')}}"
    },
    methods:{
      get_item:function (){
        var _this = this
        axios.get(this.uri).then(function (response) {
          _this.categorys = response.data.data;
          _this.pagination = response.data;
        });
      },
      add_category:function(){
        var _this=this
        axios.post("{{asset(App::getLocale().'/adminpanel/blog_category')}}",this.category).then(function(response){
            _this.get_item()
          }).catch(
              error => console.log(error)
          )
      },
      edit_category:function(category){
        this.category.category_name = category.category_name ;

        this.id= category._id;
          $('#form-submit').hide();
          $('#form-edit').show();
      },
      update_category:function(id){
          var _this=this
          this.category._method="patch";
          console.log(this.category);
        axios.post("{{asset(App::getLocale().'/adminpanel/blog_category/')}}/"+id, this.category)
          .then(function (response){
                $('#form-submit').show()
                $('#form-edit').hide()
                _this.get_item()
              }).catch(
                error => console.log(error)
              )
      },
      delete_category:function(id){
        var _this=this
        axios.delete("{{asset(App::getLocale().'/adminpanel/blog_category/')}}/"+id).then(
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
      }
    },
    created:function created(){
      this.get_item();
    }
  });
</script>
@endsection
