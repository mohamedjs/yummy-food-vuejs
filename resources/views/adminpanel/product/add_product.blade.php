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
    <li><span>Category</span></li>
    <li><span>add category</span></li>
  </ol>

</div>
@endsection

@section('content')
<div id="app" style="display:none"></div>
<div class="row">
  <div class="col-xs-12">
    <section class="panel form-wizard" id="w4">
      <header class="panel-heading">
        <div class="panel-actions">
          <a href="#" class="fa fa-caret-down"></a>
          <a href="#" class="fa fa-times"></a>
        </div>
        <h2 class="panel-title">Add Product</h2>
      </header>
      <div class="panel-body">
        <div class="wizard-progress wizard-progress-lg">
          <div class="steps-progress">
            <div class="progress-indicator"></div>
          </div>
          <ul class="wizard-steps">
            <li class="active">
              <a href="#info" data-toggle="tab"><span>1</span>Product Info</a>
            </li>
            <li>
              <a href="#price" data-toggle="tab"><span>2</span>Product Price</a>
            </li>
            <li>
              <a href="#topping" data-toggle="tab"><span>3</span>Product topping</a>
            </li>
            <li>
              <a href="#color" data-toggle="tab"><span>4</span>Product Color</a>
            </li>
          </ul>
        </div>

        <form class="form-horizontal" action="{{asset(App::getLocale().'/adminpanel/product')}}" method="post" novalidate="novalidate"  enctype='multipart/form-data'>
          @csrf
          <div class="tab-content">
            <div id="info" class="tab-pane active">
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-username">Category Name</label>
                <div class="col-sm-9">
                  <select class="form-control input-sm mb-md" name="category_id" required>
                    @foreach($categorys as $category)
                    @if(count($category->sub_category)==0)
                    <option  value="{{$category->_id}}">{{$category->category_name}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-username">Product Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="product_name"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-username">Product Datiles</label>
                <div class="col-sm-9">
                  <textarea name="datiles" class="form-control" rows="8" cols="80"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-password">Quantity</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="quantity" id="w4-password" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-offset-sm-1 control-label" id="sub-icon">Product Images <span class="required">*</span></label>
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
                        <input type="file"  name="images[]" multiple />
                      </span>
                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="price" class="tab-pane">
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-first-name">small</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="price_small"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-first-name">Medium</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="price_medium"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-first-name">Larg</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="price_larg"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-first-name">discount %</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="discount"  required>
                </div>
              </div>
            </div>
            <div id="topping" class="tab-pane">
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-cc">Product Topping</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="topping_name[]" id="w4-cc" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="price_topping[]" id="w4-cc" required>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" id="add_topping" name="button">+</button>
                </div>
              </div>
            </div>
            <div id="color" class="tab-pane">
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-cc">Product Colors</label>
                <div class="col-sm-4">
                  <input type="color" class="form-control" name="color[]"  required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="price_color[]"  required>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" id="add_color" name="button">+</button>
                </div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <button type="submit" class="btn btn-success pull-right">
              Save
            </button>
          </div>
        </form>

      </div>
    </section>
  </div>
</div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).on('click','#add_topping' , function(){
  var  x =   '<div class="form-group">'+
        '<label class="col-sm-3 control-label" for="w4-cc">Product Topping</label>'+
        '<div class="col-sm-4">'+
          '<input type="text" class="form-control" name="topping_name[]" id="w4-cc" required>'+
        '</div>'+
      '  <div class="col-sm-4">'+
          '<input type="text" class="form-control" name="price_topping[]" id="w4-cc" required>'+
      '  </div>'+
        '<div class="col-sm-1">'+
          '<button type="button" class="btn btn-success" id="add_topping" name="button">+</button>'+
        '</div>'+
      '</div>';
        $('#topping').append(x);
    });

    $(document).on('click','#add_color' , function(){
    var  y =   '<div class="form-group">'+
                  '<label class="col-sm-3 control-label" for="w4-cc">Product Colors</label>'+
                  '<div class="col-sm-4">'+
                    '<input type="color" class="form-control" name="color[]" id="w4-cc" required>'+
                  '</div>'+
                '  <div class="col-sm-4">'+
                    '<input type="text" class="form-control" name="price_color[]" id="w4-cc" required>'+
                '  </div>'+
                  '<div class="col-sm-1">'+
                    '<button type="button" class="btn btn-success" id="add_color" name="button">+</button>'+
                  '</div>'+
                '</div>';
        $('#color').append(y);
    });
  </script>
@endsection
