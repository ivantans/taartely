@extends("layouts.main")

@section('container')
<a href="/seller/dashboard">Back to Dashboard</a>
<h1>Edit categories</h1>
<form action="/seller/dashboard/categories/{{ $category->slug }}" method="post" enctype="multipart/form-data">
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



{{-- DON'T TOUCH --}}
  <script>
    // Slug
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/seller/dashboard/categories/s/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })

  </script>
@endsection