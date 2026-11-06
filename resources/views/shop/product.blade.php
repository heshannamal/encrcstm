@extends('shop.layout')
@section('shop-title', $product['name'] ?? 'Product Details')
@section('shop-content')
@php
 $raw=$product['raw'] ?? [];
 $details=data_get($raw,'product_details',[]);
 $productNo=data_get($raw,'sub_product_no',data_get($details,'product_no',data_get($raw,'product_no')));
 $description=$product['description'] ?? '';
 $features=data_get($raw,'display_product_features',data_get($raw,'product_display_detail.product_features',data_get($raw,'product_features',data_get($details,'product_features'))));
 $audience=data_get($raw,'display_who_we_made_this_for',data_get($raw,'product_display_detail.who_we_made_this_for',data_get($raw,'who_we_made_this_for',data_get($details,'who_we_made_this_for'))));
 $fabricOptions=collect(data_get($details,'product_fabrics',data_get($raw,'fabrics',[])));
 $embellishments=collect(data_get($details,'product_embellishments',data_get($raw,'embellishments',[])));
 $sizes=collect($options['sizes'] ?? []);
 $hasColors=count($options['colors'] ?? [])>0;
 $imgs=$product['images'] ?? [];
@endphp
<div class="ec-product-breadcrumb">
 <a href="{{ route('home') }}">Home</a> / <a href="{{ route('shop.catalog') }}">Catalog</a> /
 <span>{{ $product['name'] }}</span>
</div>
<div class="ec-product-detail-wrap">
 <div class="ec-product-media">
  <div class="ec-product-gallery">
   <div class="ec-gallery-thumbnails">@foreach(array_slice($imgs,0,4) as $img)<button type="button" class="ec-thumb-button {{ $loop->first?'selected':'' }}" data-gallery-src="{{ $img }}" aria-label="Show image {{ $loop->iteration }}"><img src="{{ $img }}" alt="{{ $product['name'] }} view {{ $loop->iteration }}"></button>@endforeach</div>
   <div class="ec-gallery-feature">@if(!empty($imgs[0]))<img id="ecMainImage" src="{{ $imgs[0] }}" alt="{{ $product['name'] }}">@else<img id="ecMainImage" src="{{ asset('images/product-placeholder.svg') }}" alt="Product image unavailable">@endif</div>
  </div>
  @if(count($imgs)>1)<div class="ec-gallery-additional">@foreach(array_slice($imgs,1) as $img)<button type="button" data-gallery-src="{{ $img }}" aria-label="Show additional product image"><img loading="lazy" src="{{ $img }}" alt="{{ $product['name'] }} additional view {{ $loop->iteration }}"></button>@endforeach</div>@endif
 </div>
 <section class="ec-detail-panel">
  <h1>{{ $product['name'] }}</h1>
  @if(filled($productNo))<p class="ec-detail-number">Product # : {{ $productNo }}</p>@endif
  <p class="ec-detail-price">{{ $product['price_formatted'] }}</p>

  @if($fabricOptions->isNotEmpty())
   <div class="ec-detail-choice"><strong>Fabric</strong><div class="ec-chip-list">@foreach($fabricOptions->take(8) as $fabric)<span class="ec-chip">{{ data_get($fabric,'fabric_name',data_get($fabric,'name',data_get($fabric,'fabric.name','Fabric'))) }}</span>@endforeach</div></div>
  @endif
  @if($embellishments->isNotEmpty())
   <div class="ec-detail-choice"><strong>Embellishment</strong><div class="ec-chip-list">@foreach($embellishments->take(8) as $embellishment)<span class="ec-chip">{{ data_get($embellishment,'embellishment_name',data_get($embellishment,'name','Embellishment')) }}</span>@endforeach</div></div>
  @endif

  <form action="{{ route('shop.cart.add') }}" method="POST" class="ec-detail-buy" id="ecProductForm">
   @csrf
   <input type="hidden" name="product_id" value="{{ $product['id'] }}">
   <h2>Available Sizes</h2>
   <div class="ec-size-display">@forelse($sizes as $size)<span>{{ data_get($size,'size_name',data_get($size,'name','Size')) }}</span>@empty<span>Contact our team for available sizes.</span>@endforelse</div>
   <div class="ec-fieldset">
    <div class="ec-field"><label for="ecSize">Select size</label><select name="size_id" id="ecSize" class="ec-select" required><option value="">Choose size</option>@foreach($sizes as $size)<option value="{{ data_get($size,'id') }}">{{ data_get($size,'size_name',data_get($size,'name','Size')) }}</option>@endforeach</select></div>
    @if($hasColors)<div class="ec-field"><label for="ecColor">Color</label><select name="color_id" id="ecColor" class="ec-select" required><option value="">Choose color</option>@foreach($options['colors'] as $color)<option value="{{ data_get($color,'id') }}">{{ data_get($color,'color_name',data_get($color,'pantone_code',data_get($color,'hex','Color'))) }}</option>@endforeach</select></div>@else<input type="hidden" id="ecColor" value="">@endif
   </div>
   <div class="ec-fieldset">
    <div class="ec-field"><label for="ecQuantity">Quantity</label><input class="ec-input" id="ecQuantity" name="quantity" type="number" min="1" max="1" value="1" required></div>
    <div class="ec-field"><label>Stock availability</label><p class="ec-stock-label" id="ecStock">Select a size to check stock.</p></div>
   </div>
   <button class="ec-inquire-btn ec-add-to-cart" type="submit" id="ecAddButton" disabled><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.6 13.2a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg><span>Add to Cart</span></button>
  </form>
  <div class="ec-fit-panel"><h2>Fit</h2><div class="ec-fit-track"><span class="ec-fit-indicator"></span></div><div class="ec-fit-labels"><span>Runs Small</span><span>True to Size</span><span>Runs Large</span></div></div>
  <div class="ec-detail-copy">
   @if(filled($description))<h2>Description</h2><div>{!! nl2br(e(strip_tags((string) $description))) !!}</div>@endif
   @if(filled($features))<h2>Product Features</h2><div>{!! nl2br(e(strip_tags(is_array($features)?implode("\n",array_filter($features,'is_scalar')):(string)$features))) !!}</div>@endif
   @if(filled($audience))<h2>Who We Made This For</h2><div>{!! nl2br(e(strip_tags((string)$audience))) !!}</div>@endif
  </div>
 </section>
</div>
<script>
(function(){
 const image=document.getElementById('ecMainImage');
 document.querySelectorAll('[data-gallery-src]').forEach(function(btn){btn.addEventListener('click',function(){if(image)image.src=btn.dataset.gallerySrc;document.querySelectorAll('.ec-thumb-button').forEach(function(el){el.classList.toggle('selected',el.dataset.gallerySrc===btn.dataset.gallerySrc)})})});
 const combinations=@json($options['combinations'] ?? []);
 const size=document.getElementById('ecSize'),color=document.getElementById('ecColor'),qty=document.getElementById('ecQuantity'),button=document.getElementById('ecAddButton'),message=document.getElementById('ecStock');
 const hasColors=@json($hasColors);
 function sync(){
  const selectedSize=Number(size.value||0),selectedColor=Number(color.value||0);
  const match=combinations.find(function(row){return Number(row.size_id)===selectedSize&&(!hasColors||Number(row.color_id||0)===selectedColor)});
  const stock=match?Number(match.stock_qty||0):0;
  qty.max=Math.max(1,stock);if(Number(qty.value)>stock&&stock>0)qty.value=stock;
  const valid=selectedSize>0&&(!hasColors||selectedColor>0)&&stock>0;
  button.disabled=!valid;
  message.textContent=stock>0?stock+' available':(selectedSize?'Out of stock or no matching option':'Select a size to check stock.');
 }
 size.addEventListener('change',sync);color.addEventListener('change',sync);qty.addEventListener('change',sync);sync();
})();
</script>
@endsection
