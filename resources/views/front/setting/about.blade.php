@extends('front.layouts.layout')

@section('content')
<section class="heading-content">
  <div class="heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner heading-group">
          <div class="breadcrumb-group">
            <h1 class="hidden">About Us</h1>
            <div class="breadcrumb clearfix">
              <span itemscope="" itemtype=""><a href="{{asset(App::getLocale().'/')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
              </span>
              <span class="arrow-space"></span>
              <span itemscope="" itemtype="b">
                <a href="{{asset(App::getLocale().'/about')}}" title="Contact" itemprop="url"><span itemprop="title">About Us</span></a>
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
          <div id="shopify-section-about-template" class="shopify-section">
            <div class="about-content">
              <div class="introduction_layout">
                <div class="introduction_inner">
                  <div class="page_title">
                    <h2 class="title">
                      <span class="first">About</span>
                      <span class="last"> Yummy</span>
                    </h2>
                    <p class="caption">
                      {{$about->our_company}}.
                    </p>
                  </div>
                  <div class="introduction_content">
                    <img src="{{$about->image}}" alt="">
                    <div class="introduction_description">
                      <p class="italics">{{$about->about_us}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="team_layout">
                <div class="page_title">
                  <h2 class="title">
                    <span class="first">Our</span>
                    <span class="last"> Yummy Team</span>
                  </h2>
                  <p class="caption">{{$about->our_company}}</p>
                </div>
                <div class="team_inner">
                  <div class="team_content">
                    @foreach($peoples as $people)
                    <div class="team_item col-sm-4">
                      <div class="item_avatar">
                        <img src="{{asset('/admin/people/'.$people->image)}}" alt="">
                      </div>
                      <div class="item_content">
                        <p class="item_name">
                          {{$people->name}}
                        </p>
                        <p class="item_position">
                          {{$people->job_type}}
                        </p>
                        <p class="item_description">
                          {{$people->about}}
                        </p>
                      </div>
                    </div>
                    @endforeach
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
@endsection
