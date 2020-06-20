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
    <li><span>About</span></li>
  </ol>

</div>
@endsection

@section('content')
<div id="app" style="display:none"></div>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <div class="panel-actions">
          <a href="#" class="fa fa-caret-down"></a>
          <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">About Us</h2>
      </header>
      <div class="panel-body">
        <form class="form-horizontal form-bordered" method="post" action="{{asset(App::getLocale().'/adminpanel/about/'.$about->_id)}}" enctype='multipart/form-data'>
          @csrf
          <input type="hidden" name="_method" value="patch">
          <div class="form-group">
            <label class="col-md-3 control-label">Company Name</label>
            <div class="col-md-6">
              <div class="input-group input-group-icon">
                <span class="input-group-addon">
                  <span class="icon"><i class="fa fa-user"></i></span>
                </span>
                <input type="text" class="form-control" name="company_name" value="{{$about->company_name}}"  placeholder="company_name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Phone</label>
            <div class="col-md-6">
              <div class="input-group input-group-icon">
                <span class="input-group-addon">
                  <span class="icon"><i class="fa fa-phone"></i></span>
                </span>
                <input type="text" name="phone" class="form-control" value="{{$about->phone}}"  placeholder="Phone">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Email</label>
            <div class="col-md-6">
              <div class="input-group input-group-icon">
                <span class="input-group-addon">
                  <span class="icon"><i class="fa fa-envelope"></i></span>
                </span>
                <input type="email" name="email" class="form-control" value="{{$about->email}}"  placeholder="Email" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Address</label>
            <div class="col-md-6">
              <div class="input-group input-group-icon">
                <span class="input-group-addon">
                  <span class="icon"><i class="fa fa-send"></i></span>
                </span>
                <input type="text" name="address" class="form-control" value="{{$about->address}}"  placeholder="Address" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">About Us</label>
            <div class="col-md-9">
                <textarea name="about_us" rows="8" cols="80" required>{{$about->about_us}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Our Company</label>
            <div class="col-md-9">
                <textarea name="our_company" rows="8" cols="80" required>{{$about->our_company}}</textarea>
            </div>
          </div>
          <div class="form-group">
            <img src="$about->image" width="200px" height="300px" alt="">
            <label class="col-md-3 control-label">About Image</label>
            <div class="col-md-6">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                  <div class="uneditable-input">
                    <i class="fa fa-file fileupload-exists"></i>
                    <span class="fileupload-preview"></span>
                  </div>
                  <span class="btn btn-default btn-file">
                    <span class="fileupload-exists">Change</span>
                    <span class="fileupload-new">Select file</span>
                    <input type="file" name="image[]" multiple/>
                  </span>
                  <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <input type="hidden" name="lat" value="{{$about->lat}}" id="latitude">
            <input type="hidden" name="lang" value="{{$about->lng}}" id="longitude">
          </div>
          <div class="form-group pull-right col-md-7 col-md-offset-4">
            <button type="submit" name="button" class="btn btn-success">Save</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <div class="col-lg-12">
    <div class="">
      <div class="panel-heading">
          <h3 class="panel-title">About Postion</h3>
      </div>
      <div class="panel-body panel-body-map">
        <div id="map" style="width: 100%;height: 300px;position: relative;overflow: hidden;">
        </div>
      </div>
  </div>
</div>

@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGmN1GmN4mJz32R_E0oX9qGUc8hlEGT8o&callback=initMap" async defer></script>
<script type="text/javascript">
function initMap() {
  var myLatlng = new google.maps.LatLng({{$about->lat}}, {{$about->lang}});
    var mapOptions = {
      zoom: 7,
      center: myLatlng
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
     var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        draggable:true,
    });

     $.get('{{url("/address")}}'+'/'+{{$about->lat}}+'/'+{{$about->lang}}+'/'+'en',function(data){
            console.log(data.address);
            var infowindow = new google.maps.InfoWindow({
                content: data.address
            });
             marker.addListener('click', function() {
             infowindow.open(map,  marker );
           });
        });

    var trafficLayer = new google.maps.TrafficLayer();
    trafficLayer.setMap(map);
    var panorama = new google.maps.StreetViewPanorama(
     document.getElementById('pano'), {
       position: myLatlng,
       pov: {
         heading: 34,
         pitch: 10
       }
     });
     map.setStreetView(panorama);
     google.maps.event.addListener(marker, 'dragend', function(event) {
       var myLatLng = event.latLng;
        var lat = myLatLng.lat();
        var lng = myLatLng.lng();
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;

          $.get('{{url("/address")}}'+'/'+lat+'/'+lng+'/'+'en',function(data){
            console.log(data.address);
            var infowindow = new google.maps.InfoWindow({
                content: data.address
            });
            infowindow.open(map,  marker );

        });
    });
  }
</script>

@endsection
