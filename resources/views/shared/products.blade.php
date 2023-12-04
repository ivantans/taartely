@extends("layouts.main")

@section('container')
@if(session()->has("success"))
<p>{{ session("success") }}</p>
@endif

<div class="row row-cols-1 row-cols-md-3 g-4 mt-2 mb-4">
    @foreach ($products as $product)
    <a class="text-decoration-none d-flex" href="/products/{{ $product->slug }}">
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset("/storage/".$product->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->excerpt }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <small class="align-self-center text-body-secondary">{{ $product->created_at->diffForHumans() }}</small>
                        <button class="btn btn-primary btn-sm">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach

</div>
{{ $products->links() }}
@endsection