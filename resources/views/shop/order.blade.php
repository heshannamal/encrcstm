@extends('shop.layout')

@section('shop-title', 'Order Details')

@section('shop-content')
<section class="ec-shop-banner ec-account-banner">
    <div class="ec-banner-inner">
        <h1>Order <span>Details</span></h1>
        <p>Review your confirmed order and current status.</p>
    </div>
</section>

<div class="ec-account-grid">
    @include('shop.partials.account-sidebar')

    <div class="ec-account-main">
        <section class="ec-modern-card">
            <div class="ec-card-heading">
                <h2>Order #{{ data_get($order, 'id', data_get($order, 'order_id')) }}</h2>
                <a href="{{ route('shop.orders') }}">← All Orders</a>
            </div>

            @foreach (['order_number', 'created_at', 'status', 'payment_status', 'sub_total', 'sales_tax', 'shipping_fee', 'invoice_total', 'amount_to_pay'] as $key)
                @if (data_get($order, $key) !== null)
                    <div class="ec-row">
                        <span>{{ ucwords(str_replace('_', ' ', $key)) }}</span>
                        <strong>{{ data_get($order, $key) }}</strong>
                    </div>
                @endif
            @endforeach

            @php
                $items = collect(data_get($order, 'items', data_get($order, 'order_items', [])));
            @endphp

            @if ($items->isNotEmpty())
                <h3>Ordered items</h3>
                @foreach ($items as $item)
                    <div class="ec-row">
                        <span>{{ data_get($item, 'product_name', data_get($item, 'name', 'Item')) }}</span>
                        <span>Qty: {{ data_get($item, 'quantity', data_get($item, 'qty', 1)) }}</span>
                    </div>
                @endforeach
            @endif
        </section>

        <div class="ec-modern-card">
            <h2>Need Help?</h2>
            <p class="ec-summary-note">Questions about your order or customization? Our team is here to help.</p>
            <a class="ec-outline-action" href="{{ config('site.team_url') }}">Contact Our Team →</a>
        </div>
    </div>
</div>
@endsection
