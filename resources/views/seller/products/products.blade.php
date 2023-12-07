@extends('layouts.main')

@section('container')
<h1>Table Of Content</h1>
<li><a href="/seller/dashboard/products/create">Create New Product</a></li>
<li><a href="/seller/dashboard">Back to dashboard</a></li>
@if (session()->has("success"))
    <p>{{ session("success") }}</p>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">category name</th>
        <th scope="col">pembuat</th>
        <th scope="col">excerpt</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">created_at</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->user->name }}</td>
            <td>{{ $product->excerpt }}</td>
            <td>{!! $product->description !!}</td>
            <td><img src="{{ asset("storage/".$product->image) }}" alt="" style="width: 50px; height 50px;"></td>
            <td>{{ $product->created_at->diffForHumans() }}</td>  
            <td>
              <a href="/seller/dashboard/products/{{ $product->slug }}">Show</a>|
              <a href="/seller/dashboard/products/{{ $product->slug }}/edit">Edit</a>|
              <form action="/seller/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                @csrf
                @method("delete")
                <button type="submit" class="btn-link btn p-0 m-0" onclick="return confirm('are you sure?')">Delete</button>
              </form>  
            </td>  
          </tr>
    @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
@endsection