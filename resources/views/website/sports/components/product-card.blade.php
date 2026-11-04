<article class="sport-product">
 @if($product['url'])
  <a class="sport-product-link" href="{{ $product['url'] }}" aria-label="View {{ $product['name'] }} on Encore Custom">
 @else
  <div class="sport-product-link">
 @endif
  <div class="sport-product-image">
   @if($product['image'])
    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy">
   @else
    <div class="sport-product-placeholder">Encore Custom</div>
   @endif
  </div>
  <div class="sport-product-copy">
   <h3>{{ $product['name'] }}</h3>
   @if($product['price'] !== null)<span>{{ config('encore.currency_symbol') }}{{ $product['price'] }}</span>@endif
   <span class="sport-product-view">{{ $product['url'] ? 'View product →' : 'Details unavailable' }}</span>
  </div>
 @if($product['url'])</a>@else</div>@endif
</article>
