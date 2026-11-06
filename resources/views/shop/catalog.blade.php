@extends('shop.layout')
@section('shop-title', 'Apparel Catalog')
@section('shop-content')
<h1 class="ec-title ec-catalog-title">Apparel <span class="ec-catalog-script">Catalog</span></h1>
<p class="ec-sub">Explore customizable uniforms, performance wear, and lifestyle apparel.</p>
<form method="GET" action="{{ route('shop.catalog') }}" class="ec-filters">
 <div class="ec-field"><label>Search</label><input class="ec-input" name="search" value="{{ request('search') }}" placeholder="Product name or number"></div>
 <div class="ec-field"><label>Category</label><select class="ec-select" name="selectedCategory"><option value="5" @selected((int)$filters['selectedCategory']===5)>All Apparel</option><option value="3" @selected((int)$filters['selectedCategory']===3)>Lifestyle</option>@foreach($categories as $cat)@php $cId=data_get($cat,'id'); @endphp@if(!in_array((int)$cId,[3,5]))<option value="{{ $cId }}" @selected((int)$filters['selectedCategory']===(int)$cId)>{{ data_get($cat,'category_name',data_get($cat,'name')) }}</option>@endif @endforeach</select></div>
 <div class="ec-field"><label>Gender</label><select class="ec-select" name="selectedGender">@foreach(['All','Men','Women','Youth','Uni'] as $g)<option value="{{ $g }}" @selected($filters['selectedGender']===$g)>{{ $g }}</option>@endforeach</select></div>
 <div class="ec-field"><label>Sport</label><select class="ec-select" name="selectedSport"><option value="18">All Sports</option>@foreach(config('sports',[]) as $slug=>$sport)<option value="{{ $sport['id'] }}" @selected((int)$filters['selectedSport']===(int)$sport['id'])>{{ $sport['name'] }}</option>@endforeach</select></div>
 <div class="ec-field"><label>Style</label><select class="ec-select" name="selectedStyle"><option value="0">All Styles</option>@foreach($styles as $style)<option value="{{ data_get($style,'id') }}" @selected((int)$filters['selectedStyle']===(int)data_get($style,'id'))>{{ data_get($style,'product_category_name',data_get($style,'name','Style')) }}</option>@endforeach</select></div>
 <div class="ec-field"><label>Sort</label><select class="ec-select" name="sort"><option value="">Default</option><option value="price_asc" @selected(request('sort')==='price_asc')>Price: low to high</option><option value="price_desc" @selected(request('sort')==='price_desc')>Price: high to low</option><option value="name" @selected(request('sort')==='name')>Name A-Z</option></select></div>
 <button class="ec-btn" type="submit">Apply</button>
</form>
@if($error)<div class="ec-alert bad">{{ $error }}</div>@endif
<p class="ec-muted">{{ $items->count() }} products</p>
@forelse($grouped as $category=>$products)
 <h2 class="ec-category">{{ $category }}</h2>
 <div class="ec-grid">@foreach($products as $product)
 <a class="ec-card" href="{{ route('shop.product',$product['id']) }}">
  @if(!empty($product['images'][0]))<img class="ec-thumb" loading="lazy" src="{{ $product['images'][0] }}" alt="{{ $product['name'] }}">@else<div class="ec-thumb"></div>@endif
  <div class="ec-cardbody"><span class="ec-cardname">{{ $product['name'] }}</span><span class="ec-price">{{ $product['price_formatted'] }}</span></div>
 </a>
 @endforeach</div>
@empty
 <div class="ec-empty"><h2>No products found</h2><p>Try a different category or search.</p><a class="ec-btn dark" href="{{ route('shop.catalog') }}">Reset filters</a></div>
@endforelse
@endsection
