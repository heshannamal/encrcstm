<nav class="nav" id="nav">
 <a class="homelink" href="{{ route('home') }}" aria-label="Encore Custom home"><img class="logo" src="{{ asset(config('site.logo')) }}" alt="Encore Custom"></a>
 <div class="rt">
  <a class="nl" href="#kit">The kit</a>
  <a class="nl" href="#catalog">Catalog</a>
  <a class="btn" href="#contact"><span>Start a kit</span><span class="ar">→</span></a>
 </div>
 <button class="burger" type="button" id="burger" aria-label="Find another sport"><span></span><span></span><span></span></button>
</nav>
<div class="switch" id="switch"><div class="row">
 <span class="lab">◆ Find your sport</span>
 @foreach($sports as $slug => $item)
  <a href="{{ $slug === 'volleyball' ? route('sports.volleyball') : route('sports.show', ['sport' => $slug]) }}" class="{{ $slug === $sport['slug'] ? 'active' : '' }}">{{ $item['name'] }}</a>
 @endforeach
</div></div>
