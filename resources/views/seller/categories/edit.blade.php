@extends("layouts.main")

@section('container')
<a href="/seller/dashboard">Back to Dashboard</a>
<h1>Edit categories</h1>

{{-- ! Delete Categories * Destination URL: seller/dashboard/categories/{category} * Source URL: seller/dashboard/categories/{category}/edit --}}
<form action="{{ route("categories.update", ["category" => $category->slug]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="mb-3">
        <label for="name" class="form-label">Category Name:</label>
        <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" value="{{ old("name", $category->name) }}">
        @error("name")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug:</label>
        <input type="text" class="form-control @error("slug") is-invalid @enderror" id="slug" name="slug" readonly value="{{ old("slug", $category->slug) }}">
        @error("slug")
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    @if (session()->has("nodata"))
        <p>{{ session("nodata") }}</p>
    @endif
    <button type="submit" class="btn btn-primary">Update New Categories</button>
  </form>
  <script src="/js/slug.js"></script>
  <script src="/js/imagePreview.js"></script>
@endsection