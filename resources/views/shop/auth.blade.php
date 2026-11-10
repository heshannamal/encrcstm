@extends('shop.layout')
@section('shop-title', $mode === 'login' ? 'Sign In' : 'Create Account')
@section('shop-content')
<section class="ec-shop-hero ec-auth-hero ec-auth-{{ $mode }}">
 <div class="ec-auth-scene" aria-hidden="true"></div>
 <div class="ec-auth-wrap">
  <div class="ec-auth-card">
   <a class="ec-auth-brand" href="{{ route('home') }}" aria-label="Encore Custom home"><img class="ec-auth-logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
   <h1 class="ec-auth-title">@if($mode === 'login')Welcome <span>Back</span>@else Join <span>Encore</span>@endif</h1>
   <p class="ec-auth-subtitle">{{ $mode === 'login' ? 'Sign in to manage your orders and account.' : 'Create your customer account to shop and checkout.' }}</p>

   @if($errors->any())
    <div class="ec-auth-errors" role="alert">
     @foreach($errors->all() as $message)<p>{{ $message }}</p>@endforeach
    </div>
   @endif

   <form method="POST" action="{{ $mode === 'login' ? route('shop.login.submit') : route('shop.register.submit') }}" class="ec-shop-form ec-auth-form" id="ecAuthForm">
    @csrf
    @if($mode === 'register')
     <div class="ec-fieldset ec-auth-name-row">
      <div class="ec-field"><label for="authFirst">First name <span class="ec-auth-required">*</span></label><div class="ec-auth-control"><span class="ec-auth-field-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="8" r="3.5"/><path d="M5.5 20a6.5 6.5 0 0 1 13 0"/></svg></span><input id="authFirst" class="ec-input" name="f_name" autocomplete="given-name" value="{{ old('f_name') }}" placeholder="First name" maxlength="255" required></div></div>
      <div class="ec-field"><label for="authLast">Last name <span class="ec-auth-required">*</span></label><div class="ec-auth-control"><span class="ec-auth-field-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="8" r="3.5"/><path d="M5.5 20a6.5 6.5 0 0 1 13 0"/></svg></span><input id="authLast" class="ec-input" name="l_name" autocomplete="family-name" value="{{ old('l_name') }}" placeholder="Last name" maxlength="255" required></div></div>
     </div>
    @endif

    <div class="ec-field"><label for="authEmail">Email address <span class="ec-auth-required">*</span></label><div class="ec-auth-control"><span class="ec-auth-field-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></span><input id="authEmail" class="ec-input" name="email" type="email" autocomplete="email" value="{{ old('email') }}" placeholder="Enter your email address" maxlength="255" required></div></div>

    <div class="ec-field"><label for="authPassword">Password <span class="ec-auth-required">*</span></label><div class="ec-auth-control ec-password-wrap"><span class="ec-auth-field-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 1 1 8 0v3"/></svg></span><input id="authPassword" class="ec-input" name="password" type="password" autocomplete="{{ $mode === 'login' ? 'current-password' : 'new-password' }}" placeholder="{{ $mode === 'login' ? 'Enter your password' : 'Create a password (8+ characters)' }}" @if($mode === 'register') minlength="8" @endif required><button type="button" class="ec-password-toggle" aria-label="Show password" aria-pressed="false" data-target="authPassword"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.5"/></svg><span>Show</span></button></div></div>

    @if($mode === 'register')
     <div class="ec-field"><label for="authConfirm">Confirm password <span class="ec-auth-required">*</span></label><div class="ec-auth-control ec-password-wrap"><span class="ec-auth-field-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 1 1 8 0v3"/></svg></span><input id="authConfirm" class="ec-input" name="password_confirmation" type="password" autocomplete="new-password" placeholder="Confirm your password" minlength="8" required><button type="button" class="ec-password-toggle" aria-label="Show password confirmation" aria-pressed="false" data-target="authConfirm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.5"/></svg><span>Show</span></button></div></div>
    @endif

    <button class="ec-btn ec-auth-submit" type="submit"><span>{{ $mode === 'login' ? 'Sign In' : 'Create Account' }}</span><span class="ec-auth-cta-arrow" aria-hidden="true">→</span></button>
   </form>
   <div class="ec-auth-bottom">
    @if($mode === 'login')
     <span>New customer?</span><a href="{{ route('shop.register') }}">Create an account <span aria-hidden="true">→</span></a>
    @else
     <span>Already have an account?</span><a href="{{ route('shop.login') }}">Sign in <span aria-hidden="true">→</span></a>
    @endif
   </div>
  </div>
 </div>
</section>
<script>
document.querySelectorAll('.ec-password-toggle').forEach(function(button){
 button.addEventListener('click',function(){
  const input=document.getElementById(button.dataset.target);
  if(!input)return;
  const show=input.type==='password';
  input.type=show?'text':'password';
  const label=button.querySelector('span');
  if(label)label.textContent=show?'Hide':'Show';
  button.setAttribute('aria-label',(show?'Hide':'Show')+' '+(button.dataset.target==='authConfirm'?'password confirmation':'password'));
  button.setAttribute('aria-pressed',String(show));
 });
});
</script>
@endsection
