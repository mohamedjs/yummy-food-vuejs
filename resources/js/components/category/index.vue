<template lang="html">
  <div class="">
    <!-- category form -->
    <div class="row" style="margin-bottom:1%">
      <div class="col-md-12">
        <form  @submit.prevent="add_category()" method="post" id="form-submit">
          <div class="panel-body">
            <div class="modal-wrapper">
              <div class="modal-text" id="category_input">
                <div  class="form-group">
                  <label class="col-sm-3 control-label" id="sub_name">Category Name <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text"  v-model="category.category_name" v-validate="'required|min:5'" name="category name"  class="form-control" :class="{'has-error': errors.has('category name') }" placeholder="eg.: Action" >
                    <div class="text-danger" >{{ errors.first('category name') }}</div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-offset-sm-1 control-label" id="sub-icon">Category Icon <span class="required">*</span></label>
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
                          <input type="file" v-validate="'required|mimes:image/*'" data-vv-as="image" ref="file" name="category_icon"  @change="uploadFiles()" />
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                      </div>
                    </div>
                  </div>
                  <div class="text-danger" >{{ errors.first('category_icon') }}</div>
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
                    <div class="text-danger">{{ errors.first('category_name') }}</div>
                  </div>
                </div>

                <div class="form-group">
                  <img :src="url+'admin/category/'+category.category_icon" alt="" style="width:150px;height:150px;border-radius:50%">
                  <label class="col-sm-3 col-offset-sm-1 control-label" id="sub-icon">Category Icon <span class="required">*</span></label>
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
                          <input type="file" ref="file_input" name="category_icon[]" multiple @change="uploadFiles()" />
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                      </div>
                    </div>

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
                <select class="form-control input-sm mb-md" @change="offset_number()" v-model="key">
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
                      <th>sub category</th>
                      <th>category icon</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr v-for="category in all_category">
                      <td>#</td>
                      <td>{{category.category_name}}</td>
                      <td><span v-for="sub in category.sub_category">{{sub.category_name}}-</span></td>
                      <td>
                          <img :src="url+'admin/category/'+category.category_icon" alt="" style="width:12px;height:12px">
                      </td>
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
        	                <a @click.prevent="changePage(pagination.path+'?page='+page)" href="#">{{ page }}</a>
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
</template>

<script>
import { required, minLength, between } from 'vuelidate/lib/validators'
export default {
  data(){
    return{
      data : new FormData(),
      all_category:[],
      category:{'category_name':'','category_icon':''},
      id:'',
      uri : '',
      base_url:'',
      pagination: [],
      key:'',
      search_key : '',
      cat_id:''
    }
  },
  props:['url'],
  methods:{
    add_category(){
      console.log(this.category);
      var _this=this;
      const config = {  headers: { 'content-type': 'multipart/form-data' } }
      this.data.append('category_name' , this.category.category_name)
      axios.post(this.base_url+window.default_locale+'/adminpanel/category', this.data ,config)
        .then(function (response){
              _this.uri = _this.pagination.last_page_url
              _this.data = new FormData()
              _this.get_item()
          }).catch(
              error => console.log(error)
          )
    },
    edit_category(category){
      this.category.category_name = category.category_name ;
      this.category.category_icon = category.category_icon;
      this.id= category._id;
        $('#form-submit').hide();
        $('#form-edit').show();
    },
    update_category(id){
      var _this= this;
      const config = {  headers: { 'content-type': 'multipart/form-data' } }
      this.data.append('category_name' , this.category.category_name)
      this.data.append('_method' ,'patch')
      axios.post(this.base_url+window.default_locale+'/adminpanel/category/'+id, this.data,config)
        .then(function (response){
              $('#form-submit').show()
              $('#form-edit').hide()
              _this.uri = _this.base_url+window.default_locale+"/adminpanel/category?page="+_this.pagination.current_page
              _this.get_item()
            }).catch(
              error => console.log(error)
            )

    },
    delete_category(id){
      var _this= this;
      axios.delete(this.base_url+window.default_locale+'/adminpanel/category/'+id)
        .then(function (response){
              _this.uri = _this.base_url+window.default_locale+"/adminpanel/category?page="+_this.pagination.current_page
              _this.get_item()
            }).catch(
              error => console.log(error)
            )

    },
    get_item(){
      var _this = this;
      axios.get(this.uri).then(function (response) {
        _this.all_category = response.data.data;
        _this.pagination = response.data;
        console.log(response.data);
      });

    },
    uploadFiles (){
      let files = this.$refs.file.files;
      for (let i = 0; i < files.length; i++) {
         this.data.append('category_icon[]' , files[i])
      }
    },
    changePage(uri){
      console.log(uri);
      this.uri = uri ;
      console.log(this.uri);
      this.get_item();
    },
    offset_number(){
      var _this = this;
      var uri=this.base_url+window.default_locale+"/adminpanel/category/filter/"+this.key
      axios.get(uri).then(function (response) {
        _this.all_category = response.data.data;
        _this.pagination = response.data;
      });
    },
    search(){
      var _this = this;
      var uri=this.base_url+window.default_locale+"/adminpanel/category/search/"+this.search_key;
      axios.get(uri).then(function (response) {
        _this.all_category = response.data.data;
        _this.pagination = response.data;

      });

    }
   },
  mounted() {
      console.log('Component mounted.');
      this.base_url=this.url;
      this.uri=this.url+window.default_locale+'/adminpanel/category';
      this.get_item();
      console.log(this.pagination);

  }
}
</script>
<style media="screen">
.disabled {
      pointer-events: none;
      cursor: not-allowed;
  }
</style>
