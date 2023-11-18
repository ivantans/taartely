@extends('layouts.main')

@section('container')
    <h1>Home</h1>
    <form action="/logout" method="post">
    @csrf
    <button type="submit">logout</button>
    </form>
@endsection

