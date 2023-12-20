@extends('layouts.main')

@section('container')
<section class="container-mx-12-rem py-5">
  <h1 class="taartely-title text-center pb-3">Daftar Kategori Taartely</h1>
  <div class="row justify-content-evenly pt-10">
      <div class="col-lg-3 border rounded text-center h-100 py-4 px-4">
          <p class="fw-bold taartely-paragraph16 mt-2 mb-0">Tambah Kategori</p>
          <p class="taartely-paragraph mb-0 pb-0">Ada Kategori baru?</p>
          <p class="taartely-paragraph mt-0 pt-0">Ayo tambah Kategori anda</p>
          <a href="/seller/dashboard/categories/create"><button class="btn taartely-button rounded">Tambah kategori baru</button></a>
      </div>
      <a class="text-center pt-3" href="/seller/dashboard/categories"><button class="btn taartely-button rounded">Kembali ke Dashboard</button></a>
  </div>
</section>
@if (session()->has("success"))
    <p>{{ session("success") }}</p>
@endif
<section class="container-mx-7-rem py-5">
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
            <td class="taartely-paragraph">{{ $category->id }}</td>
            <td class="taartely-paragraph">{{ $category->name }}</td>
            <td class="taartely-paragraph">{{ $category->slug }}</td>
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
</section>
@endsection