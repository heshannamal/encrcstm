<!-- SPORTS -->
<section class="section" id="sports" style="background:radial-gradient(120% 80% at 82% 0%,rgba(231,0,51,.06),transparent 58%)">
 <div class="wrap">
  <div class="sports-head"><div><h2 class="h-sec reveal d1">Pick your <em>sport</em></h2></div></div>
  <div class="sindex reveal d2" id="sportsGrid">
   @foreach(config('sports') as $slug => $item)
    <a class="sitem" data-sport="{{ $item['name'] }}" href="{{ route('sports.show', ['sport' => $slug]) }}">
      <span class="no">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
      <span class="nm">{{ $item['name'] }}</span>
      <span class="ar">View →</span>
    </a>
   @endforeach
  </div>
 </div>
</section>
