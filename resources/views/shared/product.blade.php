@extends("layouts.main")

@section('container')
    <img src="{{ asset("storage/".$product->image) }}" alt="">
    <p>{{ $product->name }}</p>
    <p>{!! $product->description !!}</p>

    <form action="/carts" method="post">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <label for="amount" class="form-label">Amount:</label>
            <input type="number" class="form-control @error("amount") is-invalid @enderror" id="amount" name="amount" value="{{ old("amount") }}">
            @error("amount")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>
@endsection