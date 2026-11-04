<div class="switch" id="switch"><div class="row">
<span class="lab">◆ Find your sport</span>
@foreach(config('sports') as $slug => $item)
<a class="{{ $slug === 'volleyball' ? 'active' : '' }}" href="{{ $slug === 'volleyball' ? route('sports.volleyball') : route('sports.show', ['sport' => $slug]) }}">{{ $item['name'] }}</a>
@endforeach
</div></div>
