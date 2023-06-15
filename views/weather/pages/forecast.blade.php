@extends('weather.layouts.index')

@section('content')
    <x-forecast :$weatherForecast/>
@endsection