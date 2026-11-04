<header class="hero" id="top">
 <div class="hero-bg">
  <div class="hero-slides" id="heroSlides">
   @foreach(['e321825f2aea5dc04dc6.jpg','8b9c200e2f2587debe2e.jpg','fe710de5b7de040d2fab.jpg'] as $image)
    <div class="hslide {{ $loop->first ? 'on' : '' }}" style="background-image:url('{{ asset('assets/reference/'.$image) }}')"></div>
   @endforeach
  </div><div class="veil"></div>
 </div>
 <div class="wrap hero-inner">
  <h1>Own the <span class="r">{{ strtolower($sport['name']) }}.</span></h1>
  <p class="hero-sub">Custom {{ strtolower($sport['name']) }} teamwear, designed around your program. Made to order, made to win.</p>
  <div class="hero-cta">
   <a class="btn" href="#kit"><span>Build your kit</span><span class="ar">→</span></a>
   <a class="btn catalog" href="#catalog"><span>Browse catalog</span><span class="ar">→</span></a>
  </div>
  <div class="hero-facts"><span class="f"><b>12</b> kit minimum</span><span class="sep"></span><span class="f"><b>3-4</b> week turnaround</span><span class="sep"></span><span class="f"><b>24h</b> free design mock up</span></div>
 </div>
</header>
