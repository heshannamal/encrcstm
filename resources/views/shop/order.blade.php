@extends('shop.layout')
@section('shop-title', 'Order Details')
@section('shop-content')
<h1 class="ec-title">Order <span style="color:var(--ec-red)">#{{ data_get($order,'id',data_get($order,'order_id')) }}</span></h1>
<div class="ec-two"><div class="ec-panel"><h2>Order Details</h2>@foreach(['order_number','created_at','status','payment_status','sub_total','sales_tax','shipping_fee','invoice_total','amount_to_pay'] as $key)@if(data_get($order,$key)!==null)<div class="ec-row"><span>{{ ucwords(str_replace('_',' ',$key)) }}</span><strong>{{ data_get($order,$key) }}</strong></div>@endif @endforeach
 @php $items=collect(data_get($order,'items',data_get($order,'order_items',[]))); @endphp
 @if($items->isNotEmpty())<h3>Items</h3>@foreach($items as $item)<div class="ec-row"><span>{{ data_get($item,'product_name',data_get($item,'name','Item')) }}</span><span>{{ data_get($item,'quantity',data_get($item,'qty',1)) }}</span></div>@endforeach @endif
 </div><aside class="ec-panel"><h2>Need help?</h2><p class="ec-muted">For questions about your order or customization, contact our team.</p><a class="ec-btn dark" href="{{ config('site.team_url') }}">Contact the Team</a><p><a href="{{ route('shop.orders') }}">Back to orders</a></p></aside></div>
@endsection
