@extends('layouts.main')

@section('container')
    <h1>Table orders {{ auth()->user()->email }}</h1>
@endsection