@extends('shop.layout')
@section('shop-title', 'Payment')
@section('shop-content')
<section class="ec-shop-banner"><div class="ec-banner-inner"><h1>Secure <span>Payment</span></h1><p>Review your API-calculated total and complete your purchase.</p></div></section>
<div class="ec-checkout-grid">
<form method="POST" action="{{ route('shop.payment.submit') }}" class="ec-modern-card ec-stack ec-modern-payment" autocomplete="off" id="ecPaymentForm">@csrf
<h2>Card Payment</h2><p class="ec-muted">Payment is processed by Encore using the Authorize.Net integration in the reference system. Card details are not saved by this website.</p>
<fieldset class="ec-card-type-field"><legend>Choose your card type</legend><div class="ec-card-type-options">
<label><input type="radio" name="card_type" value="1" required @checked(old('card_type','1')=='1')><span>VISA</span></label>
<label><input type="radio" name="card_type" value="2" required @checked(old('card_type')=='2')><span>Mastercard</span></label>
<label><input type="radio" name="card_type" value="3" required @checked(old('card_type')=='3')><span>American Express</span></label>
</div></fieldset>
<div class="ec-field"><label>Cardholder name</label><input type="text" name="card_holder_name" class="ec-input" required autocomplete="cc-name"></div>
<div class="ec-field"><label>Card number</label><input type="text" inputmode="numeric" pattern="[0-9 ]{12,25}" name="card_number" class="ec-input" required autocomplete="cc-number"></div>
<div class="ec-fieldset"><div class="ec-field"><label>Expiry month</label><select class="ec-select" name="card_expiry_month" required>@for($i=1;$i<=12;$i++)<option value="{{ $i }}">{{ str_pad($i,2,'0',STR_PAD_LEFT) }}</option>@endfor</select></div><div class="ec-field"><label>Expiry year</label><select class="ec-select" name="card_expiry_year" required>@for($i=(int)date('Y');$i<=((int)date('Y')+20);$i++)<option value="{{ $i }}">{{ $i }}</option>@endfor</select></div></div>
<div class="ec-field"><label>CVV</label><input type="password" inputmode="numeric" name="card_csv" maxlength="4" pattern="[0-9]{3,4}" class="ec-input" required autocomplete="cc-csc"></div>
<button type="submit" id="ecPayButton" class="ec-btn ec-proceed">Pay Securely · ${{ number_format((float)data_get($payment,'amount_to_pay',0),2) }} →</button>
<p class="ec-muted">Do not refresh or resubmit during payment processing. If the response is interrupted, check Order History first.</p>
</form>
<aside class="ec-modern-card ec-modern-summary"><h2>Order Summary</h2>
<div class="ec-row"><span>Items</span><strong>{{ data_get($payment,'total_item_qty','0') }}</strong></div>
<div class="ec-row"><span>Subtotal</span><strong>${{ number_format((float)data_get($payment,'sub_total',0),2) }}</strong></div>
<div class="ec-row"><span>Shipping (calculated by Encore) @if(filled(data_get($subPayment,'shipping_fee_percentage')))<small class="ec-muted">({{ data_get($subPayment,'shipping_fee_percentage') }}%)</small>@endif</span><strong>${{ number_format((float)data_get($subPayment,'shipping_fee',0),2) }}</strong></div>
<div class="ec-row"><span>Sales tax @if(filled(data_get($subPayment,'sales_tax_percentage')))<small class="ec-muted">({{ data_get($subPayment,'sales_tax_percentage') }}%)</small>@endif</span><strong>${{ number_format((float)data_get($subPayment,'sales_tax',0),2) }}</strong></div>
<div class="ec-row"><span>Invoice total</span><strong>${{ number_format((float)data_get($payment,'invoice_total',0),2) }}</strong></div>
<div class="ec-row"><span>Other fees</span><strong>${{ number_format((float)data_get($subPayment,'other_fee',0),2) }}</strong></div>
<div class="ec-row"><span>Balance due</span><strong>${{ number_format((float)data_get($payment,'balance_invoice',0),2) }}</strong></div>
<div class="ec-row"><span>Processing fee</span><strong>${{ number_format((float)data_get($payment,'processing_fee',0),2) }}</strong></div>
<div class="ec-row"><strong>Amount to Pay</strong><strong class="ec-price">${{ number_format((float)data_get($payment,'amount_to_pay',0),2) }}</strong></div>
<p class="ec-summary-note">Shipping and tax come from the Encore checkout API. No additional shipping method is selected.</p><a href="{{ route('shop.checkout') }}" class="ec-btn light" style="margin-top:25px">Edit Billing Details</a></aside>
</div>
<script>
(function(){const form=document.getElementById('ecPaymentForm');form.addEventListener('submit',function(){let b=document.getElementById('ecPayButton');b.disabled=true;b.textContent='Processing payment…'})})();
</script>
@endsection
