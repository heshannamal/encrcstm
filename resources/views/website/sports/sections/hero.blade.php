<!-- HERO -->
<header class="hero" id="top">
 <div class="hero-bg">
  <div class="hero-slides" id="heroSlides">
   @foreach($page['hero']['slides'] as $slide)
    <div class="hslide {{ $loop->first ? 'on' : '' }}" style="background-image:url('{{ asset($slide['image']) }}');background-position:{{ $slide['position'] ?? 'center' }}"></div>
   @endforeach
  </div>
  <div class="veil"></div>
 </div>
 <div class="wrap hero-inner">
  <h1>{{ $page['hero']['lead'] }} <span class="r">{{ $page['hero']['accent'] }}</span></h1>
  <p class="hero-sub">{{ $page['hero']['subtitle'] }}</p>
  <div class="hero-cta"><a class="btn" data-openkit href="#"><span>Start a kit</span><span class="ar">→</span></a></div>
  <div class="hero-facts">
   @foreach($page['hero']['facts'] as $fact)
    @if($loop->index === 3)<span class="fbreak"></span>@elseif(!$loop->first)<span class="sep"></span>@endif
    <span class="f"><b>{{ $fact['value'] }}</b> {{ $fact['label'] }}</span>
   @endforeach
  </div>
 </div>
</header>
