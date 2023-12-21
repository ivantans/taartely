@extends('layouts.main')

@section('container')
<div class="row container-mx-7-rem justify-content-between pt-3 pb-5">
    <div class="col-md-8 p-3">
        <div class="col text-decoration-none d-flex pb-1">
            <div class="bg-section rounded h-100 px-5">
                {{-- <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="..."> --}}
                <h2 class="taartely-color-2 fw-bold pt-4">Hi, Taartely!</h2>
                <p class="taartely-paragraph">Ayo pantau terus progres usahamu. Jangan lupa perbarui dan tambah produk jika kamu memiliki produk baru</p>
                <div class="pt-5 pb-5">
                    <a class="btn mt-1 taartely-button rounded" href="/seller/dashboard/products">Lihat produk</a>
                </div>
            </div>
        </div>
        <div class="row container-mx-0-rem justify-content-between pt-2">
            <div class="col-md-6 p-3">
                <div class="col text-decoration-none d-flex">
                    <div class="bg-section rounded h-100 px-5 pt-4">
                        <img src="{{ asset("/storage/taartely-assets/KUE.png") }}" class="card-img-top" alt="...">
                        <div class="pt-5 pb-4 text-center">
                            <a class="btn mt-1 taartely-button rounded" href="/seller/dashboard/products/create">Tambah produk</a>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-md-6 p-3">
                <div class="col text-decoration-none d-flex">
                    <div class="bg-section rounded h-100 px-5 pt-4">
                        <img src="{{ asset("/storage/taartely-assets/KUE.png") }}" class="card-img-top" alt="...">
                        <div class="pt-5 pb-4 text-center">
                            <a class="btn mt-1 taartely-button rounded" href="/seller/dashboard/categories/create">Tambah Kategori</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
    
    <div class="col-md-4 p-3">
            <div class="col d-flex pb-3">
                <div class="card border-0 bg-section h-100">
                    {{-- <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body" style="width: 400px;">
                        <p class="taartely-paragraph">Total Pesanan</p>
                        <h5 class="fw-bold taartely-paragraph16 mt-2">{{ $total_completed }}</h5>                        
                    </div>
                </div>
            </div>
            <div class="col d-flex pb-3">
                <div class="card border-0 bg-section h-100">
                    {{-- <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body" style="width: 400px;">
                        <p class="taartely-paragraph">Perlu Dibuat</p>
                        <h5 class="fw-bold taartely-paragraph16 mt-2">{{ $total_process }}
                        </h5>                        
                    </div>
                </div>
            </div>
            <div class="col d-flex pb-3">
                <div class="card border-0 bg-section h-100">
                    {{-- <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body" style="width: 400px;">
                        <p class="taartely-paragraph">Menunggu ACC</p>
                        <h5 class="fw-bold taartely-paragraph16 mt-2">{{ $total_pending }}</h5>                        
                    </div>
                </div>
            </div>
            <div class="col d-flex pb-3">
                <div class="card border-0 bg-section h-100">
                    {{-- <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="..."> --}}
                    <div class="card-body" style="width: 400px;">
                        <p class="taartely-paragraph">Ditolak</p>
                        <h5 class="fw-bold taartely-paragraph16 mt-2">{{ $total_cancelled }}</h5>                        
                    </div>
                </div>
            </div>
            <div class="pt-2 pb-0 text-center">
                <a class="btn mt-1 taartely-button rounded" href="/seller/orders">Lihat Pesanan</a>
            </div>
    </div>
</div>
@endsection