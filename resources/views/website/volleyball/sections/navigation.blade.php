<!-- NAV -->
<nav class="nav" id="nav">
 <a href="{{ route('home') }}" class="homelink" id="homeLink" aria-label="Encore Custom home"><img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom"></a>
 <div class="rt">
  <a class="nl" href="{{ url()->current() }}#kit">The kit</a>
  
  <a class="nl" href="{{ url()->current() }}#proof">Teams</a>
  <a class="btn catalog" href="{{ url()->current() }}#catalog"><span>Catalog</span><span class="ar">→</span></a>
  <a class="btn" data-openkit href="#"><span>Start a kit</span><span class="ar">→</span></a>
 </div>
 <button class="burger" id="burger" aria-label="Menu"><span></span><span></span><span></span></button>
</nav>

