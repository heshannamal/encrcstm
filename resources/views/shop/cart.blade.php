@extends('shop.layout')
@section('shop-title', 'Your Cart')
@section('shop-content')
<h1 class="ec-title">Your <span style="color:var(--ec-red)">Cart</span></h1>
<p class="ec-sub">Review your products and quantities before checkout.</p>
@if($error)<div class="ec-alert bad">{{ $error }}</div>@endif
@if(empty($items))
 <div class="ec-empty"><h2>Your cart is empty</h2><p>Explore the collection and choose your next kit.</p><a href="{{ route('shop.catalog') }}" class="ec-btn">Browse catalog</a></div>
@else
<div class="ec-two">
 <section class="ec-panel">
 @foreach($items as $item)
  <div class="ec-row ec-cart-item">
   @if(!empty($item['images'][0]))<img src="{{ $item['images'][0] }}" alt="{{ $item['name'] }}">@else<div></div>@endif
   <div><h3 style="margin:0 0 7px;font-size:16px">{{ $item['name'] }}</h3><p class="ec-muted">Size: {{ $item['size_name'] ?? '—' }} @if(!empty($item['color_name'])) · Color: {{ $item['color_name'] }} @endif</p>
   <p class="ec-price">{{ $item['price_formatted'] }}</p>
   <form action="{{ route('shop.cart.update',$item['cart_id']) }}" method="POST" class="ec-flex">@csrf @method('PATCH')<label>Qty <input class="ec-input ec-qty" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ max(1,$item['stock_qty']) }}"></label><button class="ec-btn light" type="submit">Update</button></form>
   <form action="{{ route('shop.cart.remove',$item['cart_id']) }}" method="POST" style="margin-top:12px">@csrf @method('DELETE')<button type="submit" style="border:0;background:none;color:var(--ec-red);cursor:pointer">Remove item</button></form>
   </div><div class="ec-price">${{ number_format($item['line_total'],2) }}</div>
  </div>
 @endforeach
 </section>
 <aside class="ec-panel ec-summary"><h2>Order Summary</h2><div class="ec-row"><span>Subtotal</span><strong>${{ number_format($subtotal,2) }}</strong></div><p class="ec-muted">Taxes, delivery, and payment processing are calculated at checkout.</p><a class="ec-btn" href="{{ route('shop.checkout') }}" style="width:100%">Proceed to Checkout</a><a class="ec-btn light" href="{{ route('shop.catalog') }}" style="width:100%;margin-top:12px">Continue Shopping</a></aside>
</div>
@endif
@endsection
