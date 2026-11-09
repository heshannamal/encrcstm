@extends('shop.layout')
@section('shop-title','My Orders')
@section('shop-content')
<section class="ec-shop-banner ec-account-banner"><div class="ec-banner-inner"><h1>My <span>Orders</span></h1><p>Review your purchases and track your order status.</p></div></section>
<div class="ec-account-grid">
 @include('shop.partials.account-sidebar')
 <div class="ec-account-main">
  <section class="ec-modern-card ec-orders-panel">
   <div class="ec-card-heading"><h2>Order History</h2><a href="{{ route('shop.catalog') }}">Shop more →</a></div>
   @php $rows=collect(data_get($orders,'data',$orders)); @endphp
   @if($rows->isEmpty())
    <div class="ec-empty"><h2>No orders yet</h2><p>Your orders will appear here after checkout.</p><a href="{{ route('shop.catalog') }}" class="ec-btn ec-proceed">Browse Catalog →</a></div>
   @else
    @foreach($rows as $order)
     @php $id=data_get($order,'id',data_get($order,'order_id')); @endphp
     <article class="ec-order-history-row">
      <div><strong>Order #{{ $id }}</strong><span>{{ data_get($order,'created_at','') }}</span></div>
      <span class="ec-order-status">{{ data_get($order,'status',data_get($order,'payment_status','Processing')) }}</span>
      <strong>{{ data_get($order,'invoice_total',data_get($order,'total','')) }}</strong>
      @if($id)<a class="ec-edit-btn" href="{{ route('shop.order',$id) }}">Details →</a>@endif
     </article>
    @endforeach
   @endif
  </section>
 </div>
</div>
@endsection
@if($error)
@push('scripts')<script>if(window.EncoreToast)window.EncoreToast(@json($error),'error');</script>@endpush
@endif
