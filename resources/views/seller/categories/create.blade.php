@extends("layouts.main")

@section('container')
<section class="container-mx-7-rem py-4">
    <a href="/seller/dashboard" class="taartely-paragraph text-decoration-none"><i class="bi bi-arrow-left-short" style="font-size: 18px;"></i>Kembali</a>
    <h1 class="text-center mb-3 taartely-color-2 fw-bold">Buat Kategori Baru</h1>
    <div class="text-center py-2">
        <a class="btn mt-1 taartely-button rounded" href="/seller/dashboard/categories">Lihat Daftar Kategori</a>
    </div>
    <div class="px-5">
    {{-- ! Store new Categories * Destination URL: seller/dashboard/categories * Source URL: /seller/dashboard/categories/create --}}
    <form class="pb-3" action="{{ route("categories.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name") }}">
            @error("name")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug:</label>
            <input type="text" class="form-control @error("slug") is-invalid @enderror" id="slug" name="slug" readonly value="{{ old("slug") }}">
            @error("slug")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn taartely-button rounded">Buat Kategori Baru</button>
    </form>
    </div>
</section>
<script src="/js/slug.js"></script>
<script src="/js/imagePreview.js"></script>
@endsection