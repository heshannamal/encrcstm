@extends('shop.layout')
@section('shop-title', 'Checkout')
@section('shop-content')
<h1 class="ec-title">Secure <span style="color:var(--ec-red)">Checkout</span></h1>
<p class="ec-sub">Step 1 of 2 — billing and delivery information. Payment totals will be calculated by Encore.</p>
<form class="ec-two" method="POST" action="{{ route('shop.checkout.billing') }}">@csrf
<section class="ec-panel ec-stack">
<h2 style="margin:0">Billing Details</h2>
<div class="ec-fieldset">
<div class="ec-field"><label>First name</label><input required name="first_name" class="ec-input" value="{{ old('first_name',data_get($billing,'first_name',data_get($customer,'first_name',data_get($customer,'f_name')))) }}"></div>
<div class="ec-field"><label>Last name</label><input required name="last_name" class="ec-input" value="{{ old('last_name',data_get($billing,'last_name',data_get($customer,'last_name',data_get($customer,'l_name')))) }}"></div></div>
<div class="ec-fieldset"><div class="ec-field"><label>Email</label><input type="email" required name="email" class="ec-input" value="{{ old('email',data_get($billing,'email',data_get(session('encore_user'),'email'))) }}"></div><div class="ec-field"><label>Phone</label><input required name="phone" class="ec-input" value="{{ old('phone',data_get($billing,'phone',data_get($customer,'phone_number'))) }}"></div></div>
<div class="ec-field"><label>Address</label><input required name="address" class="ec-input" value="{{ old('address',data_get($billing,'address')) }}"></div>
<div class="ec-field"><label>Street / apartment (optional)</label><input name="street" class="ec-input" value="{{ old('street',data_get($billing,'street')) }}"></div>
<div class="ec-fieldset"><div class="ec-field"><label>City</label><input name="city" required class="ec-input" value="{{ old('city',data_get($billing,'city')) }}"></div><div class="ec-field"><label>State / province</label><input name="state" required class="ec-input" value="{{ old('state',data_get($billing,'state')) }}"></div></div>
<div class="ec-fieldset"><div class="ec-field"><label>Postal code</label><input name="postal_code" required class="ec-input" value="{{ old('postal_code',data_get($billing,'postal_code')) }}"></div><div class="ec-field"><label>Country</label><select name="country_id" required class="ec-select"><option value="">Select country</option>@foreach($countries as $country)<option value="{{ data_get($country,'id') }}" @selected((string)old('country_id',data_get($billing,'country_id'))===(string)data_get($country,'id'))>{{ data_get($country,'name',data_get($country,'country_name')) }}</option>@endforeach</select></div></div>
<label class="ec-flex"><input id="ecSameAddress" type="checkbox" name="use_same_as_billing_address" value="1" {{ old('use_same_as_billing_address',data_get($billing,'use_same_as_billing_address',1))?'checked':'' }}> Use billing address for shipping</label>
<div id="ecShipping" class="ec-stack ec-hide">
<h2>Shipping Details</h2>
<div class="ec-fieldset"><div class="ec-field"><label>First name</label><input class="ec-input" name="shipping_first_name" value="{{ old('shipping_first_name',data_get($billing,'shipping_first_name')) }}"></div><div class="ec-field"><label>Last name</label><input class="ec-input" name="shipping_last_name" value="{{ old('shipping_last_name',data_get($billing,'shipping_last_name')) }}"></div></div>
<div class="ec-field"><label>Address</label><input class="ec-input" name="shipping_address" value="{{ old('shipping_address',data_get($billing,'shipping_address')) }}"></div>
<div class="ec-fieldset"><div class="ec-field"><label>City</label><input class="ec-input" name="shipping_city" value="{{ old('shipping_city',data_get($billing,'shipping_city')) }}"></div><div class="ec-field"><label>State</label><input class="ec-input" name="shipping_state" value="{{ old('shipping_state',data_get($billing,'shipping_state')) }}"></div></div>
<div class="ec-fieldset"><div class="ec-field"><label>Postal code</label><input class="ec-input" name="shipping_postal_code" value="{{ old('shipping_postal_code',data_get($billing,'shipping_postal_code')) }}"></div><div class="ec-field"><label>Country</label><select class="ec-select" name="shipping_country_id"><option value="">Select country</option>@foreach($countries as $country)<option value="{{ data_get($country,'id') }}" @selected((string)old('shipping_country_id',data_get($billing,'shipping_country_id'))===(string)data_get($country,'id'))>{{ data_get($country,'name',data_get($country,'country_name')) }}</option>@endforeach</select></div></div>
<div class="ec-fieldset"><div class="ec-field"><label>Phone</label><input class="ec-input" name="shipping_phone" value="{{ old('shipping_phone',data_get($billing,'shipping_phone')) }}"></div><div class="ec-field"><label>Email</label><input class="ec-input" type="email" name="shipping_email" value="{{ old('shipping_email',data_get($billing,'shipping_email')) }}"></div></div>
</div>
<button class="ec-btn" type="submit">Continue to Payment</button>
</section>
<aside class="ec-panel ec-summary"><h2>Checkout Steps</h2><div class="ec-row"><strong>1. Billing & Shipping</strong><span class="ec-pill">Current</span></div><div class="ec-row"><span>2. Payment</span></div><div class="ec-row"><span>3. Confirmation</span></div><p class="ec-muted">Actual shipping, taxes and total charges are calculated by the Encore checkout API.</p><a href="{{ route('shop.cart') }}">Back to cart</a></aside>
</form>
<script>
(function(){const c=document.getElementById('ecSameAddress'),s=document.getElementById('ecShipping');function update(){s.classList.toggle('ec-hide',c.checked);s.querySelectorAll('input,select').forEach(el=>{el.required=!c.checked})}c.addEventListener('change',update);update()})();
</script>
@endsection
