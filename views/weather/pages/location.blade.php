@extends('weather.layouts.index')

@section('content')
    <x-location :$weatherLocation/>
@endsection