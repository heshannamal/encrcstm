<!-- NAV -->
<nav class="nav" id="nav">
 <a href="{{ route('home') }}#top"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="links" id="links">
  
  <a class="navlink" href="{{ route('home') }}#sports">Sports</a>
  <a class="navlink" href="{{ route('home') }}#contact">Contact</a>
  <a class="navlink" href="{{ route('shop.catalog') }}">Catalog</a>
  <span class="nav-cta">
   <a class="btn catalog" href="{{ route('shop.orders') }}"><span>Orders</span><span class="ar">→</span></a>
   <a class="btn shop" href="{{ route('shop.profile') }}"><span>Profile</span><span class="ar">→</span></a>
   <a class="btn ec-nav-cart" href="{{ route('shop.cart') }}" aria-label="View shopping cart"><span>Cart</span><svg class="ec-cart-icon" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.85" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.6 13.2a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg></a>
  </span>
 </div>
 <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>

