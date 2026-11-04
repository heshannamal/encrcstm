<!-- HERO -->
<header class="hero" id="top">
 <div class="hero-bg">
  <div class="hero-slides" id="heroSlides">
   <div class="hslide on" style="background-image:url('{{ asset('assets/reference/365bcdb4cf25362cede1.jpg') }}');background-position:65% 26%"></div>
   <div class="hslide" style="background-image:url('{{ asset('assets/reference/12daedb12373442da7b1.jpg') }}');background-position:50% 22%"></div>
   <div class="hslide" style="background-image:url('{{ asset('assets/reference/604ea706bcbbe0613bba.jpg') }}');background-position:58% 34%"></div>
   <div class="hslide" style="background-image:url('{{ asset('assets/reference/0ca88fee07db45bfe5f9.jpg') }}');background-position:64% 26%"></div>
   <div class="hslide" style="background-image:url('{{ asset('assets/reference/f6ef076940e21e82eec3.jpg') }}');background-position:60% 24%"></div>
   <div class="hslide" style="background-image:url('{{ asset('assets/reference/cbaf4191f979982d6c84.jpg') }}');background-position:50% 42%"></div>
  </div>
  <div class="veil"></div>
 </div>
 <div class="wrap hero-inner">
  
  <h1>Own the <span class="r">{{ ($sport['slug'] ?? 'volleyball') === 'volleyball' ? 'net.' : strtolower($sport['name']).'.' }}</span></h1>
  <p class="hero-sub">{{ ($sport['slug'] ?? 'volleyball') === 'volleyball' ? "Match kits engineered for the jump, the dig and the long season. Designed and made in our own factory, built to your program's identity." : 'Custom '.strtolower($sport['name']).' kits made for your team. Designed and made in our own factory, built to your program\'s identity.' }}</p>
  <div class="hero-cta">
   <a class="btn" data-openkit href="#"><span>Start a kit</span><span class="ar">→</span></a>
  </div>
  <div class="hero-facts">
   <span class="f"><b>12</b> kit minimum</span>
   <span class="sep"></span>
   <span class="f"><b>3-4</b> week turnaround</span>
   <span class="sep"></span>
   <span class="f"><b>24h</b> free design mock up</span>
   <span class="fbreak"></span>
   <span class="f"><b>Team store</b> available</span>
   <span class="sep"></span>
   <span class="f">Designed &amp; made <b>in house</b></span>
  </div>
 </div>
</header>

