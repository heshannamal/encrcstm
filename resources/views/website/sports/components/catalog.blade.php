<section class="section sport-catalog" id="catalog">
 <div class="wrap">
  <div class="kit-head"><h2 class="h-sec reveal d1">{{ $sport['name'] }} <em>catalog</em></h2></div>
  <form class="sport-filters" method="GET" action="{{ $sport['slug'] === 'volleyball' ? route('sports.volleyball') : route('sports.show', ['sport' => $sport['slug']]) }}" role="search">
   <label>Collection
    <select name="category">
     @foreach([5 => 'All Apparel',1 => 'Teamwear',2 => 'Training',3 => 'Lifestyle'] as $value => $name)
      <option value="{{ $value }}" @selected((int)($filters['category'] ?? 5) === $value)>{{ $name }}</option>
     @endforeach
    </select>
   </label>
   <label>Style
    <select name="style">
     @foreach([0 => 'All Styles',21 => 'Compression & Leggings',8 => 'Shorts & Skirts',20 => 'Game Uniforms',11 => 'Tops',9 => 'Socks',2 => 'Pants & Sweats',7 => 'Hoodies & Fleece',1 => 'Bags',17 => 'Hats',5 => 'Outerwear',3 => 'Underwear & Bras',23 => 'Compression Bottoms',22 => 'Compression Tops'] as $value => $name)
      <option value="{{ $value }}" @selected((int)($filters['style'] ?? 0) === $value)>{{ $name }}</option>
     @endforeach
    </select>
   </label>
   <label>Search
    <input name="search" type="search" value="{{ $filters['search'] ?? '' }}" placeholder="Search teamwear">
   </label>
   <button class="btn" type="submit"><span>Find gear</span><span class="ar">→</span></button>
  </form>
  @forelse($products as $product)
   @if($loop->first)<div class="sport-product-grid">@endif
   @include('website.sports.components.product-card', ['product' => $product])
   @if($loop->last)</div>@endif
  @empty
   <div class="sport-empty">
    <h3>No matching products available.</h3>
    <p>The inventory service may be temporarily unavailable, or your filters may have no matches. Try a different category or contact our team.</p>
   </div>
  @endforelse
 </div>
</section>
