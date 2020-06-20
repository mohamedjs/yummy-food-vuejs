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
    <li><span>Product</span></li>
  </ol>

</div>
@endsection

@section('content')
<div id="app">
  <product :url="{{json_encode(asset(App::getLocale().'/'))}}" :url_images="{{json_encode(asset('/'))}}"></product>
</div>
@endsection

@section('script')

@endsection
