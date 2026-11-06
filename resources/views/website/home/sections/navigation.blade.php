<!-- NAV -->
<nav class="nav" id="nav">
 <a href="{{ route('home') }}#top"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="links" id="links">
  
  <a class="navlink" href="{{ route('home') }}#sports">Sports</a>
  <a class="navlink" href="{{ route('home') }}#contact">Contact</a>
  <span class="nav-cta">
   <a class="btn catalog" href="{{ route('shop.catalog') }}"><span>Catalog</span><span class="ar">→</span></a>
   <a class="btn shop" href="{{ route('shop.catalog', ['selectedCategory' => 3, 'selectedGender' => 'All', 'selectedSport' => 18, 'selectedStyle' => 0]) }}"><span>Shop</span><span class="ar">→</span></a>
   <a class="btn" data-openkit href="#"><span>Start a kit</span><span class="ar">→</span></a>
  </span>
 </div>
 <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>

