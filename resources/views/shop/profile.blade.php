@extends('shop.layout')
@section('shop-title','My Account')
@section('shop-content')
@php
 $c=is_array($customer ?? null)?$customer:[];
 $u=is_array($user ?? null)?$user:[];
 $first=old('f_name',data_get($c,'f_name',data_get($c,'first_name',data_get($u,'f_name',data_get($u,'first_name','')))));
 $last=old('l_name',data_get($c,'l_name',data_get($c,'last_name',data_get($u,'l_name',data_get($u,'last_name','')))));
 $email=data_get($c,'email',data_get($u,'email',''));
 $phone=old('phone_number',data_get($c,'phone_number',data_get($c,'phone',data_get($u,'phone_number',''))));
 $stats=['Total Orders'=>data_get($summary,'TotalOrders',data_get($summary,'total_orders',0)),'In Packing'=>data_get($summary,'InPacking',data_get($summary,'in_packing',0)),'Delivered'=>data_get($summary,'Delivered',data_get($summary,'delivered',0)),'Refunds'=>data_get($summary,'RefundAndCancel',data_get($summary,'refund_and_cancel',0))];
@endphp
<section class="ec-shop-banner"><div class="ec-banner-inner"><h1>My <span>Account</span></h1><p>Manage your profile, addresses and orders in one place.</p></div></section>
<div class="ec-account-grid">
 <aside class="ec-modern-card ec-account-sidebar">
  <a href="#personal" class="active">Profile</a><a href="{{ route('shop.orders') }}">Orders</a><a href="#saved-addresses">Addresses</a>
  <form method="POST" action="{{ route('shop.logout') }}">@csrf<button type="submit">Logout</button></form>
 </aside>
 <div class="ec-account-main">
  <section class="ec-modern-card ec-account-intro"><div class="ec-account-avatar">{{ mb_strtoupper(mb_substr(trim((string)$first) !== '' ? (string)$first : 'E',0,1)) }}</div><div><h2>{{ trim((string)$first.' '.(string)$last) ?: 'Encore Customer' }}</h2><p>{{ $email }}</p><span>Customer account</span></div></section>
  <div class="ec-account-columns">
   <section class="ec-modern-card" id="personal"><div class="ec-card-heading"><h2>Personal Details</h2></div>
    <form method="POST" action="{{ route('shop.profile.update') }}" class="ec-shop-form">@csrf @method('PATCH')
     <div class="ec-fieldset"><div class="ec-field"><label>First name</label><input class="ec-input" name="f_name" value="{{ $first }}" required></div><div class="ec-field"><label>Last name</label><input class="ec-input" name="l_name" value="{{ $last }}" required></div></div>
     <div class="ec-field"><label>Email address</label><input class="ec-input" value="{{ $email }}" readonly></div>
     <div class="ec-field"><label>Phone</label><input class="ec-input" name="phone_number" value="{{ $phone }}" autocomplete="tel"></div>
     <button class="ec-btn ec-proceed" type="submit">Save Profile →</button>
    </form>
   </section>
   <section class="ec-modern-card ec-account-overview"><h2>Account Overview</h2><div class="ec-stats-grid">@foreach($stats as $label=>$value)<div><strong>{{ is_numeric($value) ? $value : 0 }}</strong><span>{{ $label }}</span></div>@endforeach</div><a class="ec-btn ec-proceed" href="{{ route('shop.orders') }}">View Order History →</a></section>
  </div>
  <section class="ec-modern-card ec-account-address" id="saved-addresses"><h2>Saved Billing & Shipping Details</h2><p>Your saved address is used to prefill checkout when available.</p><div class="ec-account-address-line">{{ data_get($c,'address',data_get($c,'billing_address','No saved billing address yet.')) }}</div><a class="ec-outline-action" href="{{ route('shop.checkout') }}">Manage during checkout →</a></section>
 </div>
</div>
@endsection
