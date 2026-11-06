@extends('shop.layout')
@section('shop-title', $mode === 'login' ? 'Sign In' : 'Create Account')
@section('shop-content')
<div class="ec-auth">
 <h1 class="ec-title">{{ $mode === 'login' ? 'Welcome back' : 'Join Encore' }}</h1>
 <p class="ec-sub">{{ $mode === 'login' ? 'Sign in to manage your cart and orders.' : 'Create your customer account to shop and checkout.' }}</p>
 <div class="ec-panel"><form method="POST" action="{{ $mode === 'login' ? route('shop.login.submit') : route('shop.register.submit') }}" class="ec-stack">@csrf
 @if($mode==='register')
 <div class="ec-fieldset"><div class="ec-field"><label>First name</label><input class="ec-input" name="f_name" value="{{ old('f_name') }}" required></div><div class="ec-field"><label>Last name</label><input class="ec-input" name="l_name" value="{{ old('l_name') }}" required></div></div>
 @endif
 <div class="ec-field"><label>Email address</label><input class="ec-input" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required></div>
 <div class="ec-field"><label>Password</label><input class="ec-input" name="password" type="password" autocomplete="{{ $mode==='login'?'current-password':'new-password' }}" required></div>
 @if($mode==='register')<div class="ec-field"><label>Confirm password</label><input class="ec-input" name="password_confirmation" type="password" autocomplete="new-password" required></div>@endif
 <button type="submit" class="ec-btn">{{ $mode === 'login' ? 'Sign In' : 'Create Account' }}</button>
 </form>
 <p style="margin:24px 0 0" class="ec-muted">@if($mode==='login')New customer? <a href="{{ route('shop.register') }}">Create an account</a>@elseAlready registered? <a href="{{ route('shop.login') }}">Sign in</a>@endif</p>
 </div>
</div>
@endsection
