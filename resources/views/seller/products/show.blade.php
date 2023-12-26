@extends('layouts.main')

@section("container")
<section class="container-mx-7-rem py-4">
    <a href="/seller/dashboard/products" class="taartely-paragraph text-decoration-none"><i class="bi bi-arrow-left-short" style="font-size: 18px;"></i>Kembali</a>
    <h1 class="text-center mb-4 taartely-color-2 fw-bold">Detail Produk</h1>
    <div class="px-5">
    <table class="mb-4">
        <td>
        <table>
            <tr>
            <td class="fw-bold taartely-paragraph mb-2" style="width: 100px">Id</td>
            <td class="fw-bold taartely-paragraph mt-5 mb-0" style="width: 10px">:</td>
            <td class="taartely-paragraph px-4 py-1">{{ $product->id }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph">Nama</td>
            <td class="fw-bold taartely-paragraph">:</td>
            <td class="taartely-paragraph px-4 py-1">{{ $product->name }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph">Category</td>
            <td class="fw-bold taartely-paragraph">:</td>
            <td class="taartely-paragraph px-4 py-1">{{ $product->category->name }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph">Slogan</td>
            <td class="fw-bold taartely-paragraph">:</td>
            <td class="taartely-paragraph px-4 py-1">{{ $product->excerpt }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph">Deskripsi</td>
            <td class="fw-bold taartely-paragraph">:</td>
            <td class="taartely-paragraph px-4 py-1">{!! $product->description !!}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph">Harga</td>
            <td class="fw-bold taartely-paragraph">:</td>
            <td class="taartely-paragraph px-4 py-1">{{ $product->price }}</td>
            </tr>
            <tr>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">Dibuat</td>
            <td class="fw-bold taartely-paragraph mt-5 mb-0">:</td>
            <td class="taartely-paragraph px-4 py-1">{{ $product->created_at->diffForHumans() }}</td>
            </tr>
        </table>
        </td>
        <td>
            <td><img src="{{ asset("storage/".$product->image) }}" style="heigt:250px; width: 300px" alt=""></td>
        </td>
    </table>
    </div>
</section>
@endsection