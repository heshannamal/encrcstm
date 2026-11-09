@extends('shop.layout')
@section('shop-title','Your Cart')
@section('shop-content')
<section class="ec-shop-banner"><div class="ec-banner-inner"><h1>Your <span>Cart</span></h1><p>Review your items, update quantities and proceed to checkout.</p></div></section>
@if(empty($items))
<div class="ec-empty ec-fresh-empty"><h2>Your cart is empty</h2><p>Explore the collection and choose your next kit.</p><a href="{{ route('shop.catalog') }}" class="ec-btn">Browse catalog →</a></div>
@else
<div class="ec-checkout-grid ec-cart-layout">
 <section class="ec-modern-card ec-cart-list">
  <div class="ec-card-heading"><h2>Cart Items ({{ count($items) }})</h2><form method="POST" action="{{ route('shop.cart.clear') }}" onsubmit="return confirm('Remove all items from your cart?')">@csrf @method('DELETE')<button class="ec-clear-cart" type="submit">Clear Cart</button></form></div>
  @foreach($items as $item)
  <article class="ec-modern-cart-item">
   <div class="ec-cart-product-image">@if(!empty($item['images'][0]))<img src="{{ $item['images'][0] }}" alt="{{ $item['name'] }}">@endif</div>
   <div class="ec-cart-product-body"><h3>{{ $item['name'] }}</h3><p>Size: {{ $item['size_name'] ?? '—' }} @if(!empty($item['color_name'])) <span>· Color: {{ $item['color_name'] }}</span>@endif</p>
    <strong class="ec-cart-unit-price">{{ $item['price_formatted'] }}</strong>
    <div class="ec-cart-actions">
     <form action="{{ route('shop.cart.update', $item['cart_id']) }}" method="POST" class="ec-quantity-form">@csrf @method('PATCH')
      <label for="cartQty{{ $loop->index }}">Quantity</label><div class="ec-qty-control">
      <button type="button" data-step="-1" aria-label="Decrease quantity">−</button><input id="cartQty{{ $loop->index }}" type="number" name="quantity" min="1" max="{{ max(1,$item['stock_qty']) }}" value="{{ $item['quantity'] }}"><button type="button" data-step="1" aria-label="Increase quantity">+</button></div>
      <button class="ec-update-cart" type="submit">Update</button>
     </form>
     <form method="POST" action="{{ route('shop.cart.remove', $item['cart_id']) }}">@csrf @method('DELETE')<button type="submit" class="ec-remove-cart">Remove</button></form>
    </div>
   </div>
   <strong class="ec-cart-line-price">${{ number_format((float)$item['line_total'],2) }}</strong>
  </article>
  @endforeach
 </section>
 <aside class="ec-modern-card ec-modern-summary"><h2>Order Summary</h2><div class="ec-summary-line"><span>Subtotal ({{ count($items) }} items)</span><strong>${{ number_format($subtotal,2) }}</strong></div><p class="ec-summary-note">Shipping, sales tax and payment processing are calculated securely by the Encore API during checkout.</p>
  <div class="ec-summary-line ec-summary-total"><strong>Subtotal</strong><strong>${{ number_format($subtotal,2) }}</strong></div>
  <a class="ec-btn ec-proceed" href="{{ route('shop.checkout') }}">Proceed to Checkout →</a>
  <a class="ec-outline-action" href="{{ route('shop.catalog') }}">← Continue Shopping</a>
  <div class="ec-trust-row"><span>✓ Secure checkout</span><span>✓ Encore support</span></div>
 </aside>
</div>
@endif
<script>
document.querySelectorAll('.ec-qty-control').forEach(function(control){
 const input=control.querySelector('input'),form=control.closest('form');
 let pending=false;
 function update(){
  if(pending||!form)return;
  pending=true;
  if(window.EncoreLoading)window.EncoreLoading.show('Updating cart');
  if(form.requestSubmit)form.requestSubmit();else form.submit();
 }
 control.querySelectorAll('[data-step]').forEach(function(button){
  button.addEventListener('click',function(){
   const min=Number(input.min||1),max=Number(input.max||99);
   const next=Math.min(max,Math.max(min,Number(input.value||min)+Number(button.dataset.step)));
   if(next!==Number(input.value)){input.value=String(next);update();}
  });
 });
 input.addEventListener('change',update);
 window.addEventListener('pageshow',function(){pending=false});
});
</script>
@endsection
@if($error)
@push('scripts')<script>if(window.EncoreToast)window.EncoreToast(@json($error),'error');</script>@endpush
@endif
