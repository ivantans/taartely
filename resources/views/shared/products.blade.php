@extends("layouts.main")

@section('container')
@if(session()->has("success"))
    <p>{{ session("success") }}</p>
@endif
@foreach ($products as $product)
    
<div class="card" style="width: 18rem;">
    <img src="{{ asset("storage/".$product->image) }}" class="card-img-top" alt="">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->excerpt }}</p>
        <p class="card-text">Harga: Rp{{ $product->price }}</p>
        <a href="/products/{{ $product->slug }}" class="btn btn-primary">See More...</a>
    </div>
</div>

@endforeach
{{ $products->links() }}
@endsection