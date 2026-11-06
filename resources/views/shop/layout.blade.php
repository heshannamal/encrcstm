@extends('website.layouts.app')
@section('title', trim($__env->yieldContent('shop-title')) . ' | Encore Custom')
@section('description', 'Encore Custom online apparel shop')
@section('canonical', url()->current())
@section('page-styles')
@include('shop.styles')
@endsection
@section('content')
<div class="ec-shell">
<header class="ec-header" id="shopHeader">
 <a class="ec-brand" href="{{ route('home') }}" aria-label="Encore Custom Home"><img src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <nav class="ec-nav" id="shopNav" aria-label="Shopping navigation">
  <a class="ec-navlink" href="{{ route('home') }}#sports">Sports</a>
  <a class="ec-navlink" href="{{ route('home') }}#contact">Contact</a>
  <a class="ec-navlink {{ request()->routeIs('shop.catalog','shop.product') ? 'active' : '' }}" href="{{ route('shop.catalog') }}">Catalog</a>
  <a class="ec-navbtn ec-catalog" href="{{ route('shop.orders') }}"><span>Orders</span><span>→</span></a>
  <a class="ec-navbtn ec-shop" href="{{ route('shop.profile') }}"><span>Profile</span><span>→</span></a>
  <a class="ec-navbtn ec-start ec-nav-cart" href="{{ route('shop.cart') }}" aria-label="View shopping cart"><span>Cart</span><svg class="ec-cart-icon" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.85" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.6 13.2a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg></a>
 </nav>
 <button class="ec-burger" type="button" id="ecBurger" aria-expanded="false" aria-controls="shopNav" aria-label="Toggle shopping menu"><span></span><span></span><span></span></button>
</header>
<main class="ec-main">
 @if(session('success'))<div class="ec-alert good" role="status">{{ session('success') }}</div>@endif
 @if(session('warning'))<div class="ec-alert">{{ session('warning') }}</div>@endif
 @if(session('error'))<div class="ec-alert bad" role="alert">{{ session('error') }}</div>@endif
 @if($errors->any())<div class="ec-alert bad" role="alert">{{ $errors->first() }}</div>@endif
 @yield('shop-content')
</main>
<footer class="ec-shop-footer">
 <div class="ec-shop-footer-col"><h3>Contact</h3><a href="mailto:info@encorecustom.com">info@encorecustom.com</a><a href="tel:+18885014999">+1 888-501-4999</a><p>891 4th St, San Rafael,<br>CA 94901, USA</p></div>
 <div class="ec-shop-footer-center"><a href="{{ route('home') }}"><img src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a><p>Manufacturer & Clothier</p><small>© Encore Custom {{ date('Y') }}. All rights reserved.</small></div>
 <div class="ec-shop-footer-col"><h3>Explore</h3><a href="{{ route('shop.catalog') }}">Apparel Catalog</a><a href="{{ route('shop.cart') }}">Cart</a><a href="{{ config('site.team_url') }}">Work with our team</a></div>
</footer>
</div>
<script>
(function(){
const toggle=document.getElementById('ecBurger'),nav=document.getElementById('shopNav');
if(toggle&&nav){
 toggle.addEventListener('click',function(){const open=nav.classList.toggle('ec-open');toggle.setAttribute('aria-expanded',String(open))});
 nav.querySelectorAll('a').forEach(function(link){link.addEventListener('click',function(){nav.classList.remove('ec-open');toggle.setAttribute('aria-expanded','false')})});
}
})();
</script>
@endsection
