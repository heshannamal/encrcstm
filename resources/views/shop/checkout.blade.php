@extends('shop.layout')
@section('shop-title','Checkout')
@section('shop-content')
@php
 $same=old('use_same_as_billing_address',data_get($billing,'use_same_as_billing_address',1));
 $bFirst=old('first_name',data_get($billing,'first_name',data_get($customer,'first_name',data_get($customer,'f_name'))));
 $bLast=old('last_name',data_get($billing,'last_name',data_get($customer,'last_name',data_get($customer,'l_name'))));
 $bEmail=old('email',data_get($billing,'email',data_get($customer,'email',data_get(session('encore_user'),'email'))));
 $bPhone=old('phone',data_get($billing,'phone',data_get($customer,'phone_number')));
@endphp
<section class="ec-shop-banner"><div class="ec-banner-inner"><h1>Check<span>out</span></h1><p>Review your order, confirm your details and continue to secure payment.</p></div></section>
<form method="POST" action="{{ route('shop.checkout.billing') }}" class="ec-checkout-grid ec-shipping-form" id="ecCheckoutForm">
 @csrf
 <div class="ec-checkout-contact-stack">
  <section class="ec-modern-card ec-contact-card">
   <div class="ec-card-heading"><h2>Contact Details</h2></div>
   <p class="ec-summary-note">We'll use this information for order updates and support.</p>
   <div class="ec-fieldset">
    <div class="ec-field"><label for="checkoutFirst">First name</label><input id="checkoutFirst" class="ec-input" required autocomplete="given-name" name="first_name" value="{{ $bFirst }}"></div>
    <div class="ec-field"><label for="checkoutLast">Last name</label><input id="checkoutLast" class="ec-input" required autocomplete="family-name" name="last_name" value="{{ $bLast }}"></div>
    <div class="ec-field"><label for="checkoutEmail">Email address</label><input id="checkoutEmail" class="ec-input" required autocomplete="email" type="email" name="email" value="{{ $bEmail }}"></div>
    <div class="ec-field"><label for="checkoutPhone">Phone</label><input id="checkoutPhone" class="ec-input" required autocomplete="tel" name="phone" value="{{ $bPhone }}"></div>
   </div>
  </section>
  <div class="ec-checkout-addresses">
   <section class="ec-modern-card ec-address-form-card">
    <div class="ec-card-heading"><h2>Billing Address</h2></div>
    <div class="ec-stack">
     <div class="ec-field"><label for="billingLine">Address</label><input id="billingLine" name="address" class="ec-input" value="{{ old('address',data_get($billing,'address')) }}" required autocomplete="address-line1"></div>
     <div class="ec-field"><label for="billingStreet">Street / apartment (optional)</label><input id="billingStreet" name="street" class="ec-input" value="{{ old('street',data_get($billing,'street')) }}" autocomplete="address-line2"></div>
     <div class="ec-fieldset"><div class="ec-field"><label for="billingCity">City</label><input id="billingCity" name="city" class="ec-input" value="{{ old('city',data_get($billing,'city')) }}" required autocomplete="address-level2"></div><div class="ec-field"><label for="billingState">State</label><input id="billingState" name="state" class="ec-input" value="{{ old('state',data_get($billing,'state')) }}" required autocomplete="address-level1"></div></div>
     <div class="ec-fieldset"><div class="ec-field"><label for="billingZip">Postal code</label><input id="billingZip" name="postal_code" class="ec-input" value="{{ old('postal_code',data_get($billing,'postal_code')) }}" required autocomplete="postal-code"></div>
      <div class="ec-field"><label for="billingCountry">Country</label><select id="billingCountry" name="country_id" class="ec-select" required><option value="">Choose country</option>@foreach($countries as $country)<option value="{{ data_get($country,'id') }}" @selected((string)old('country_id',data_get($billing,'country_id'))===(string)data_get($country,'id'))>{{ data_get($country,'name',data_get($country,'country_name')) }}</option>@endforeach</select></div>
     </div>
    </div>
   </section>
   <section class="ec-modern-card ec-address-form-card">
    <div class="ec-card-heading"><h2>Shipping Address</h2></div>
    <label class="ec-shipping-checkbox"><input id="ecSameAddress" type="checkbox" name="use_same_as_billing_address" value="1" {{ $same?'checked':'' }}><span>Use the same address as billing</span></label>
    <p class="ec-summary-note">Your order ships to this address. Shipping cost is calculated by Encore.</p>
    <div class="ec-stack ec-shipping-conditional" id="ecShipping">
     <div class="ec-fieldset"><div class="ec-field"><label>First name</label><input class="ec-input" name="shipping_first_name" value="{{ old('shipping_first_name',data_get($billing,'shipping_first_name')) }}"></div><div class="ec-field"><label>Last name</label><input class="ec-input" name="shipping_last_name" value="{{ old('shipping_last_name',data_get($billing,'shipping_last_name')) }}"></div></div>
     <div class="ec-field"><label>Shipping address</label><input class="ec-input" name="shipping_address" value="{{ old('shipping_address',data_get($billing,'shipping_address')) }}"></div>
     <div class="ec-field"><label>Street / apartment (optional)</label><input class="ec-input" name="shipping_street" value="{{ old('shipping_street',data_get($billing,'shipping_street')) }}"></div>
     <div class="ec-fieldset"><div class="ec-field"><label>City</label><input class="ec-input" name="shipping_city" value="{{ old('shipping_city',data_get($billing,'shipping_city')) }}"></div><div class="ec-field"><label>State</label><input class="ec-input" name="shipping_state" value="{{ old('shipping_state',data_get($billing,'shipping_state')) }}"></div></div>
     <div class="ec-fieldset"><div class="ec-field"><label>Postal code</label><input class="ec-input" name="shipping_postal_code" value="{{ old('shipping_postal_code',data_get($billing,'shipping_postal_code')) }}"></div><div class="ec-field"><label>Country</label><select class="ec-select" name="shipping_country_id"><option value="">Choose country</option>@foreach($countries as $country)<option value="{{ data_get($country,'id') }}" @selected((string)old('shipping_country_id',data_get($billing,'shipping_country_id'))===(string)data_get($country,'id'))>{{ data_get($country,'name',data_get($country,'country_name')) }}</option>@endforeach</select></div></div>
     <div class="ec-fieldset"><div class="ec-field"><label>Phone</label><input class="ec-input" name="shipping_phone" value="{{ old('shipping_phone',data_get($billing,'shipping_phone')) }}"></div><div class="ec-field"><label>Email</label><input class="ec-input" type="email" name="shipping_email" value="{{ old('shipping_email',data_get($billing,'shipping_email')) }}"></div></div>
    </div>
   </section>
  </div>
 </div>
 <aside class="ec-modern-card ec-modern-summary ec-checkout-summary">
  <div class="ec-card-heading"><h2>Order Summary</h2><span class="ec-item-count">{{ count($checkoutItems ?? []) }} Items</span></div>
  @forelse(($checkoutItems ?? []) as $item)
  <div class="ec-checkout-mini-item">
   @if(!empty($item['images'][0]))<img src="{{ $item['images'][0] }}" alt="{{ $item['name'] }}">@endif
   <div><strong>{{ $item['name'] }}</strong><small>Size: {{ $item['size_name'] ?? '—' }} @if(!empty($item['color_name']))· {{ $item['color_name'] }} @endif</small><small>Qty: {{ $item['quantity'] }}</small></div>
   <span>${{ number_format((float)$item['line_total'],2) }}</span>
  </div>
  @empty<p class="ec-summary-note">Your cart summary will be calculated by Encore.</p>@endforelse
  <div class="ec-summary-line ec-summary-total"><span>Cart Subtotal</span><strong>${{ number_format((float)($checkoutSubtotal ?? 0),2) }}</strong></div>
  <p class="ec-summary-note">Shipping and sales tax are calculated automatically by the Encore API on the payment page. No delivery-method selection is required.</p>
  <button class="ec-btn ec-proceed" type="submit">Continue to Secure Payment <span class="ec-arrow" aria-hidden="true">→</span></button>
  <a class="ec-outline-action" href="{{ route('shop.cart') }}">← Back to Cart</a>
  <div class="ec-trust-row"><span>✓ Secure Checkout</span><span>✓ Customer Support</span></div>
 </aside>
</form>
<script>
(function(){
 const checkbox=document.getElementById('ecSameAddress'),area=document.getElementById('ecShipping');
 if(!checkbox||!area)return;
 function update(){
  const same=checkbox.checked;
  area.hidden=same;
  area.querySelectorAll('input,select').forEach(function(field){
   field.disabled=same;
   if(field.name==='shipping_street')field.required=false;
   else field.required=!same;
  });
 }
 checkbox.addEventListener('change',update);update();
})();
</script>
@endsection
