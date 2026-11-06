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
  <a class="ec-navbtn ec-catalog {{ request()->routeIs('shop.catalog','shop.product') ? 'active' : '' }}" href="{{ route('shop.catalog') }}"><span>Catalog</span><span>→</span></a>
  <a class="ec-navbtn ec-shop" href="{{ route('shop.catalog', ['selectedCategory' => 3, 'selectedGender' => 'All', 'selectedSport' => 18, 'selectedStyle' => 0]) }}"><span>Shop</span><span>→</span></a>
  <a class="ec-navbtn ec-start" href="{{ config('site.builder_url') }}"><span>Start a Kit</span><span>→</span></a>
  <a class="ec-navlink {{ request()->routeIs('shop.cart') ? 'active' : '' }}" href="{{ route('shop.cart') }}">Cart</a>
  @if(session('encore_user_token'))
   <a class="ec-navlink" href="{{ route('shop.profile') }}">Profile</a>
   <form method="POST" action="{{ route('shop.logout') }}">@csrf<button class="ec-navlink ec-signout" type="submit">Sign out</button></form>
  @else
   <a class="ec-navlink" href="{{ route('shop.login') }}">Sign In</a>
  @endif
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
<footer class="ec-footer"><a href="{{ route('home') }}">Encore Custom</a><span>Made to order. Made to win.</span><a href="{{ config('site.team_url') }}">Work with our team</a></footer>
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
