@extends('home.layouts.home')
@section('title', __('About Us'))

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-12 text-break">
        {!! $aboutUs->body ?? '' !!}

        </div>
    </div>
</div>

@endsection
