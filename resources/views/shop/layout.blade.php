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
<nav class="nav ec-shop-nav" id="nav" aria-label="Shop navigation">
 <a href="{{ route('home') }}#top" class="homelink" aria-label="Encore Custom home"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="links" id="links">
  <a class="navlink" href="{{ route('home') }}#sports">Sports</a>
  <a class="navlink" href="{{ route('home') }}#contact">Contact</a>
  <span class="nav-cta">
   <a class="btn catalog" href="https://encr.co/customer_catalog"><span>Catalog</span><span class="ar">→</span></a>
   <a class="btn shop" href="{{ route('shop.catalog') }}"><span>Shop</span><span class="ar">→</span></a>
   <a class="btn" href="{{ config('site.builder_url', 'https://dev.encr.co/') }}"><span>Start a kit</span><span class="ar">→</span></a>
  </span>
  @include('shop.partials.nav-account')
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
/* Reproduce the approved homepage magnetic hover on shopping navbar buttons. */
if(!reduce && window.matchMedia('(hover: hover) and (pointer: fine)').matches){
 nav?.querySelectorAll('.nav-cta .btn').forEach(function(button){
  button.addEventListener('mousemove',function(event){
   const rect=button.getBoundingClientRect();
   const x=(event.clientX-rect.left-rect.width/2)*.18;
   const y=(event.clientY-rect.top-rect.height/2)*.28;
   button.style.transform='translate('+x+'px,'+y+'px)';
  });
  button.addEventListener('mouseleave',function(){button.style.transform='';});
  button.addEventListener('blur',function(){button.style.transform='';});
 });
}

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
