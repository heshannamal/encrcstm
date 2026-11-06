<!-- CTA FOOTER -->
<footer class="foot" id="contact">
 <div class="wrap">
  <div class="cta">
   <div>
    <h2>Build your <em>{{ strtolower($page['name']) }}</em> kit.</h2>
    <div style="margin-top:26px;display:flex;gap:13px;flex-wrap:wrap"><a class="btn" data-openkit href="#"><span>Start a kit</span><span class="ar">→</span></a></div>
   </div>
   <div class="con">
    <a href="tel:{{ $page['contact']['phone_link'] }}">{{ $page['contact']['phone_display'] }}</a>
    <a href="mailto:{{ $page['contact']['email'] }}">{{ $page['contact']['email'] }}</a>
    <a href="{{ $page['contact']['instagram'] }}" target="_blank" rel="noopener">{{ $page['contact']['instagram_label'] }}</a>
    <a href="{{ config('site.team_url') }}">{{ $page['contact']['address'] }}</a>
   </div>
  </div>
  <div class="foot-bottom">
   <img class="logo" src="{{ asset(config('site.logo')) }}" alt="Encore Custom">
   <span class="cp">© {{ date('Y') }} Encore Custom · {{ $page['name'] }}</span>
  </div>
 </div>
</footer>
