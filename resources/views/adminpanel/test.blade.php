@extends('adminpanel.layouts.layout')

@section('content')
<form method="post" action="{{url('/adminpanel/car')}}" id="form">
    @csrf
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group has-error col-md-4">
        <label for="Carcompany">Car Company:</label>
        <input type="text" class="form-control" id="company" name="carcompany">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Model">Model:</label>
        <input type="text" class="form-control" id="model" name="model">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Price">Price:</label>
        <input type="text" class="form-control" id="price" name="price">
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
</form>

<table class="table table-responsive table-border">
  <thead>
    <td>carcompany</td>
    <td>model</td>
    <td>price</td>
    <td>update</td>
    <td>delete</td>
  </thead>
  <tbody>
      @foreach($cars as $car)
    <tr>
      <td>{{$car->carcompany}}</td>
      <td>{{$car->model}}</td>
      <td>{{$car->price}}</td>
      <td><a type="button" class="btn btn-default btn-primary update" id="{{$car->_id}}">update</a></td>
      <td>
        <form class="form-group" action="{{url('adminpanel/car/'.$car->_id)}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete" />
            <button type="submit" class="btn btn-default btn-danger">delete</button>
        </form>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>

<div id="app">
  <p>@{{message}}</p>
  <input type="text" name="message" v-model = "message">
</div>
@endsection

@section('script')
<script type="text/javascript">
  $('.update').click(function(){
    var id=$(this).prop('id');
    $('#form').attr('action',"{{url('adminpanel/car/')}}/"+id);
    $.get('{{url("adminpanel/car/")}}/'+id,function(data){
      console.log(data.cars[0].carcompany);
        $('#company').val(data.cars[0].carcompany);
        $('#model').val(data.cars[0].model);
        $('#price').val(data.cars[0].price);
    });

  })
</script>
<script type="text/javascript">
  var app = new vue({
    el:'#app',
    data:{
      message : ''
    }
  });
</script>
@endsection
