@extends('website.layouts.app')
@section('title', trim($__env->yieldContent('shop-title')) . ' | Encore Custom')
@section('description', 'Encore Custom online apparel shop')
@section('canonical', url()->current())
@section('page-styles')
@include('shop.styles')
@endsection
@section('content')
<div class="ec-shell">
@include('shop.loader')
<nav class="nav ec-shop-nav" id="nav" aria-label="Shopping navigation">
 <a href="{{ route('home') }}" class="homelink" aria-label="Encore Custom home"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="rt" id="links">
  <a class="nl" href="{{ route('sports.show', ['sport' => 'volleyball']) }}#kit">The kit</a>
  <a class="nl" href="{{ route('sports.show', ['sport' => 'volleyball']) }}#proof">Teams</a>
  @if(request()->routeIs('shop.cart', 'shop.profile', 'shop.orders', 'shop.order', 'shop.checkout', 'shop.payment', 'shop.success'))
   <a class="btn catalog" href="{{ route('shop.catalog') }}"><span>Catalog</span><span class="ar">→</span></a>
  @else
   <a class="btn catalog" href="{{ route('home') }}#sports"><span>Sports</span><span class="ar">→</span></a>
  @endif
  <a class="btn" href="{{ config('site.builder_url', 'https://dev.encr.co/') }}"><span>Start a kit</span><span class="ar">→</span></a>
  @if(session()->has('encore_user_token'))
   <a class="ec-shop-cart-link" href="{{ route('shop.cart') }}" aria-label="View cart" title="Cart">
    <svg viewBox="0 0 24 24" width="21" height="21" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.5 12.8a2 2 0 0 0 2 1.6h9.6a2 2 0 0 0 2-1.6L23 6H6"/></svg>
    <span class="ec-shop-mobile-label">Cart</span>
   </a>
   @php
    $shopAccount = session('encore_user', []);
    $shopName = trim((string) (data_get($shopAccount, 'f_name') ?: data_get($shopAccount, 'first_name') ?: data_get($shopAccount, 'name') ?: ''));
    $shopInitial = mb_strtoupper(mb_substr($shopName !== '' ? $shopName : 'U', 0, 1));
   @endphp
   <details class="ec-shop-account" id="ecShopAccount">
    <summary class="ec-shop-account-trigger" aria-label="Account menu" title="My account">
     <span class="ec-shop-avatar">{{ $shopInitial }}</span>
     <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
    </summary>
    <div class="ec-shop-account-dropdown">
     <span class="ec-shop-account-label">{{ $shopName !== '' ? $shopName : 'My account' }}</span>
     <a href="{{ route('shop.orders') }}">Orders</a>
     <a href="{{ route('shop.profile') }}">Profile</a>
     <form method="POST" action="{{ route('shop.logout') }}">
      @csrf
      <button type="submit">Logout</button>
     </form>
    </div>
   </details>
  @else
   <a class="btn ec-shop-signin" href="{{ route('shop.login') }}"><span>Sign In</span><span class="ar">→</span></a>
  @endif
 </div>
 <button class="burger" type="button" id="burger" aria-label="Toggle navigation" aria-controls="links" aria-expanded="false"><span></span><span></span><span></span></button>
</nav>
<main class="ec-main">
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
const nav=document.getElementById('nav');
const burger=document.getElementById('burger');
const links=document.getElementById('links');
const reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const loading=document.getElementById('ecShopLoader');
const loadingLabel=document.getElementById('ecShopLoaderLabel');
let loadingActive=false;
window.EncoreLoading={
 show:function(label){
  if(!loading)return;
  loadingActive=true;
  if(loadingLabel)loadingLabel.textContent=label||'Loading';
  loading.classList.remove('gone');
  loading.setAttribute('aria-hidden','false');
  document.body.classList.add('ec-shop-busy');
 },
 hide:function(){
  if(!loading)return;
  loadingActive=false;
  loading.classList.add('gone');
  loading.setAttribute('aria-hidden','true');
  document.body.classList.remove('ec-shop-busy');
 }
};
function finishLoading(){window.EncoreLoading.hide();}
window.addEventListener('pageshow',finishLoading);
window.addEventListener('load',finishLoading,{once:true});
if(document.readyState==='complete')requestAnimationFrame(finishLoading);
document.addEventListener('click',function(event){
 if(event.defaultPrevented||event.button!==0||event.metaKey||event.ctrlKey||event.shiftKey||event.altKey)return;
 const anchor=event.target.closest('a[href]');
 if(!anchor||anchor.hasAttribute('download')||anchor.target==='_blank')return;
 try{
  const url=new URL(anchor.href,window.location.href);
  if(url.origin!==window.location.origin||url.pathname===window.location.pathname&&url.search===window.location.search)return;
  window.EncoreLoading.show('Loading');
 }catch(error){}
},true);
document.addEventListener('submit',function(event){
 if(event.defaultPrevented||!event.target.checkValidity())return;
 window.EncoreLoading.show(event.target.id==='ecCatalogFilters'||event.target.classList.contains('ec-catalog-search')?'Loading products':event.target.id==='ecPaymentForm'?'Processing payment':'Loading');
},true);

function onScroll(){if(nav)nav.classList.toggle('scrolled',window.scrollY>40);}
onScroll();
window.addEventListener('scroll',onScroll,{passive:true});
if(burger&&links){
 burger.setAttribute('aria-expanded','false');
 burger.setAttribute('aria-controls','links');
 burger.addEventListener('click',function(){
  const isOpen=links.classList.toggle('open');
  burger.classList.toggle('open',isOpen);
  burger.setAttribute('aria-expanded',String(isOpen));
 });
 links.querySelectorAll('a').forEach(function(link){
  link.addEventListener('click',function(){
   links.classList.remove('open');burger.classList.remove('open');burger.setAttribute('aria-expanded','false');
  });
 });
}
const account=document.getElementById('ecShopAccount');
if(account){
 document.addEventListener('click',function(event){
  if(account.open&&!account.contains(event.target))account.open=false;
 });
 document.addEventListener('keydown',function(event){
  if(event.key==='Escape'&&account.open){
   account.open=false;
   account.querySelector('summary')?.focus();
  }
 });
 account.querySelectorAll('a').forEach(function(link){
  link.addEventListener('click',function(){account.open=false;});
 });
}
if(!reduce&&'IntersectionObserver' in window){
 const io=new IntersectionObserver(function(entries){
  entries.forEach(function(entry){
   if(entry.isIntersecting){
    entry.target.classList.add('ec-in-view');
    io.unobserve(entry.target);
   }
  });
 },{threshold:.06,rootMargin:'0px 0px 60px 0px'});
 document.querySelectorAll('.ec-catalog-section,.ec-product-detail-wrap,.ec-panel').forEach(function(el){
  el.classList.add('ec-reveal-ready');
  io.observe(el);
 });
}
document.querySelectorAll('.ec-shell form').forEach(function(form){
 if(form.id==='ecCatalogFilters'||form.classList.contains('ec-catalog-search'))return;
 form.addEventListener('submit',function(){
  if(!form.checkValidity())return;
  const submit=form.querySelector('button[type="submit"]');
  if(!submit)return;
  if(submit.id==='ecPayButton')return;
  if(submit.dataset.busy==='1')return;
  submit.dataset.busy='1';
  submit.classList.add('ec-is-submitting');
  if(!reduce){submit.style.opacity='.72';}
  submit.setAttribute('aria-busy','true');
  window.addEventListener('pageshow',function(){submit.dataset.busy='0';submit.classList.remove('ec-is-submitting');submit.removeAttribute('aria-busy');submit.style.opacity='';},{once:true});
 });
});
})();
</script>
@endsection
