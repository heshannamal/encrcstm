@extends('website.layouts.app')

@section('title', $page['seo']['title'])
@section('description', $page['seo']['description'])
@section('canonical', $page['seo']['canonical'])

@section('page-styles')
@include('website.styles.sport')
@include('website.styles.catalog-empty')
@endsection

@section('content')
@include('website.sports.sections.intro')
@include('website.sports.sections.navigation')
@include('website.sports.sections.sport_finder')
@include('website.sports.sections.hero')
@include('website.sports.sections.essentials')
@include('website.sports.sections.kit')
@include('website.sports.sections.libero')
@include('website.sports.sections.fabric')
@include('website.sports.sections.start_options')
@include('website.sports.sections.testimonials')
@include('website.sports.sections.club_logos')
@include('website.sports.sections.footer')
@include('website.sports.sections.kit_modal')
@endsection

@push('scripts')
<script>
@include('website.scripts.sport')
</script>
@endpush
