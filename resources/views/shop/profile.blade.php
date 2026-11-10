@extends('shop.layout')
@section('shop-title','My Account')
@section('shop-content')
@php
 $c=is_array($customer ?? null)?$customer:[];
 $u=is_array($user ?? null)?$user:[];
 $first=old('f_name',data_get($c,'f_name',data_get($c,'first_name',data_get($u,'f_name',data_get($u,'first_name','')))));
 $last=old('l_name',data_get($c,'l_name',data_get($c,'last_name',data_get($u,'l_name',data_get($u,'last_name','')))));
 $email=data_get($c,'email',data_get($c,'user_detail.email',data_get($u,'email','')));
 $phone=old('phone_number',data_get($c,'phone_number',data_get($c,'phone',data_get($u,'phone_number',''))));
 $settings=request('tab')==='settings';
 $stats=['Total Orders'=>data_get($summary,'TotalOrders',data_get($summary,'total_orders',0)),'In Packing'=>data_get($summary,'InPacking',data_get($summary,'in_packing',0)),'Delivered'=>data_get($summary,'Delivered',data_get($summary,'delivered',0)),'Refunds'=>data_get($summary,'RefundAndCancel',data_get($summary,'refund_and_cancel',0))];
@endphp
<section class="ec-shop-banner ec-account-banner"><div class="ec-banner-inner">@if($settings)<h1>Account <span>Settings</span></h1><p>Manage your contact information and customer account.</p>@else<h1>My <span>Account</span></h1><p>Manage your profile, saved addresses and orders in one place.</p>@endif</div></section>
<div class="ec-account-grid">
 @include('shop.partials.account-sidebar')
 <div class="ec-account-main">
  <section class="ec-modern-card ec-account-intro">
   <div class="ec-account-avatar">{{ mb_strtoupper(mb_substr(trim((string)$first)!==''?(string)$first:'E',0,1)) }}</div>
   <div class="ec-account-intro-details"><h2>{{ trim((string)$first.' '.(string)$last) ?: 'Encore Customer' }}</h2><p>{{ $email }}</p><span>Customer Account</span></div>
   <div class="ec-account-intro-art" aria-hidden="true"></div>
  </section>
  @if($settings)
   <section class="ec-modern-card ec-account-settings">
    <div class="ec-card-heading"><h2>Personal & Contact Settings</h2><a class="ec-edit-btn" href="{{ route('shop.profile') }}">← Back to Profile</a></div>
    <p class="ec-settings-info">Update the contact details associated with your Encore customer account. Your saved billing and shipping addresses remain visible on the Profile page.</p>
    <form method="POST" action="{{ route('shop.profile.update') }}" class="ec-shop-form">@csrf @method('PATCH')
     <div class="ec-fieldset">
      <div class="ec-field"><label for="settingFirst">First name</label><input id="settingFirst" class="ec-input" name="f_name" value="{{ $first }}" autocomplete="given-name" required></div>
      <div class="ec-field"><label for="settingLast">Last name</label><input id="settingLast" class="ec-input" name="l_name" value="{{ $last }}" autocomplete="family-name" required></div>
     </div>
     <div class="ec-fieldset"><div class="ec-field"><label>Email address</label><input class="ec-input" value="{{ $email }}" readonly aria-describedby="emailHelp"><small id="emailHelp">Your account email is managed by Encore.</small></div>
      <div class="ec-field"><label for="settingPhone">Phone number</label><input id="settingPhone" class="ec-input" name="phone_number" value="{{ $phone }}" autocomplete="tel"></div>
     </div>
     <button type="submit" class="ec-btn ec-proceed">Save Account Details <span class="ec-arrow" aria-hidden="true">→</span></button>
    </form>
   </section>
  @else
   <div class="ec-account-columns">
    <section class="ec-modern-card ec-personal-panel">
     <div class="ec-card-heading"><h2>Personal Details</h2><a class="ec-edit-btn" href="{{ route('shop.profile', ['tab'=>'settings']) }}">✎ Edit</a></div>
     <div class="ec-profile-details">
      <div><span>First name</span><strong>{{ $first ?: 'Not provided' }}</strong></div>
      <div><span>Last name</span><strong>{{ $last ?: 'Not provided' }}</strong></div>
      <div><span>Email address</span><strong>{{ $email ?: 'Not provided' }}</strong></div>
      <div><span>Phone</span><strong>{{ $phone ?: 'Not provided' }}</strong></div>
     </div>
    </section>
    <section class="ec-modern-card ec-account-overview">
     <h2>Account Overview</h2><div class="ec-stats-grid">@foreach($stats as $label=>$value)<div><strong>{{ is_numeric($value)?$value:0 }}</strong><span>{{ $label }}</span></div>@endforeach</div>
     <a class="ec-btn ec-proceed" href="{{ route('shop.orders') }}">View Order History <span class="ec-arrow" aria-hidden="true">→</span></a>
    </section>
   </div>
   <div class="ec-account-columns ec-address-row">
    <section class="ec-modern-card ec-account-address">
     <div class="ec-card-heading"><h2>Shipping Address</h2><a class="ec-edit-btn" href="{{ route('shop.checkout') }}">✎ Review</a></div>
     @if(filled(data_get($c,'shipping_address')) && (int)data_get($c,'is_shipping_address_available',0)===1)
      <strong>{{ trim((string)data_get($c,'shipping_first_name','').' '.(string)data_get($c,'shipping_last_name','')) ?: trim((string)$first.' '.(string)$last) }}</strong>
      <p>{{ data_get($c,'shipping_address') }} {{ data_get($c,'shipping_street') }}</p>
      <p>{{ data_get($c,'shipping_city') }}, {{ data_get($c,'shipping_state') }} {{ data_get($c,'shipping_postal_code') }}</p>
      <p>{{ data_get($c,'shipping_country') }}</p><span class="ec-address-tag">Default Shipping</span>
     @elseif(filled(data_get($c,'address')))
      <strong>{{ trim((string)$first.' '.(string)$last) }}</strong>
      <p>{{ data_get($c,'address') }} {{ data_get($c,'street') }}</p><p>{{ data_get($c,'city') }}, {{ data_get($c,'state') }} {{ data_get($c,'postal_code') }}</p><p>Shipping uses your billing address unless you specify otherwise at checkout.</p>
     @else<p>No shipping address saved yet. Add one during checkout.</p>@endif
    </section>
    <section class="ec-modern-card ec-account-address">
     <div class="ec-card-heading"><h2>Billing Address</h2><a class="ec-edit-btn" href="{{ route('shop.checkout') }}">✎ Review</a></div>
     @if(filled(data_get($c,'address')))
      <strong>{{ trim((string)$first.' '.(string)$last) }}</strong>
      <p>{{ data_get($c,'address') }} {{ data_get($c,'street') }}</p>
      <p>{{ data_get($c,'city') }}, {{ data_get($c,'state') }} {{ data_get($c,'postal_code') }}</p>
      <p>{{ data_get($c,'country') }}</p><span class="ec-address-tag">Default Billing</span>
     @else<p>No billing address saved yet. Add one during checkout.</p>@endif
    </section>
   </div>
  @endif
 </div>
</div>
@endsection
