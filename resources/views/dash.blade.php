@extends('layouts.dashMain')

@section('header')
    @include('includes/dashIncludes.header')
    @include('includes/dashIncludes.sidebar')
    @include('includes/dashIncludes.main')
@endsection

@section('footer')
    @include('includes/dashIncludes.footer')
    @include('includes/dashIncludes.footerJs')
@endsection