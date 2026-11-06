@extends('shop.layout')
@section('shop-title', 'Payment')
@section('shop-content')
<h1 class="ec-title">Order <span style="color:var(--ec-red)">Payment</span></h1><p class="ec-sub">Step 2 of 2 — Review the final API-calculated total and confirm payment.</p>
<div class="ec-two">
<form method="POST" action="{{ route('shop.payment.submit') }}" class="ec-panel ec-stack" autocomplete="off" id="ecPaymentForm">@csrf
<h2 style="margin:0">Card Details</h2><p class="ec-muted">Your card information is submitted for this payment only; it is not stored in this website's session or database.</p>
<div class="ec-field"><label>Card type</label><select name="card_type" class="ec-select" required><option value="1">Visa</option><option value="2">Mastercard</option><option value="3">American Express</option></select></div>
<div class="ec-field"><label>Cardholder name</label><input type="text" name="card_holder_name" class="ec-input" required autocomplete="cc-name"></div>
<div class="ec-field"><label>Card number</label><input type="text" inputmode="numeric" pattern="[0-9 ]{12,25}" name="card_number" class="ec-input" required autocomplete="cc-number"></div>
<div class="ec-fieldset"><div class="ec-field"><label>Expiry month</label><select class="ec-select" name="card_expiry_month" required>@for($i=1;$i<=12;$i++)<option value="{{ $i }}">{{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>@endfor</select></div><div class="ec-field"><label>Expiry year</label><select class="ec-select" name="card_expiry_year" required>@for($i=(int)date('Y');$i<=((int)date('Y')+20);$i++)<option value="{{ $i }}">{{ $i }}</option>@endfor</select></div></div>
<div class="ec-field"><label>CVV</label><input type="password" inputmode="numeric" name="card_csv" maxlength="4" pattern="[0-9]{3,4}" class="ec-input" required autocomplete="cc-csc"></div>
<button type="submit" id="ecPayButton" class="ec-btn">Confirm & Pay ${{ number_format((float)data_get($payment,'amount_to_pay',0),2) }}</button>
<p class="ec-muted">Do not refresh or resubmit during payment processing. If the response is interrupted, check Order History first.</p>
</form>
<aside class="ec-panel ec-summary"><h2>Payment Summary</h2>
<div class="ec-row"><span>Items</span><strong>{{ data_get($payment,'total_item_qty','0') }}</strong></div>
<div class="ec-row"><span>Subtotal</span><strong>${{ number_format((float)data_get($payment,'sub_total',0),2) }}</strong></div>
<div class="ec-row"><span>Shipping</span><strong>${{ number_format((float)data_get($subPayment,'shipping_fee',0),2) }}</strong></div>
<div class="ec-row"><span>Sales tax</span><strong>${{ number_format((float)data_get($subPayment,'sales_tax',0),2) }}</strong></div>
<div class="ec-row"><span>Processing fee</span><strong>${{ number_format((float)data_get($payment,'processing_fee',0),2) }}</strong></div>
<div class="ec-row"><strong>Amount to Pay</strong><strong class="ec-price">${{ number_format((float)data_get($payment,'amount_to_pay',0),2) }}</strong></div>
<a href="{{ route('shop.checkout') }}" class="ec-btn light" style="margin-top:25px">Edit Billing Details</a></aside>
</div>
<script>
(function(){const form=document.getElementById('ecPaymentForm');form.addEventListener('submit',function(){let b=document.getElementById('ecPayButton');b.disabled=true;b.textContent='Processing payment…'})})();
</script>
@endsection
