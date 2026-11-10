<!-- NAV -->
<nav class="nav" id="nav">
 <a href="{{ route('home') }}#top"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="links" id="links">
  
  <a class="navlink" href="{{ route('home') }}#sports">Sports</a>
  <a class="navlink" href="{{ route('home') }}#contact">Contact</a>
  <span class="nav-cta">
   <a class="btn catalog" href="https://encr.co/customer_catalog"><span>Catalog</span><span class="ar">→</span></a>
   <a class="btn shop" href="{{ route('shop.catalog') }}"><span>Shop</span><span class="ar">→</span></a>
   <a class="btn" href="https://dev.encr.co/"><span>Start a kit</span><span class="ar">→</span></a>
  </span>
  @include('shop.partials.nav-account')
 </div>
 <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>

