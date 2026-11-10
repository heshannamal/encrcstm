@extends('shop.layout')
@section('shop-title','Secure Payment')
@section('shop-content')
@php
 $due=(float)data_get($payment,'amount_to_pay',0);
 $subtotal=(float)data_get($payment,'sub_total',0);
 $shipping=(float)data_get($subPayment,'shipping_fee',0);
 $tax=(float)data_get($subPayment,'sales_tax',0);
@endphp
<section class="ec-shop-banner"><div class="ec-banner-inner"><h1>Pay<span>ment</span></h1><p>Choose your card type and complete your order securely.</p></div></section>
<div class="ec-checkout-grid ec-payment-layout">
 <form method="POST" action="{{ route('shop.payment.submit') }}" class="ec-modern-card ec-stack ec-modern-payment" autocomplete="off" id="ecPaymentForm">
  @csrf
  <div class="ec-card-heading"><h2>Payment Method</h2><span class="ec-secure-inline">Secure payment</span></div>
  <p class="ec-muted">Credit or debit card payments are processed by the Encore payment API.</p>
  <fieldset class="ec-card-type-field">
   <legend>Select your card type</legend>
   <div class="ec-card-type-options">
    <label><input type="radio" name="card_type" value="1" required @checked(old('card_type','1')=='1')><span>VISA</span></label>
    <label><input type="radio" name="card_type" value="2" required @checked(old('card_type')=='2')><span>Mastercard</span></label>
    <label><input type="radio" name="card_type" value="3" required @checked(old('card_type')=='3')><span>American Express</span></label>
   </div>
  </fieldset>
  <div class="ec-payment-fieldlist">
   <div class="ec-field"><label for="ecCardName">Cardholder name</label><input id="ecCardName" type="text" name="card_holder_name" class="ec-input" required autocomplete="cc-name" value="{{ old('card_holder_name') }}"></div>
   <div class="ec-field"><label for="ecCardNumber">Card number</label><input id="ecCardNumber" type="text" inputmode="numeric" pattern="[0-9 ]{12,25}" name="card_number" class="ec-input" required autocomplete="cc-number" placeholder="1234 5678 9012 3456"></div>
   <div class="ec-payment-expiry">
    <div class="ec-field"><label for="ecCardMonth">Expiry month</label><select id="ecCardMonth" class="ec-select" name="card_expiry_month" required>@for($i=1;$i<=12;$i++)<option value="{{ $i }}" @selected((string)old('card_expiry_month')===(string)$i)>{{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>@endfor</select></div>
    <div class="ec-field"><label for="ecCardYear">Expiry year</label><select id="ecCardYear" class="ec-select" name="card_expiry_year" required>@for($i=(int)date('Y');$i<=((int)date('Y')+20);$i++)<option value="{{ $i }}" @selected((string)old('card_expiry_year')===(string)$i)>{{ $i }}</option>@endfor</select></div>
    <div class="ec-field"><label for="ecCardCvv">Security code (CVV)</label><input id="ecCardCvv" type="password" inputmode="numeric" name="card_csv" maxlength="4" pattern="[0-9]{3,4}" class="ec-input" required autocomplete="cc-csc" placeholder="•••"></div>
   </div>
  </div>
  <div class="ec-payment-note"><span aria-hidden="true">◈</span><p>Card data is submitted for this transaction only; this storefront does not save your card number or security code. Do not resubmit while payment is processing.</p></div>
  <button type="submit" id="ecPayButton" class="ec-btn ec-proceed">Place Order · ${{ number_format($due,2) }} <span class="ec-arrow" aria-hidden="true">→</span></button>
 </form>
 <aside class="ec-modern-card ec-modern-summary ec-payment-summary">
  <div class="ec-card-heading"><h2>Order Summary</h2><a class="ec-edit-btn" href="{{ route('shop.cart') }}">Edit Cart <span class="ec-arrow">→</span></a></div>
  <div class="ec-summary-line"><span>Items</span><strong>{{ data_get($payment,'total_item_qty',0) }}</strong></div>
  <div class="ec-summary-line"><span>Subtotal</span><strong>${{ number_format($subtotal,2) }}</strong></div>
  <div class="ec-summary-line"><span>Shipping (Encore calculated)</span><strong>${{ number_format($shipping,2) }}</strong></div>
  <div class="ec-summary-line"><span>Sales tax @if(filled(data_get($subPayment,'sales_tax_percentage')))<small>({{ data_get($subPayment,'sales_tax_percentage') }}%)</small>@endif</span><strong>${{ number_format($tax,2) }}</strong></div>
  @if((float)data_get($subPayment,'other_fee',0)>0)<div class="ec-summary-line"><span>Other fees</span><strong>${{ number_format((float)data_get($subPayment,'other_fee',0),2) }}</strong></div>@endif
  @if((float)data_get($payment,'processing_fee',0)>0)<div class="ec-summary-line"><span>Processing fee</span><strong>${{ number_format((float)data_get($payment,'processing_fee',0),2) }}</strong></div>@endif
  @if((float)data_get($payment,'balance_invoice',0)>0 && (float)data_get($payment,'balance_invoice',0)!==$due)<div class="ec-summary-line"><span>Balance invoice</span><strong>${{ number_format((float)data_get($payment,'balance_invoice',0),2) }}</strong></div>@endif
  <div class="ec-summary-line ec-summary-total"><strong>Total to Pay</strong><strong class="ec-price">${{ number_format($due,2) }}</strong></div>
  <p class="ec-summary-note">The final amount, tax and single shipping charge above are returned by Encore. No delivery method selection is required.</p>
  <a href="{{ route('shop.checkout') }}" class="ec-outline-action">← Edit Billing & Shipping</a>
 </aside>
</div>
<div class="ec-payment-trust"><strong>◈ SECURE PAYMENT</strong><span>Payment authorization is handled by the Encore API.</span></div>
<script>
(function(){
 const form=document.getElementById('ecPaymentForm');
 if(!form)return;
 form.addEventListener('submit',function(){
  if(!form.checkValidity())return;
  const btn=document.getElementById('ecPayButton');
  if(btn){btn.disabled=true;btn.textContent='Processing payment…';}
 });
})();
</script>
@endsection
