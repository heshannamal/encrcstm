@extends('website.layouts.app')
@section('title', trim($__env->yieldContent('shop-title')) . ' | Encore Custom')
@section('description', 'Encore Custom online apparel shop')
@section('canonical', url()->current())
@section('page-styles')
@include('shop.styles')
@endsection
@section('content')
<div class="ec-shell">
<nav class="nav ec-shop-nav" id="nav" aria-label="Shopping navigation">
 <a href="{{ route('home') }}" class="homelink" aria-label="Encore Custom home"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="rt" id="links">
  <a class="nl" href="{{ route('sports.show', ['sport' => 'volleyball']) }}#kit">The kit</a>
  <a class="nl" href="{{ route('sports.show', ['sport' => 'volleyball']) }}#proof">Teams</a>
  <a class="btn catalog" href="{{ route('shop.catalog') }}"><span>Catalog</span><span class="ar">→</span></a>
  <a class="btn" href="https://dev.encr.co/"><span>Start a kit</span><span class="ar">→</span></a>
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
