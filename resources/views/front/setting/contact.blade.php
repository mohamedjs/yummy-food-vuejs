@extends('front.layouts.layout')

@section('content')
<section class="heading-content">
  <div class="heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner heading-group">
          <div class="breadcrumb-group">
            <h1 class="hidden">Contact</h1>
            <div class="breadcrumb clearfix">
              <span itemscope="" itemtype=""><a href="{{asset(App::getLocale().'/')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
              </span>
              <span class="arrow-space"></span>
              <span itemscope="" itemtype="b">
                <a href="{{asset(App::getLocale().'/contact')}}" title="Contact" itemprop="url"><span itemprop="title">Contact</span></a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="page-content">
  <div class="page-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-inner">
          <div id="shopify-section-contact-template" class="shopify-section">
            <div class="contact-content">

              <div class="google-maps-content ">
                <div class="google-maps-wrapper">
                  <div class="page_title">
                    <h2 class="title">
                      <span class="first">Contact</span>
                      <span class="last"> Us</span>
                    </h2>
                    <p class="caption">
                      {{$about->about_us}}
                    </p>
                  </div>
                  <div class="google-maps-inner">
                    <div id="contact_map" class="m_map"></div>
                  </div>
                </div>
              </div>
              <div class="information_layout">
                <div class="information_inner">
                  <div class="information_content">
                    <div class="information_item col-sm-4">
                      <div class="page_title text_title">
                        <h2 class="title">Hours</h2>
                      </div>
                      <div class="text_content">
                        <ul>
                          @foreach($hours as $hour)
                          <li>
                            <div class="group_text">
                              <span class="day">{{$hour->day}}</span>
                              <span class="time">{{$hour->from->format('H a')}} - {{$hour->to->format('H a')}} </span>
                            </div>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    <div class="information_item col-sm-4">
                      <div class="page_title text_title">
                        <h2 class="title">Contact info</h2>
                      </div>
                      <div class="text_content">
                        <div class="group_contact_info">
                          <div class="item">
                            <span>
                              <i class="fa fa-home"></i><address>{{$about->address}} </address>
                            </span>
                          </div>
                          <div class="item phone-fax">
                            <span>
                              <i class="fa fa-phone"></i><a href="#">{{$about->phone}}</a>
                            </span>
                            <span>
                              <i class="fa fa-fax"></i><a href="#">{{$about->phone}}</a>
                            </span>
                          </div>
                          <div class="item">
                            <span>
                              <i class="fa fa-envelope-o"></i><a href="#">{{$about->email}}</a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="information_item col-sm-4">
                      <div class="page_title form_title">
                        <h2 class="title">Write us a message</h2>
                      </div>
                      <div class="form_content">
                        <form method="post" action="#" id="contact_form" class="contact-form" accept-charset="UTF-8">
                          <div id="contactFormWrapper" class="group_form">
                            <div class="col-md-6">
                              <div class="form-item">
                                <input type="text" id="contactFormName" name="contact[name]" placeholder="Username">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-item">
                                <input type="email" id="contactFormEmail" name="contact[email]" placeholder="Email">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-item">
                                <textarea rows="15" cols="75" id="contactFormMessage" name="contact[body]" placeholder="Your message"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-item">
                                <input type="submit" id="contactFormSubmit" value="Send" class="_btn">
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  $(window).ready(function($) {

    if (jQuery().gMap) {
      if ($('#contact_map').length) {
        $('#contact_map').gMap({
          zoom: 17,
          scrollwheel: false,
          maptype: 'ROADMAP',
          markers: [{
            address: '474 Ontario St Toronto, ON M4X 1M7 Canada',
            html: '_address'
          }]
        });
      }
    }
  });
</script>
@endsection
