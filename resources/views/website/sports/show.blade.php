@extends('website.layouts.app')

@section('title', $sport['name'].' | Encore Custom')
@section('description', 'Shop custom '.$sport['name'].' uniforms, teamwear and gear from Encore Custom.')
@section('canonical', route('sports.show', ['sport' => $sport['slug']]))

@section('page-styles')
@include('website.styles.volleyball')
@include('website.styles.sports')
@endsection

@section('content')
<div class="grain"></div>
@include('website.sports.components.navigation')
@include('website.sports.components.slides')
@include('website.sports.components.kit')
@include('website.sports.components.catalog')
@include('website.sports.components.footer')
@endsection

@push('scripts')
<script>
@include('website.scripts.sports')
</script>
@endpush
