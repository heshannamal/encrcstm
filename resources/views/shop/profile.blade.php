@extends('shop.layout')
@section('shop-title', 'My Account')
@section('shop-content')
<h1 class="ec-title">My <span style="color:var(--ec-red)">Account</span></h1>
<p class="ec-sub">Your personal details and order information.</p>
<div class="ec-two">
 <section class="ec-panel"><h2>Personal Details</h2>
 <form method="POST" action="{{ route('shop.profile.update') }}" class="ec-stack">@csrf @method('PATCH')
 <div class="ec-fieldset"><div class="ec-field"><label>First name</label><input class="ec-input" name="f_name" required value="{{ old('f_name',data_get($customer,'f_name',data_get($user,'f_name',data_get($user,'first_name')))) }}"></div><div class="ec-field"><label>Last name</label><input class="ec-input" name="l_name" required value="{{ old('l_name',data_get($customer,'l_name',data_get($user,'l_name',data_get($user,'last_name')))) }}"></div></div>
 <div class="ec-field"><label>Email</label><input class="ec-input" value="{{ data_get($user,'email',data_get($customer,'email')) }}" readonly></div>
 <div class="ec-field"><label>Phone</label><input class="ec-input" name="phone_number" value="{{ old('phone_number',data_get($customer,'phone_number')) }}"></div>
 <button type="submit" class="ec-btn dark">Save Profile</button>
 </form>
 </section>
 <aside class="ec-panel"><h2>My Orders</h2><p class="ec-muted">View current and previous orders from your Encore customer account.</p>
 @if(is_array($summary))@foreach($summary as $k=>$v)@if(is_scalar($v))<div class="ec-row"><span>{{ ucwords(str_replace('_',' ',$k)) }}</span><strong>{{ $v }}</strong></div>@endif @endforeach @endif
 <a href="{{ route('shop.orders') }}" class="ec-btn" style="margin-top:20px;width:100%">View Order History</a></aside>
</div>
@endsection
