@extends('shop.layout')
@section('shop-title', 'Order Confirmed')
@section('shop-content')
<div class="ec-empty" style="padding:70px 30px"><div style="font-size:50px;color:#219653">✓</div><h1 class="ec-title">Order <span style="color:var(--ec-red)">Confirmed</span></h1>
<p class="ec-sub">The Encore order API confirmed your order submission. You can review its status in your order history.</p>
<div class="ec-flex" style="justify-content:center"><a class="ec-btn" href="{{ route('shop.orders') }}">View My Orders</a><a class="ec-btn light" href="{{ route('shop.catalog') }}">Continue Shopping</a></div>
</div>
@endsection
