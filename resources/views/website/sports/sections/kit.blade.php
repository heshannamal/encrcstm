<!-- THE KIT -->
<section class="section" id="kit">
 <div class="wrap"><div class="kit-head">
  <h2 class="h-sec reveal d1">{{ $page['kit_heading']['before'] }} <em>{{ $page['kit_heading']['accent'] }}</em> {{ $page['kit_heading']['after'] }}</h2>
 </div></div>
 <div class="kitrail-wrap">
  <div class="kitnav">
   <button type="button" aria-label="Previous piece" data-kdir="-1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg></button>
   <button type="button" aria-label="Next piece" data-kdir="1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button>
  </div>
  <div class="kitrail" id="kitRail">
   @foreach($page['kits'] as $kit)
   <div class="kitcard kc{{ $loop->iteration }}">
    <div class="kitcard-img">
     @foreach($kit['slides'] as $slide)
      <div class="kslide {{ $loop->first ? 'on' : '' }} {{ empty($slide['image']) ? 'ph' : '' }}">
       @if(!empty($slide['image']))
        <img src="{{ asset($slide['image']) }}" alt="{{ $slide['alt'] ?? $kit['title'] }}" @if(!empty($slide['position'])) style="object-position:{{ $slide['position'] }}" @endif>
       @else
        <span class="plab">{{ $slide['label'] ?? $kit['title'] }}</span>
       @endif
      </div>
     @endforeach
     <div class="kscrim"></div>
     <div class="kcard-info"><div class="kitcard-txt">
      <h3>{{ $kit['title'] }}</h3><div class="ktag">{{ $kit['tag'] }}</div><p class="kdesc">{{ $kit['description'] }}</p>
     </div></div>
    </div>
   </div>
   @endforeach
  </div>
 </div>
</section>
<section class="section light" id="catalog">
 <div class="wrap">
  <h2 class="h-sec reveal d1">{{ $page['name'] }} <em>Catalog</em></h2>
  <div class="catcats reveal d2" id="catCats"></div>
  <div class="cat-actions reveal">
   <button class="cat-expand" id="catMore" type="button"><span id="catMoreLabel">More categories</span></button>
   <a class="btn catalog" href="{{ $page['full_catalog_url'] }}" target="_blank" rel="noopener"><span>View the full catalog</span><span class="ar">→</span></a>
  </div>
 </div>
</section>
