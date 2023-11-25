@extends('seller.layouts.main')

@section('container')
<li><a href="/seller/dashboard/categories">Back to All Categories</a></li>
<li><a href="/seller/dashboard/categories/create">Create New Categories</a></li>
@if (session()->has("success"))
    <p>{{ session("success") }}</p>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">slug</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <a href="/seller/dashboard/categories/{{ $category->slug }}/edit">Edit</a>|
                <form action="/seller/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @csrf
                  @method("delete")
                  <button type="submit" class="btn-link btn p-0 m-0" onclick="return confirm('are you sure?')">Delete</button>
                </form>  
              </td>  
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection