@extends('weather.layouts.index')

@section('content')
    <x-current :$weatherCurrent/>
@endsection