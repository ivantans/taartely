@extends("layouts.main")

@section('container')
<section class="container-mx-12-rem py-4">
    <a href="/seller/dashboard" class="taartely-paragraph text-decoration-none"><i class="bi bi-arrow-left-short" style="font-size: 18px;"></i>Kembali</a>
    <h1 class="text-center mb-3 taartely-color-2 fw-bold">Buat Produk Baru</h1>

{{-- ! Simpan product baru * Destination URL: /seller/dashboard/products * Source URL: /seller/dashboard/products/create --}}
<form action="{{ route("products.store") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Product Name:</label>
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
    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" class="form-control @error("price") is-invalid @enderror" id="price" name="price" value="{{ old("price") }}">
        @error("price")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Category:</label>
        <select class="form-select" name="category_id">
            @foreach ($categories as $category)
                @if ($category->id == old("category_id"))
                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="excerpt" class="form-label">Slogan: </label>
        <input type="text" class="form-control @error("excerpt") is-invalid @enderror" id="excerpt" name="excerpt" value="{{ old("excerpt") }}">
        @error("excerpt")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Product image:</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" onchange="previewImage()">
        @error("image")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description">Description:</label>
        <input id="description" type="hidden" name="description" value="{{ old("description") }}">
        <trix-editor input="description"></trix-editor>          
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn taartely-button ">Buat Produk Baru</button>
</form>

</section>
<script src="/js/slug.js"></script>
<script src="/js/imagePreview.js"></script>
@endsection