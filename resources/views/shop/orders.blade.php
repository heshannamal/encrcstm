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
   <div class="ec-order-filters" aria-label="Filter orders by status">
    <button type="button" class="is-active" data-order-filter="all">All Orders</button>
    <button type="button" data-order-filter="processing">Processing</button>
    <button type="button" data-order-filter="shipped">Shipped</button>
    <button type="button" data-order-filter="delivered">Delivered</button>
    <button type="button" data-order-filter="cancel">Cancelled</button>
   </div>
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
      <article class="ec-order-history-row" data-order-status="{{ strtolower($status) }}">
       <div class="ec-order-row-main"><span class="ec-order-row-kicker">ENCORE CUSTOM ORDER</span><strong>Order #{{ $id ?? '—' }}</strong><span>{{ $date }}</span></div>
       <span class="ec-order-status">{{ $status }}</span>
       <strong class="ec-order-amount">@if(is_numeric($amount))${{ number_format((float)$amount,2) }}@else {{ $amount ?: '—' }}@endif</strong>
       @if($id)<a class="ec-edit-btn" href="{{ route('shop.order',$id) }}">View Details <span class="ec-arrow">→</span></a>@endif
      </article>
     @endforeach
    </div>
    <p class="ec-order-filter-empty" id="ecOrderFilterEmpty" hidden>No orders match this filter.</p>
   @endif
  </section>
 </div>
</div>
<script>
(function(){
 const group=document.querySelector('.ec-order-filters');if(!group)return;
 const rows=[...document.querySelectorAll('[data-order-status]')],empty=document.getElementById('ecOrderFilterEmpty');
 group.querySelectorAll('button').forEach(function(btn){
  btn.addEventListener('click',function(){
   group.querySelectorAll('button').forEach(b=>b.classList.toggle('is-active',b===btn));
   const value=btn.dataset.orderFilter;let visible=0;
   rows.forEach(function(row){
    const state=row.dataset.orderStatus;
    const matches=value==='all'||(value==='processing'&&/process|pending|pack|prepar/.test(state))||(value==='shipped'&&/ship|transit|dispatch/.test(state))||(value==='delivered'&&/deliver|complete/.test(state))||(value==='cancel'&&/cancel|refund/.test(state));
    row.hidden=!matches;if(matches)visible++;
   });
   if(empty)empty.hidden=visible>0;
  });
 });
})();
</script>
@endsection
@if($error)
 @push('scripts')<script>if(window.EncoreToast)window.EncoreToast(@json($error),'error');</script>@endpush
@endif
