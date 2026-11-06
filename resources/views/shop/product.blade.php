@extends('shop.layout')
@section('shop-title', $product['name'] ?? 'Product')
@section('shop-content')
<div class="ec-flex" style="margin-bottom:26px"><a href="{{ route('shop.catalog') }}" style="color:var(--ec-navy)">Catalog</a><span>/</span><span>{{ $product['name'] }}</span></div>
<div class="ec-product">
 <div class="ec-gallery">
  <div class="ec-thumbs">@foreach($product['images'] ?? [] as $img)<button type="button" onclick="document.getElementById('ecMainImage').src=this.dataset.image" data-image="{{ $img }}" aria-label="View product photo {{ $loop->iteration }}"><img src="{{ $img }}" alt="Product image {{ $loop->iteration }}"></button>@endforeach</div>
  <div>@if(!empty($product['images'][0]))<img class="ec-gallery-main" id="ecMainImage" src="{{ $product['images'][0] }}" alt="{{ $product['name'] }}">@else<div class="ec-gallery-main"></div>@endif</div>
 </div>
 <section class="ec-panel ec-details">
  <span class="ec-pill">Encore Custom</span>
  <h1>{{ $product['name'] }}</h1>
  <p class="ec-muted">Product # {{ data_get($product,'raw.sub_product_no',data_get($product,'raw.product_details.product_no','')) }}</p>
  <p class="ec-price">{{ $product['price_formatted'] }}</p>
  <form action="{{ route('shop.cart.add') }}" method="POST" id="ecProductForm">
   @csrf
   <input type="hidden" name="product_id" value="{{ $product['id'] }}">
   <div class="ec-field"><label for="ecSize">Size</label><select name="size_id" class="ec-select" id="ecSize" required><option value="">Choose a size</option>@foreach($options['sizes'] as $size)<option value="{{ data_get($size,'id') }}">{{ data_get($size,'size_name',data_get($size,'name','Size')) }}</option>@endforeach</select></div>
   <div class="ec-field"><label for="ecColor">Color</label><select name="color_id" class="ec-select" id="ecColor" {{ count($options['colors']) ? 'required' : '' }}><option value="">@if(count($options['colors']))Select a color @elseNo color selection required @endif</option>@foreach($options['colors'] as $color)<option value="{{ data_get($color,'id') }}">{{ data_get($color,'pantone_code',data_get($color,'color_name',data_get($color,'hex'))) }}</option>@endforeach</select></div>
   <div class="ec-field"><label>Quantity</label><input class="ec-input ec-qty" type="number" name="quantity" id="ecQuantity" value="1" min="1" max="1" required><p class="ec-muted" id="ecStock">Choose size and color to check availability.</p></div>
   <button type="submit" class="ec-btn" id="ecAddButton" disabled>Add to cart</button><a href="{{ route('shop.cart') }}" class="ec-btn light">View cart</a>
  </form>
  @if(!empty($product['description']))<div class="ec-copy" style="border-top:1px solid var(--ec-line);margin-top:26px;padding-top:22px"><h3>Description</h3><p>{{ strip_tags($product['description']) }}</p></div>@endif
  @foreach(['product_features'=>'Features','who_we_made_this_for'=>'Who we made this for'] as $key=>$label)
   @if(filled(data_get($product,'raw.'.$key,data_get($product,'raw.product_details.'.$key))))<div class="ec-copy"><h3>{{ $label }}</h3><p>{{ strip_tags(data_get($product,'raw.'.$key,data_get($product,'raw.product_details.'.$key))) }}</p></div>@endif
  @endforeach
 </section>
</div>
<script>
(function(){
 const combinations=@json($options['combinations']);
 const size=document.getElementById('ecSize'),color=document.getElementById('ecColor'),qty=document.getElementById('ecQuantity'),btn=document.getElementById('ecAddButton'),status=document.getElementById('ecStock');
 const hasColors=@json(count($options['colors'])>0);
 function update(){
  const s=Number(size.value||0),c=Number(color.value||0);
  const row=combinations.find(i=>Number(i.size_id)===s&&(!hasColors||Number(i.color_id||0)===c));
  const stock=row?Number(row.stock_qty||0):0;
  qty.max=Math.max(1,stock);if(Number(qty.value)>stock&&stock>0)qty.value=stock;
  btn.disabled=!(s>0&&(!hasColors||c>0)&&stock>0);
  status.textContent=stock>0?stock+' available':'Out of stock or choose an option';
 }
 size.addEventListener('change',update);color.addEventListener('change',update);update();
})();
</script>
@endsection
