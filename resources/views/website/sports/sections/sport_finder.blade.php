<div class="switch" id="switch"><div class="row">
 <span class="lab">◆ Find your sport</span>
 @foreach($page['sports'] as $slug => $item)
  <a class="{{ $slug === $page['slug'] ? 'active' : '' }}" href="{{ route('sports.show', ['sport' => $slug]) }}">{{ $item['name'] }}</a>
 @endforeach
</div></div>
