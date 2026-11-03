@extends('website.layouts.app')

@section('title', config('site.title'))
@section('description', config('site.description'))
@section('canonical', route('home'))

@section('page-styles')
@include('website.styles.home')
@endsection

@section('content')
@include('website.home.sections.intro')
@include('website.home.sections.loader')
@include('website.home.sections.navigation')
@include('website.home.sections.hero')
@include('website.home.sections.process')
@include('website.home.sections.sports')
@include('website.home.sections.design')
@include('website.home.sections.sublimation')
@include('website.home.sections.testimonials')
@include('website.home.sections.club_logos')
@include('website.home.sections.faq')
@include('website.home.sections.footer')
@include('website.home.sections.interactive_overlays')
@endsection

@push('scripts')
<script>
@include('website.scripts.home')
</script>
<script>
@include('website.scripts.navigation')
</script>
@endpush
