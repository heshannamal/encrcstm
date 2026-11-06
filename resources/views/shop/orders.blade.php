@extends('shop.layout')
@section('shop-title', 'My Orders')
@section('shop-content')
<h1 class="ec-title">Order <span style="color:var(--ec-red)">History</span></h1><p class="ec-sub">Your purchases and order statuses.</p>

@php $rows=collect(data_get($orders,'data',$orders)); @endphp
@if($rows->isEmpty())<div class="ec-empty"><h2>No orders yet</h2><a class="ec-btn" href="{{ route('shop.catalog') }}">Browse Catalog</a></div>
@else<div class="ec-panel">@foreach($rows as $order)
 @php $id=data_get($order,'id',data_get($order,'order_id')); @endphp
 <div class="ec-row"><div><strong>Order #{{ $id }}</strong><p class="ec-muted">{{ data_get($order,'created_at','') }}</p></div><div><span class="ec-pill">{{ data_get($order,'status',data_get($order,'payment_status','Processing')) }}</span></div><div><strong>{{ data_get($order,'total',data_get($order,'invoice_total','')) }}</strong></div><div><a href="{{ route('shop.order',$id) }}">View details</a></div></div>
@endforeach</div>@endif
@endsection
@if($error)
@push('scripts')
<script>
if(window.EncoreToast){window.EncoreToast(@json($error),'error');}
</script>
@endpush
@endif
