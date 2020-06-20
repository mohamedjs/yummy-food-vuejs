<template lang="html">
  <div class="">
    <!-- category form -->
    <div class="row" style="margin-bottom:1%">
      <div class="col-md-12">
        <form  @submit.prevent="add_people()" method="post" id="form-submit">
          <div class="panel-body">
            <div class="modal-wrapper">
              <div class="modal-text" id="category_input">
                <div  class="form-group">
                  <label class="col-sm-3 control-label" id="sub_name">Human Name <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text"  v-model="people.name" v-validate="'required|min:2'" name="people name"  class="form-control" :class="{'has-error': errors.has('people name') }" placeholder="eg.: some one name" >
                    <div class="text-danger" >{{ errors.first('people name') }}</div>
                  </div>
                </div>
                <div  class="form-group">
                  <label class="col-sm-3 control-label" id="sub_name">Job Type <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text"  v-model="people.job_type" v-validate="'required|min:2'" name="job_type"  class="form-control" :class="{'has-error': errors.has('job_type') }" placeholder="eg.: job type" >
                    <div class="text-danger" >{{ errors.first('job_type') }}</div>
                  </div>
                </div>
                <div  class="form-group">
                  <label class="col-sm-3 control-label" id="sub_name">About <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <textarea name="about" v-model="people.about" rows="8" cols="80" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-offset-sm-1 control-label" id="sub-icon">Human Image <span class="required">*</span></label>
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
                          <input type="file" v-validate="'required|mimes:image/*'" data-vv-as="image" ref="file" name="human_image"  @change="uploadFiles()" />
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                      </div>
                    </div>
                  </div>
                  <div class="text-danger" >{{ errors.first('human_image') }}</div>
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
        <form  @submit.prevent="update_people(id)" method="post" id="form-edit" style="display:none;">
          <div class="panel-body">
            <div class="modal-wrapper">
              <div class="modal-text" id="category_input">
                <div  class="form-group">
                  <label class="col-sm-3 control-label" id="sub_name">Human Name <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text"  v-model="people.name" v-validate="'required|min:2'" name="people name"  class="form-control" :class="{'has-error': errors.has('people name') }" placeholder="eg.: some one name" >
                    <div class="text-danger" >{{ errors.first('people name') }}</div>
                  </div>
                </div>
                <div  class="form-group">
                  <label class="col-sm-3 control-label" id="sub_name">Job Type <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <input type="text"  v-model="people.job_type" v-validate="'required|min:2'" name="job_type"  class="form-control" :class="{'has-error': errors.has('job_type') }" placeholder="eg.: job type" >
                    <div class="text-danger" >{{ errors.first('job_type') }}</div>
                  </div>
                </div>
                <div  class="form-group">
                  <label class="col-sm-3 control-label" id="sub_name">About <span class="required">*</span></label>
                  <div class="col-sm-9">
                    <textarea name="about" v-model="people.about" rows="8" cols="80" required></textarea>
                  </div>
                </div>
                <div class="form-group">
                <img :src="url_image+'admin/people/'+people.image" alt="" style="width:200px;height:200px">
                  <label class="col-sm-3 col-offset-sm-1 control-label" id="sub-icon">Human Image <span class="required">*</span></label>
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
                          <input type="file" v-validate="'required|mimes:image/*'" data-vv-as="image" ref="file_update" name="human_image"  @change="uploadFiles_update()" />
                        </span>
                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                      </div>
                    </div>
                  </div>
                  <div class="text-danger" >{{ errors.first('human_image') }}</div>
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
                      <th>Human Name</th>
                      <th>Job Type</th>
                      <th>Image</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr v-for="people in peoples">
                      <td>#</td>
                      <td>{{people.name}}</td>
                      <td>{{people.job_type}}</td>
                      <td>
                          <img :src="url_image+'admin/people/'+people.image" alt="" style="width:12px;height:12px">
                      </td>
                      <td class="actions-hover actions-fade">
                        <button class="modal-with-zoom-anim"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top"  data-original-title="edit category" @click="edit_people(people)"></i></button>
                        <button ><i class="fa fa-eye" data-toggle="tooltip" data-placement="top"  data-original-title="view category & sub"></i></button>
                        <button class="delete-row modal-basic" data-toggle="tooltip" data-placement="top"  data-original-title="delete category" @click="delete_people(people._id)"><i class="fa fa-trash-o"></i></button>
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
export default {
  data(){
    return{
      base_url:'',
      url_image:'',
      uri:'',
      data:new FormData(),
      peoples:'',
      people:{'name':'','about': '', 'job_type' : '' , 'image' : ''},
      pagination:'',
      search_key:'',
      offset:'',
      id:''
    }
  },
  props:['url','url_images'],
  methods:{
    add_people(){
      var _this=this;
      const config = {  headers: { 'content-type': 'multipart/form-data' } }
      this.data.append('name' , this.people.name)
      this.data.append('job_type' , this.people.job_type)
      this.data.append('about' , this.people.about)
      axios.post(this.base_url+'/adminpanel/people', this.data ,config)
        .then(function (response){
              _this.uri = _this.pagination.last_page_url
              _this.data = new FormData()
              _this.get_people()
          }).catch(
              error => console.log(error)
          )
    },
    edit_people(people){
      this.people.name = people.name ;
      this.people.job_type = people.job_type;
      this.people.about = people.about;
      this.people.image = people.image;
      this.id= people._id;
        $('#form-submit').hide();
        $('#form-edit').show();
    },
    update_people(id){
      var _this= this;
      const config = {  headers: { 'content-type': 'multipart/form-data' } }
      this.data.append('name' , this.people.name)
      this.data.append('job_type' , this.people.job_type)
      this.data.append('about' , this.people.about)
      this.data.append('_method' , 'patch')
      axios.post(this.base_url+'/adminpanel/people/'+id, this.data , config)
        .then(function (response){
              $('#form-submit').show()
              $('#form-edit').hide()
              _this.uri = _this.base_url+"/adminpanel/people?page="+_this.pagination.current_page
              _this.get_people()
            }).catch(
              error => console.log(error)
            )

    },
    get_people(){
      var uri=this.uri;
      var _this = this;
      axios.get(uri).then(function(response){
        console.log(response);
        _this.peoples=response.data.data;
        _this.pagination=response.data;
      });
    },
    offset_number(){
      var uri=this.base_url+'/adminpanel/people/filter/'+this.offset;
      var _this = this;
      axios.get(uri).then(function(response){
        console.log(response);
        _this.peoples=response.data.data;
        _this.pagination=response.data;
      });
    },
    search(){
      var uri=this.base_url+'/adminpanel/people/search/'+this.search_key;
      var _this = this;
      axios.get(uri).then(function(response){
        console.log(response);
        _this.peoples=response.data.data;
        _this.pagination=response.data;
      });
    },
    changePage(uri){
      console.log(uri);
      this.uri = uri ;
      console.log(this.uri);
      this.get_people();
    },
    delete_people(id){
      var uri=this.base_url+'/adminpanel/people/'+id;
      var _this = this;
      axios.delete(uri).then(function(response){
        console.log(response);
        _this.get_people();
      });
    },
    uploadFiles (){
      let files = this.$refs.file.files;
      for (let i = 0; i < files.length; i++) {
         this.data.append('image[]' , files[i])
      }
    },
    uploadFiles_update (){
      let files = this.$refs.file_update.files;
      for (let i = 0; i < files.length; i++) {
         this.data.append('image[]' , files[i])
      }
    },
  },
  mounted(){
    this.base_url=this.url
    this.url_image=this.url_images
    this.uri=this.base_url+'/adminpanel/people'
    this.get_people()
    console.log(this.peoples);
  }
}
</script>

<style lang="css">
</style>
