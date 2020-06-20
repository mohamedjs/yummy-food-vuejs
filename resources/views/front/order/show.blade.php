@extends('front.layouts.layout')

@section('content')
<section class="heading-content">
  <div class="heading-wrapper">
    <div class="container">
      <div class="row">
        <div class="page-heading-inner heading-group">
          <div class="breadcrumb-group">
            <h1 class="hidden">Order History</h1>
            <div class="breadcrumb clearfix">
              <span itemscope="" itemtype=""><a href="{{asset(App::getLocale().'/')}}" title="Fast Food" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a>
              </span>
              <span class="arrow-space"></span>
              <span itemscope="" itemtype="">
                <a href="{{asset(App::getLocale().'/profile/'.$order->_id)}}" title="My Account" itemprop="url"><span itemprop="title">Order History</span></a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="order-layout">
  <div class="order-wrapper">
    <div class="container">
      <div class="row">
        <div class="order-inner">
          <div class="order-content">
            <div class="order-id">
              <h2>Order #{{$order->order_id}}</h2>
              <span class="date">{{$order->created_at->format('d M h:i a')}}</span>
              <!-- <div id="order-cancelled" class="flash notice">
                <h5 id="order-cancelled-title">Order Cancelled on <span class="note">19 Sep 06:34</span></h5>
                <span class="note">Reason: customer</span>
              </div> -->
            </div>
            <div class="order-address">
              <div id="order_payment" class="col-md-6 address-items">
                <h2 class="address-title">Billing Address</h2>
                <div class="address-content">
                  <div class="address-item">
                    <span class="title">Payment Status:</span>
                    <span class="content">{{$order->payment_status}}</span>
                  </div>
                  <div class="address-item name">
                    <span class="title">Your name:</span>
                    <span class="content">{{$order->user->name}}</span>
                  </div>
                  <div class="address-item">
                    <span class="title">Your phone:</span>
                    <span class="content">11111</span>
                  </div>
                  <div class="address-item">
                    <span class="title">State / Province:</span>
                    <span class="content">{{$order->state}}</span>
                  </div>
                  <div class="address-item">
                    <span class="title">country:</span>
                    <span class="content">{{$order->country}}</span>
                  </div>
                  <div class="address-item">
                    <span class="title">Zip / Postal Code:</span>
                    <span class="content">{{$order->zip_code}}</span>
                  </div>
                </div>
              </div>

              <div id="order_shipping" class="col-md-6 address-items">
                <h2 class="address-title">Shipping Address</h2>
                <div class="address-content">
                  <div class="address-item">
                    <span class="title">Fulfillment Status:</span>
                    <span class="content">{{$order->order_status}}</span>
                  </div>
                  <div class="address-item name">
                    <span class="title">Your name:</span>
                    <span class="content">{{$order->user->name}}</span>
                  </div>
                  <div class="address-item">
                    <span class="title">Your phone:</span>
                    <span class="content">111</span>
                  </div>
                  <div class="address-item">
                    <span class="title">State / Province:</span>
                    <span class="content">{{$order->state}}</span>
                  </div>
                  <div class="address-item">
                    <span class="title">country:</span>
                    <span class="content">{{$order->country}}</span>
                  </div>
                  <div class="address-item">
                    <span class="title">Zip / Postal Code:</span>
                    <span class="content">{{$order->zip_code}}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="order-info">
              <div class="order-info-inner">
                <table id="order_details">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>zip code</th>
                      <th>Price</th>
                      <th class="center">Quantity</th>
                      <th class="total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order->products as $order_product)
                    <tr id="{{$order_product->get_product($order_product->product_id)->_id}}" class="even">
                      <td class="td-product">
                        <a href="{{asset(App::getLocale().'/product/'.$order_product->product_id)}}" title="">{{$order_product->get_product($order_product->product_id)->product_name}}</a>
                      </td>
                      <td class="sku note">{{$order->zip_code}}</td>
                      <td class="money"><span class="money" data-currency-usd="${{$order_product->price}}" data-currency="USD">${{$order_product->price}}</span></td>
                      <td class="quantity ">{{$order_product->qty}}</td>
                      <td class="total"><span class="money" data-currency-usd="${{$order_product->total_price}}" data-currency="USD">${{$order_product->total_price}}</span></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr class="order_summary note">
                      <td class="td-label" colspan="4">Subtotal</td>
                      <td class="subtotal"><span class="money" data-currency-usd="${{$order->total_price}}" data-currency="USD">${{$order->total_price}}</span></td>
                    </tr>
                    <tr class="order_summary note">
                      <td class="td-label" colspan="4">Standard Shipping:</td>
                      <td class="shipping"><span class="money" data-currency-usd="${{$order->shipping_price}}" data-currency="USD">${{$order->shipping_price}}</span></td>
                    </tr>
                    <tr class="order_summary note">
                      <td class="td-label" colspan="4">VAT 10.0%:</td>
                      <td class="vat"><span class="money" data-currency-usd="${{($order->total_price*10)/100}}" data-currency="USD">${{($order->total_price*10)/100}}</span></td>
                    </tr>
                    <tr class="order_summary order_total">
                      <td class="td-label" colspan="4">Total</td>
                      <td class="total"><span class="money" data-currency-usd="${{($order->total_price*10)/100+$order->shipping_price+$order->total_price}}" data-currency="USD">${{($order->total_price*10)/100+$order->shipping_price+$order->total_price}}</span> </td>
                    </tr>
                  </tfoot>
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
