@extends('seller.layouts.main')

@section('container')
    <h1>INI HALAMAN DASHBOARD UNTUK SELLER</h1>
    <li><a href="/seller/dashboard">Dashboard</a></li>
    <li><a href="/seller/dashboard/products">Products (Ke halaman CRUD Product)</a></li>
    <li><a href="/seller/dashboard/categories">Categories (Ke halaman CRUD Category)</a></li>
@endsection