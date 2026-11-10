@extends('shop.layout')
@section('shop-title','My Orders')
@section('shop-content')
@php
 $rows=collect(data_get($orders,'data',$orders))->filter(fn($row)=>is_array($row))->values();
@endphp
<section class="ec-shop-banner ec-account-banner"><div class="ec-banner-inner"><h1>My <span>Orders</span></h1><p>Track your purchases and review each order status.</p></div></section>
<div class="ec-account-grid">
 @include('shop.partials.account-sidebar')
 <div class="ec-account-main">
  <section class="ec-modern-card ec-orders-panel">
   <div class="ec-card-heading"><h2>Order History <small>({{ $rows->count() }})</small></h2><a class="ec-edit-btn" href="{{ route('shop.catalog') }}">Shop More <span class="ec-arrow">→</span></a></div>
   @if($rows->isEmpty())
    <div class="ec-empty"><h2>No orders yet</h2><p>Your orders will appear here after checkout.</p><a href="{{ route('shop.catalog') }}" class="ec-btn ec-proceed">Browse Shop <span class="ec-arrow">→</span></a></div>
   @else
    <div class="ec-order-list" id="ecOrderList">
     @foreach($rows as $order)
      @php
       $id=data_get($order,'id',data_get($order,'order_id'));
       $status=(string)data_get($order,'status',data_get($order,'order_status',data_get($order,'payment_status','Processing')));
       $amount=data_get($order,'invoice_total',data_get($order,'amount_to_pay',data_get($order,'total')));
       $date=data_get($order,'created_at',data_get($order,'order_date',''));
      @endphp
      <article class="ec-order-history-row">
       <div class="ec-order-row-main"><span class="ec-order-row-kicker">ENCORE CUSTOM ORDER</span><strong>Order #{{ $id ?? '—' }}</strong><span>{{ $date }}</span></div>
       <span class="ec-order-status">{{ $status }}</span>
       <strong class="ec-order-amount">@if(is_numeric($amount))${{ number_format((float)$amount,2) }}@else {{ $amount ?: '—' }}@endif</strong>
       @if($id)<a class="ec-edit-btn" href="{{ route('shop.order',$id) }}">View Details <span class="ec-arrow">→</span></a>@endif
      </article>
     @endforeach
    </div>
   @endif
  </section>
 </div>
</div>
@endsection
@if($error)
 @push('scripts')<script>if(window.EncoreToast)window.EncoreToast(@json($error),'error');</script>@endpush
@endif
