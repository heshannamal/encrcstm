@extends('website.layouts.app')

@section('title', config('site.volleyball_title'))
@section('description', config('site.volleyball_description'))
@section('canonical', route('sports.volleyball'))

@section('page-styles')
@include('website.styles.volleyball')
@include('website.styles.sports')
@endsection

@section('content')
@include('website.volleyball.sections.intro')
@include('website.volleyball.sections.navigation')
@include('website.volleyball.sections.sport_finder')
@include('website.volleyball.sections.hero')
@include('website.volleyball.sections.essentials')
@include('website.volleyball.sections.kit')
@include('website.volleyball.sections.libero')
@include('website.volleyball.sections.fabric')
@include('website.sports.components.catalog', ['sport' => ['slug' => 'volleyball', 'name' => 'Volleyball'], 'products' => $products ?? [], 'filters' => $filters ?? []])
@include('website.volleyball.sections.start_options')
@include('website.volleyball.sections.testimonials')
@include('website.volleyball.sections.club_logos')
@include('website.volleyball.sections.footer')
@include('website.volleyball.sections.kit_modal')
@endsection

@push('scripts')
<script>
@include('website.scripts.volleyball')
</script>
@endpush
