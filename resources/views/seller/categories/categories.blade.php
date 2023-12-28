@extends('layouts.main')

@section('container')
@if (session()->has("success"))
<div class="alert alert-success alert-dismissible fade show bottom-0 end-0 position-fixed" style="z-index:999" role="alert">
    <strong>{{ session("success") }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="container-mx-7-rem py-4">
<a href="/seller/dashboard/categories/create" class="taartely-paragraph text-decoration-none"><i class="bi bi-arrow-left-short" style="font-size: 18px;"></i>Kembali</a>
<h1 class="text-center pb-4 taartely-color-2 fw-bold">Daftar Kategori Taartely</h1>
<div class="px-5">
<table class="table pb-2">
    <thead>
      <tr class="text-center">
        <th scope="col">Id</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Tindakan</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
          <td class="taartely-paragraph text-center">{{ $category->id }}</td>
          <td class="taartely-paragraph">{{ $category->name }}</td>
          <td class="text-center">
              <a href="/seller/dashboard/categories/{{ $category->slug }}/edit"class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>

              {{-- ! Delete Categories * Destination URL: seller/dashboard/categories/{category} * Source URL: /seller/dashboard/categories --}}
              <form action="{{ route("categories.destroy", ["category" => $category->slug]) }}" method="post" class="d-inline">
                @csrf
                @method("delete")
                <button type="submit" class="badge bg-danger bg-info border-0" onclick="return confirm('are you sure?')"><i class="bi bi-trash"></i></button>
              </form>  
              
            </td>  
        </tr>
      @endforeach
    </tbody>
</table>
</div>
</section>
@endsection