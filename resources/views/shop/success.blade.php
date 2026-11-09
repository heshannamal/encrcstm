@extends('shop.layout')
@section('shop-title','Order Confirmed')
@section('shop-content')
<section class="ec-shop-banner"><div class="ec-banner-inner"><h1>Order <span>Confirmed</span></h1><p>Thank you for shopping with Encore Custom.</p></div></section>
<div class="ec-modern-card ec-success-card">
 <div class="ec-success-check">✓</div><h2>Your order has been received</h2>
 <p>The Encore order API confirmed your order. You can view its current status and details in your account.</p>
 <div class="ec-success-actions"><a class="ec-btn ec-proceed" href="{{ route('shop.orders') }}">View My Orders →</a><a class="ec-outline-action" href="{{ route('shop.catalog') }}">Continue Shopping</a></div>
</div>
@endsection
