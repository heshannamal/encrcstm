@extends('shop.layout')
@section('shop-title', $mode === 'login' ? 'Sign In' : 'Create Account')
@section('shop-content')
<section class="ec-shop-hero ec-auth-hero">
 <div class="ec-shop-hero-art" aria-hidden="true"></div>
 <div class="ec-auth-wrap">
  <div class="ec-auth-card">
   <img class="ec-auth-logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom">
   <h1 class="ec-auth-title">@if($mode === 'login')Welcome <span>Back</span>@else Join <span>Encore</span>@endif</h1>
   <p class="ec-auth-subtitle">{{ $mode === 'login' ? 'Sign in to manage your orders and account.' : 'Create your customer account to shop and checkout.' }}</p>
   <form method="POST" action="{{ $mode === 'login' ? route('shop.login.submit') : route('shop.register.submit') }}" class="ec-shop-form">
    @csrf
    @if($mode === 'register')
     <div class="ec-fieldset"><div class="ec-field"><label for="authFirst">First name</label><input id="authFirst" class="ec-input" name="f_name" autocomplete="given-name" value="{{ old('f_name') }}" placeholder="First name" required></div>
     <div class="ec-field"><label for="authLast">Last name</label><input id="authLast" class="ec-input" name="l_name" autocomplete="family-name" value="{{ old('l_name') }}" placeholder="Last name" required></div></div>
    @endif
    <div class="ec-field"><label for="authEmail">Email address</label><input id="authEmail" class="ec-input" name="email" type="email" autocomplete="email" value="{{ old('email') }}" placeholder="Enter your email address" required></div>
    <div class="ec-field"><label for="authPassword">Password</label><div class="ec-password-wrap"><input id="authPassword" class="ec-input" name="password" type="password" autocomplete="{{ $mode === 'login' ? 'current-password' : 'new-password' }}" placeholder="{{ $mode === 'login' ? 'Your password' : 'Create a password (8+ characters)' }}" minlength="{{ $mode === 'register' ? '8' : '1' }}" required><button type="button" class="ec-password-toggle" aria-label="Show password" aria-pressed="false" data-target="authPassword">Show</button></div></div>
    @if($mode === 'register')
     <div class="ec-field"><label for="authConfirm">Confirm password</label><div class="ec-password-wrap"><input id="authConfirm" class="ec-input" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Confirm your password" minlength="8" required><button type="button" class="ec-password-toggle" aria-label="Show password confirmation" aria-pressed="false" data-target="authConfirm">Show</button></div></div>
    @endif
    <button class="ec-btn ec-auth-submit" type="submit">{{ $mode === 'login' ? 'Sign In' : 'Create Account' }} <span aria-hidden="true">→</span></button>
   </form>
   <div class="ec-auth-bottom">
    @if($mode === 'login')<span>New customer?</span><a href="{{ route('shop.register') }}">Create an account →</a>
    @else <span>Already have an account?</span><a href="{{ route('shop.login') }}">Sign in →</a>@endif
   </div>
  </div>
 </div>
</section>
<script>
document.querySelectorAll('.ec-password-toggle').forEach(function(button){
 button.addEventListener('click',function(){
  const input=document.getElementById(button.dataset.target);
  if(!input)return;
  const show=input.type==='password';input.type=show?'text':'password';
  button.textContent=show?'Hide':'Show';button.setAttribute('aria-pressed',String(show));
 });
});
</script>
@endsection
