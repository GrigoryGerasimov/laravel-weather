@extends('weather.layouts.index')

@section('content')
    <x-ip :$weatherIpLookup/>
@endsection