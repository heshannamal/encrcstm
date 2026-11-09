<aside class="ec-modern-card ec-account-sidebar" aria-label="Account navigation">
 <a href="{{ route('shop.profile') }}" class="{{ request()->routeIs('shop.profile') && request('tab') !== 'settings' ? 'active' : '' }}"><span class="ec-sidebar-icon">♙</span>Profile</a>
 <a href="{{ route('shop.orders') }}" class="{{ request()->routeIs('shop.orders','shop.order') ? 'active' : '' }}"><span class="ec-sidebar-icon">▣</span>Orders</a>
 <a href="{{ route('shop.profile', ['tab'=>'settings']) }}" class="{{ request()->routeIs('shop.profile') && request('tab') === 'settings' ? 'active' : '' }}"><span class="ec-sidebar-icon">⚙</span>Account Settings</a>
 <form method="POST" action="{{ route('shop.logout') }}">@csrf<button type="submit"><span class="ec-sidebar-icon">↪</span>Logout</button></form>
</aside>
