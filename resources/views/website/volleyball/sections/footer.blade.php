<!-- CTA FOOTER -->
<footer class="foot" id="contact">
 <div class="wrap">
  <div class="cta">
   <div>
    
    <h2>Build your <em>{{ strtolower($sport['name'] ?? 'volleyball') }}</em> kit.</h2>
    <div style="margin-top:26px;display:flex;gap:13px;flex-wrap:wrap">
     <a class="btn" data-openkit href="#"><span>Start a kit</span><span class="ar">→</span></a>
    </div>
   </div>
   <div class="con">
    <a href="tel:+18885014999">+1 888 501 4999</a>
    <a href="mailto:info@encorecustom.com">info@encorecustom.com</a>
    <a href="https://instagram.com/encrcstm" target="_blank" rel="noopener">@encrcstm</a>
    <a href="#">891 4th St, San Rafael, CA</a>
   </div>
  </div>
  <div class="foot-bottom">
   <img class="logo" src="{{ asset('assets/reference/297053b134d4897782f2.png') }}" alt="Encore Custom">
   <span class="cp">© {{ date('Y') }} Encore Custom · {{ $sport['name'] ?? 'Volleyball' }}</span>
  </div>
 </div>
</footer>

