<a class="ec-shop-cart-link" href="{{ route('shop.cart') }}" aria-label="View cart" title="Cart">
 <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.5 12.8a2 2 0 0 0 2 1.6h9.6a2 2 0 0 0 2-1.6L23 6H6"/></svg>
 <span class="ec-shop-mobile-label">Cart</span>
</a>
@if(session()->has('encore_user_token'))
 @php
  $shopAccount = session('encore_user', []);
  $shopName = trim((string) (data_get($shopAccount, 'f_name') ?: data_get($shopAccount, 'first_name') ?: data_get($shopAccount, 'name') ?: ''));
  $shopEmail = (string) data_get($shopAccount, 'email', '');
  $shopInitial = mb_strtoupper(mb_substr($shopName !== '' ? $shopName : 'U', 0, 1));
 @endphp
 <details class="ec-shop-account" id="ecShopAccount">
  <summary class="ec-shop-account-trigger" aria-label="Account menu" title="My account"><span class="ec-shop-avatar">{{ $shopInitial }}</span></summary>
  <div class="ec-shop-account-dropdown">
   <div class="ec-shop-account-head"><span class="ec-shop-account-label">{{ $shopName !== '' ? $shopName : 'My Account' }}</span>@if($shopEmail !== '')<small>{{ $shopEmail }}</small>@endif</div>
   <a href="{{ route('shop.orders') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="18" height="18" aria-hidden="true"><path d="M4 4h16v16H4z"/><path d="M8 9h8M8 13h8"/></svg>My Orders</a>
   <a href="{{ route('shop.profile') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="18" height="18" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>My Profile</a>
   <form method="POST" action="{{ route('shop.logout') }}">@csrf<button type="submit"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="18" height="18" aria-hidden="true"><path d="M11 4H4v16h7M15 8l4 4-4 4M9 12h10"/></svg>Logout</button></form>
  </div>
 </details>
@endif
