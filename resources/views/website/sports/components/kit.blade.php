<section class="section sport-kit" id="kit">
 <div class="wrap">
  <div class="kit-head"><h2 class="h-sec reveal d1">Build the <em>whole</em> kit</h2></div>
  <p class="sport-lead">Find custom {{ strtolower($sport['name']) }} gamewear, training essentials and team layers, crafted to represent your program.</p>
  <div class="sport-steps">
   @foreach([['01','Choose your sport','Explore apparel for your team.'],['02','Choose your gear','Browse styles, cuts and combinations.'],['03','Make it yours','Work with our team on colors, logos and design.']] as [$number,$heading,$caption])
    <article class="sport-step reveal"><span>{{ $number }}</span><h3>{{ $heading }}</h3><p>{{ $caption }}</p></article>
   @endforeach
  </div>
  <a class="btn" href="#catalog"><span>Explore products</span><span class="ar">→</span></a>
 </div>
</section>
