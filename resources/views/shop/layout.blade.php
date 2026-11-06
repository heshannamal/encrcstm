@extends('website.layouts.app')
@section('title', trim($__env->yieldContent('shop-title')) . ' | Encore Custom')
@section('description', 'Encore Custom online apparel shop')
@section('canonical', url()->current())
@section('page-styles')
@include('shop.styles')
@endsection
@section('content')
<div class="ec-shell">
<header class="ec-header">
 <a class="ec-brand" href="{{ route('home') }}" aria-label="Encore Custom Home"><img src="{{ asset(config('site.logo')) }}" alt="Encore Custom"></a>
 <nav class="ec-nav" aria-label="Shop navigation">
  <a href="{{ route('home') }}">Home</a>
  <a href="{{ route('shop.catalog') }}" class="{{ request()->routeIs('shop.catalog','shop.product') ? 'active' : '' }}">Catalog</a>
  <a href="{{ route('shop.cart') }}" class="{{ request()->routeIs('shop.cart') ? 'active' : '' }}">Cart</a>
  <a href="{{ route('shop.orders') }}">Orders</a>
  @if(session('encore_user_token'))
   <a href="{{ route('shop.profile') }}">Profile</a>
   <form method="POST" action="{{ route('shop.logout') }}">@csrf<button type="submit">Sign out</button></form>
  @else
   <a href="{{ route('shop.login') }}">Sign in</a>
  @endif
 </nav>
</header>
<main class="ec-main">
 @if(session('success'))<div class="ec-alert good" role="status">{{ session('success') }}</div>@endif
 @if(session('warning'))<div class="ec-alert">{{ session('warning') }}</div>@endif
 @if(session('error'))<div class="ec-alert bad" role="alert">{{ session('error') }}</div>@endif
 @if($errors->any())<div class="ec-alert bad" role="alert">{{ $errors->first() }}</div>@endif
 @yield('shop-content')
</main>
<footer class="ec-footer"><a href="{{ route('home') }}">Encore Custom</a><span>Made to order. Made to win.</span><a href="{{ config('site.team_url') }}">Work with our team</a></footer>
</div>
@endsection
