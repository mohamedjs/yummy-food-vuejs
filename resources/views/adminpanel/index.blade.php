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
    <li><span>Index</span></li>
  </ol>

</div>
@endsection

@section('content')
<div id="app" style="display:none"></div>
<h1>what you will use here</h1>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection
