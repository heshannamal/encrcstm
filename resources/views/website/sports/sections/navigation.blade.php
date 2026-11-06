<!-- NAV -->
<nav class="nav" id="nav">
 <a href="{{ route('home') }}" class="homelink" id="homeLink" aria-label="Encore Custom home"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="rt">
  <a class="nl" href="{{ $page['seo']['canonical'] }}#kit">The kit</a>
  
  <a class="nl" href="{{ $page['seo']['canonical'] }}#proof">Teams</a>
  <a class="nl" href="{{ route('shop.catalog', ['selectedSport' => $page['id']]) }}">Catalog</a>
  <a class="btn catalog" href="{{ route('shop.orders') }}"><span>Orders</span><span class="ar">→</span></a>
  <a class="btn shop" href="{{ route('shop.profile') }}"><span>Profile</span><span class="ar">→</span></a>
  <a class="btn ec-nav-cart" href="{{ route('shop.cart') }}" aria-label="View shopping cart"><span>Cart</span><svg class="ec-cart-icon" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.85" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.6 13.2a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg></a>
 </div>
 <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>

