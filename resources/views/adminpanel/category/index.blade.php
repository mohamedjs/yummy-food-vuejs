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
  </ol>

</div>
@endsection

@section('content')
<div id="app">
  <category  :url="{{json_encode(asset('/'))}}"></category>
</div>
@endsection

@section('script')

@endsection
