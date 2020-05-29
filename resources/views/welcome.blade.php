@extends('layouts.master')

@section('header')

@include('assets.header')
@endsection
@section('content')
<div class="cover-hp"></div>
<div class="container xl-mt-5">
    <typed />
</div>
<!-- content -->
<div class="container-fluid world-news">
    <world />
    <div class="container">
        <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">@include('assets.sidebar')</div>
        </div>
    </div>
    @endsection
    @section('footer')
    @include('assets.footer')

    @endsection
