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
    <li><span>Edit category</span></li>
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
        <h2 class="panel-title">Edit Product</h2>
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

        <form class="form-horizontal" action="{{asset(App::getLocale().'/adminpanel/product/'.$product->_id)}}" method="post" novalidate="novalidate"  enctype='multipart/form-data'>
          @csrf
          <input type="hidden" name="_method" value="patch">
          <div class="tab-content">
            <div id="info" class="tab-pane active">
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-username">Category Name</label>
                <div class="col-sm-9">
                  <select class="form-control input-sm mb-md" name="category_id" required>
                    @foreach($categorys as $category)
                    <option  value="{{$category->_id}}" @if($product->category_id == $category->_id) selected @endif>{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-username">Product Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-username">Product Datiles</label>
                <div class="col-sm-9">
                  <textarea name="datiles" class="form-control" rows="8" cols="80">{{$product->datiles}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-password">Quantity</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="quantity" id="w4-password" value="{{$product->quantity}}" required>
                </div>
              </div>

              <div class="form-group">
                @foreach($product->images as $image)
                <div class="col-sm-3">
                  <img src="{{asset('admin/product/'.$image->image)}}" width="100%" height="222.5"  alt="product-img" style="position: relative;">
                  <span style="position: absolute;top: 3px;right: 16px;background-color: #e80827;width: 7%;color: #fff;text-align: center;" id="{{$image->_id}}" class="remove-image"><i class="fa fa-trash-o"></i></span>
                </div>
                @endforeach
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
                  <input type="text" class="form-control" name="price_small" value="{{$product->price_small}}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-first-name">Medium</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="price_medium" value="{{$product->price_medium}}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-first-name">Larg</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="price_larg" value="{{$product->price_larg}}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-first-name">discount %</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="discount" value="{{$product->discount}}" required>
                </div>
              </div>
            </div>
            <div id="topping" class="tab-pane">
              @if(count($product->toppings)==0)
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-cc">Product Topping</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="topping_name[]" value="" id="w4-cc" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="price_topping[]" value="" id="w4-cc" required>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" id="add_topping" name="button">+</button>
                </div>
              </div>
              @endif
              @foreach($product->toppings as $topping)
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-cc">Product Topping</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="topping_name[]" value="{{$topping->topping_name}}" id="w4-cc" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="price_topping[]" value="{{$topping->price_topping}}" id="w4-cc" required>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" id="add_topping" name="button">+</button>
                </div>
              </div>
              @endforeach
            </div>
            <div id="color" class="tab-pane">
              @if(count($product->colors)==0)
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-cc">Product Color</label>
                <div class="col-sm-4">
                  <input type="color" class="form-control" name="color[]" value="" id="w4-cc" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="price_color[]" value="" id="w4-cc" required>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" id="add_color" name="button">+</button>
                </div>
              </div>
              @endif
              @foreach($product->colors as $color)
              <div class="form-group">
                <label class="col-sm-3 control-label" for="w4-cc">Product Colors</label>
                <div class="col-sm-4">
                  <input type="color" class="form-control" name="color[]" value="{{$color->color}}" required>
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="price_color[]" value="{{$color->price_color}}" required>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-success" id="add_color" name="button">+</button>
                </div>
              </div>
              @endforeach
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

    $('.remove-image').click(function functionName() {
      var id=$(this).prop('id');
      $.get("{{asset(App::getLocale().'/adminpanel/product/image/')}}/"+id,function(response){
        console.log('success');
      });
      $(this).closest('div').remove();
    })
  </script>
@endsection
