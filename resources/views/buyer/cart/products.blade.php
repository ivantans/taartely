@extends("layouts.main")

@section("container")
    <h1>My Cart</h1>
    @foreach ($carts as $cart)
        <p>Barang: {{ $cart->product->name }}</p>
        <p>Pembeli: {{ $cart->user->name }}</p>
        <p>Amout: {{ $cart->amount }}</p>
        <p>{{ $cart->product->slug }}</p>
        <form action="/carts/{{ $cart->id }}" method="post" class="d-inline">
            @csrf
            @method("put")
            <div class="mb-3">
                <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                <label for="amount" class="form-label">Amount:</label>
                <input type="number" class="form-control @error("amount") is-invalid @enderror" id="amount" name="amount" value="{{ old("amount", $cart->amount) }}">
                @error("amount")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit card</button>
        </form>
        <form action="/carts/{{ $cart->id }}" method="post" class="d-inline">
            @csrf
            @method("delete")
            <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</button>
        </form>
    @endforeach
@endsection