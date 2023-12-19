@extends('layouts.main')

@section("container")
<section class="container-mx-12-rem py-5 text-center">
    <a class="text-center pt-3" href="/seller/dashboard/products"><button class="btn taartely-button taartely-shadow rounded">Kembali ke Semua Products</button></a>
</section>
<section class="container-mx-7-rem py-1 px-5 pb-5">
    <table>
        <td>
        <table>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">id</td>
            <td class="taartely-paragraph px-4">: {{ $product->id }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">nama</td>
            <td class="taartely-paragraph px-4">: {{ $product->name }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">category</td>
            <td class="taartely-paragraph px-4">: {{ $product->category->name }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">pembuat</td>
            <td class="taartely-paragraph px-4">: {{ $product->user->name }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">slug</td>
            <td class="taartely-paragraph px-4">: {{ $product->slug }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">slogan</td>
            <td class="taartely-paragraph px-4">: {{ $product->excerpt }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">deskripsi</td>
            <td class="taartely-paragraph px-4">: {!! $product->description !!}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">harga</td>
            <td class="taartely-paragraph px-4">: {{ $product->price }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">dibuat</td>
            <td class="taartely-paragraph px-4">: {{ $product->created_at->diffForHumans() }}</td>
            </tr>
        </table>
        </td>
        <td>
            <td><img src="{{ asset("storage/".$product->image) }}" style="heigt:250px; width: 250px" alt=""></td>
        </td>
    </table>
    {{-- <p>id: {{ $product->id }}</p>
    <p>nama: {{ $product->name }}</p>
    <p>category: {{ $product->category->name }}</p>
    <p>pembuat: {{ $product->user->name }}</p>
    <p>slug: {{ $product->slug }}</p>
    <p>slogan: {{ $product->excerpt }}</p>
    <p>deskripsi: {!! $product->description !!}</p>
    <img src="{{ asset("storage/".$product->image) }}" style="heigt:250px; width: 250px" alt="">
    <p>harga: {{ $product->price }}</p>
    <p>dibuat: {{ $product->created_at->diffForHumans() }}</p> --}}
</section>
@endsection