@extends('shop.layout')
@section('shop-title', 'Apparel Catalog')
@section('shop-content')
<section class="ec-store-top ec-store-reference">
 <div class="ec-catalog-toolbar">
  <div class="ec-catalog-toolbar-brand">ENCORE <span>Custom</span></div>
  <div class="ec-catalog-toolbar-title">APPAREL CATALOG</div>
 </div>
 <div class="ec-catalog-filterbar">
  <div class="ec-store-breadcrumb"><a href="{{ route('home') }}">Home</a> / Catalog</div>
  <form class="ec-store-filters" method="GET" action="{{ route('shop.catalog') }}" id="ecCatalogFilters">
   <div class="ec-field ec-filter-search"><label for="shopSearch">Search</label><input id="shopSearch" class="ec-input" type="search" name="search" placeholder="Search products" value="{{ request('search') }}"></div>
   <div class="ec-field"><label for="catFilter">Category</label><select id="catFilter" class="ec-select" name="selectedCategory">
    <option value="1" @selected((int)$filters['selectedCategory']===1)>Teamwear</option>
    <option value="3" @selected((int)$filters['selectedCategory']===3)>Lifestyle</option>
    <option value="5" @selected((int)$filters['selectedCategory']===5)>All Apparel</option>
    @foreach($categories as $cat)@php $catId=data_get($cat,'id'); @endphp
     @if(is_numeric($catId) && !in_array((int)$catId,[1,3,5],true))<option value="{{ $catId }}" @selected((int)$filters['selectedCategory']===(int)$catId)>{{ data_get($cat,'category_name',data_get($cat,'name','Other')) }}</option>@endif
    @endforeach
   </select></div>
   <div class="ec-field"><label for="genderFilter">Gender</label><select id="genderFilter" class="ec-select" name="selectedGender">@foreach(['All','Men','Women','Youth','Uni'] as $g)<option value="{{ $g }}" @selected($filters['selectedGender']===$g)>{{ $g }}</option>@endforeach</select></div>
   <div class="ec-field"><label for="sportFilter">Sport</label><select id="sportFilter" class="ec-select" name="selectedSport"><option value="18" @selected((int)$filters['selectedSport']===18)>All</option>@foreach(config('sports',[]) as $sport)<option value="{{ $sport['id'] }}" @selected((int)$filters['selectedSport']===(int)$sport['id'])>{{ $sport['name'] }}</option>@endforeach</select></div>
   <div class="ec-field"><label for="styleFilter">Style</label><select id="styleFilter" class="ec-select" name="selectedStyle"><option value="0">All</option>@foreach($styles as $style)@php $styleId=data_get($style,'id'); @endphp @if(is_numeric($styleId))<option value="{{ $styleId }}" @selected((int)$filters['selectedStyle']===(int)$styleId)>{{ data_get($style,'product_category_name',data_get($style,'name','Style')) }}</option>@endif @endforeach</select></div>
   <div class="ec-field ec-filter-sort"><label for="sortFilter">Sort</label><select id="sortFilter" class="ec-select" name="sort"><option value="">Featured</option><option value="name" @selected(request('sort')==='name')>A-Z</option><option value="price_asc" @selected(request('sort')==='price_asc')>Price low-high</option><option value="price_desc" @selected(request('sort')==='price_desc')>Price high-low</option></select></div>
   <button type="submit" class="ec-filter-apply">Apply</button>
  </form>
  <div class="ec-catalog-results"><span>{{ $items->count() }} Items</span><a href="{{ route('shop.catalog') }}">Clear ×</a></div>
 </div>
</section>
@if($error)<div class="ec-alert bad" role="alert">{{ $error }}</div>@endif
@forelse($grouped as $category=>$products)
<section class="ec-catalog-section">
 <button type="button" class="ec-category-toggle" aria-expanded="true" aria-controls="category-{{ $loop->index }}">
  <span>{{ $category }}</span><span class="ec-category-chevron" aria-hidden="true">⌄</span>
 </button>
 <div class="ec-product-grid" id="category-{{ $loop->index }}">
  @foreach($products as $product)
   <a class="ec-product-card" href="{{ route('shop.product',['id'=>$product['id']]) }}">
    <div class="ec-product-photo"><img loading="lazy" src="{{ $product['images'][0] ?? asset('images/product-placeholder.svg') }}" alt="{{ $product['name'] }}" onerror="this.onerror=null;this.src='{{ asset('images/product-placeholder.svg') }}'"></div>
    <div class="ec-product-caption"><span class="ec-product-name">{{ $product['name'] }}</span><span class="ec-product-cost">{{ $product['price_formatted'] }}</span></div>
    <p class="ec-product-info">This product can be customized in your team colors.</p>
   </a>
  @endforeach
 </div>
</section>
@empty
 <div class="ec-empty"><h2>No products found</h2><p>Try another sport, category or product search.</p><a href="{{ route('shop.catalog') }}" class="ec-btn dark">Reset Filters</a></div>
@endforelse
<script>
document.querySelectorAll('.ec-category-toggle').forEach(function(button){
 button.addEventListener('click',function(){
  const region=document.getElementById(button.getAttribute('aria-controls'));
  const expanded=button.getAttribute('aria-expanded')==='true';
  button.setAttribute('aria-expanded',String(!expanded));
  if(region)region.hidden=expanded;
 });
});
</script>
@endsection
