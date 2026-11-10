@extends('shop.layout')
@section('shop-title','Order Confirmed')
@section('shop-content')
@php
 $confirmed=$confirmation ?? [];
 $reference=data_get($confirmed,'number') ?: data_get($confirmed,'id');
 $total=data_get($confirmed,'total');
 $email=data_get($confirmed,'email');
@endphp
<section class="ec-shop-banner"><div class="ec-banner-inner"><h1>Order <span>Confirmed</span></h1><p>Thank you for your purchase. Your Encore Custom order has been successfully placed.</p></div></section>
<div class="ec-confirmation-wrap">
 <section class="ec-modern-card ec-confirmation-banner">
  <div class="ec-success-check" aria-hidden="true">✓</div>
  <div class="ec-confirmation-copy">
   <h2>@if(filled($reference))Order #{{ $reference }}@else Order received @endif</h2>
   <p>Encore confirmed your order. @if(filled($email))You can review your confirmation at {{ $email }} if Encore sends an email.@endif</p>
  </div>
 </section>
 <div class="ec-confirmation-grid">
  <section class="ec-modern-card ec-confirmation-detail">
   <h2>What's Next?</h2><p>Your order has been submitted successfully. Visit your order history to see the latest information returned by Encore.</p>
   <a class="ec-outline-action" href="{{ route('shop.orders') }}">View Order History <span class="ec-arrow">→</span></a>
  </section>
  <section class="ec-modern-card ec-confirmation-detail">
   <h2>Payment Confirmation</h2>
   <div class="ec-summary-line"><span>Order status</span><strong>Confirmed</strong></div>
   @if(is_numeric($total))<div class="ec-summary-line"><span>Confirmed charge</span><strong>${{ number_format((float)$total,2) }}</strong></div>@endif
   <p>For payment details, shipping updates and order history, visit your Encore account.</p>
  </section>
 </div>
 <div class="ec-confirmation-actions">
  @if(filled(data_get($confirmed,'id')))<a class="ec-btn ec-proceed" href="{{ route('shop.order',data_get($confirmed,'id')) }}">View Order Details <span class="ec-arrow">→</span></a>
  @else<a class="ec-btn ec-proceed" href="{{ route('shop.orders') }}">View My Orders <span class="ec-arrow">→</span></a>@endif
  <a href="{{ route('shop.catalog') }}" class="ec-outline-action">Continue Shopping</a>
 </div>
 <p class="ec-confirmation-support">Need help with an order? <a href="mailto:info@encorecustom.com">Contact Encore support</a>.</p>
</div>
@endsection
