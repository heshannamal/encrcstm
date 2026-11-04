<footer class="foot" id="contact">
 <div class="wrap"><div class="cta">
  <div><h2>Build your <em>{{ strtolower($sport['name']) }}</em> kit.</h2><div style="margin-top:26px"><a class="btn" href="mailto:{{ config('site.email') }}?subject={{ rawurlencode($sport['name'].' teamwear inquiry') }}"><span>Talk to our team</span><span class="ar">→</span></a></div></div>
  <div class="con"><a href="tel:+18885014999">+1 888 501 4999</a><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a><a href="{{ route('home') }}#sports">All sports</a></div>
 </div>
 <div class="foot-bottom"><img class="logo" src="{{ asset(config('site.logo')) }}" alt="Encore Custom"><span class="cp">© {{ date('Y') }} Encore Custom · {{ $sport['name'] }}</span></div>
 </div>
</footer>
