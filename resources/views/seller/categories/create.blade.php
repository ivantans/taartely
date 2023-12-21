@extends("layouts.main")

@section('container')
<a href="/seller/dashboard">Back to Dashboard</a>
<h1>Create New Product</h1>

{{-- ! Store new Categories * Destination URL: seller/dashboard/categories * Source URL: /seller/dashboard/categories/create --}}
<form action="{{ route("categories.store") }}" method="post" enctype="multipart/form-data">
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
    <button type="submit" class="btn btn-primary">Create New Categories</button>
</form>

<script src="/js/slug.js"></script>
<script src="/js/imagePreview.js"></script>
@endsection