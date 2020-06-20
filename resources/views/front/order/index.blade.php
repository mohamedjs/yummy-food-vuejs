@extends('front.layouts.layout')

@section('content')
<section class="heading-content">
  <div class="heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner heading-group">
          <div class="breadcrumb-group">
            <h1 class="hidden">My Account</h1>
            <div class="breadcrumb clearfix">
              <span itemscope="" itemtype=""><a href="{{asset(App::getLocale().'/')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
              </span>
              <span class="arrow-space"></span>
              <span itemscope="" itemtype="">
                <a href="{{asset(App::getLocale().'/profile')}}" title="My Account" itemprop="url"><span itemprop="title">My Account</span></a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="account-layout">
  <div class="account-wrapper">
    <div class="container">
      <div class="row">
        <div class="account-inner">
          <div class="account-content">
            <div class="account-info">
              <div class="account-details col-sm-6">
                <h3 class="details-title">ACCOUNT DETAILS</h3>
                <div class="details-content">
                  <div class="details-item name">
                    <span class="title">Name:</span>
                    <span class="content">{{Auth::user()->name}}</span>
                  </div>
                  <div class="details-item">
                    <span class="title">E-mail:</span>
                    <a class="content" href="jin%40gmail.html">{{Auth::user()->email}}</a>
                  </div>
                  <div class="details-item">
                    <span class="title">Your address:</span>
                    <address class="content">Đường trục, Ho Chi Minh, Vietnam</address>
                  </div>
                  <div class="details-item">
                    <span class="title">Your phone:</span>
                    <a class="content" href="tel:11111">11111</a>
                  </div>
                </div>
              </div>
              <div class="account-link col-sm-6">
                <h3 class="link-title">My Account</h3>
                <div class="link-content">
                  <ul class="link-list">
                    <li class="item">
                      <a href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                    <li class="item">
                      <a href="{{asset(App::getLocale().'/setting')}}">Modify your address book entries</a>
                    </li>
                    <li class="item">
                      <a href="{{asset(App::getLocale().'/wishlist')}}">Modify your wishlist</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="account-banner col-sm-6">
                <a href="{{asset(App::getLocale().'/')}}"><img src="{{$about->image}}" alt=""></a>
              </div>
              <div class="account-banner col-sm-6">
                <a href="{{asset(App::getLocale().'/')}}"><img src="{{$about->image}}" alt=""></a>
              </div>
            </div>
            <div class="account-orders">
              <div class="account-orders-inner">
                <table>
                  <thead>
                    <tr>
                      <th class="order_number">Order</th>
                      <th class="date">Date</th>
                      <th class="payment_status">Payment Status</th>
                      <th class="fulfillment_status">Fulfillment Status</th>
                      <th class="total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(Auth::user()->orders as $order)
                    <tr class="even cancelled_order">
                      <td class="td-name"><a href="{{asset(App::getLocale().'/profile/'.$order->_id)}}" title="">#{{$order->order_id}}</a></td>
                      <td class="td-note"><span class="note">{{$order->created_at->format('d M h:i a')}}</span></td>
                      <td class="td-authorized"><span class="status_voided">{{$order->payment_status}}</span></td>
                      <td class="td-unfulfilled"><span class="status_unfulfilled">{{$order->order_status}}</span></td>
                      <td class="td-total"><span class="total"><span class="money" data-currency-usd="${{$order->total_price}}">${{$order->total_price}}</span></span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
