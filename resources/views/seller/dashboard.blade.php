@extends('layouts.main')

@section('container')
<div class="row container-mx-7-rem justify-content-between pt-2 pb-2">
    <div class="col-md-8 p-3">
        <div class="col text-decoration-none d-flex pb-1">
            <div class="bg-section rounded h-100 px-5">
                <div class="row container-mx-2-rem">
                    <div class="col col-md-8">
                        <h2 class="taartely-color-2 fw-bold pt-4">Hi, Taartely!</h2>
                        <p class="taartely-paragraph pb-5">Ayo pantau terus progres usahamu. Jangan lupa perbarui dan tambah produk jika kamu memiliki produk baru</p>
                        <div class="pb-4 pt-4">
                            <a class="btn mt-1 taartely-button px-5" href="/seller/dashboard/products">Lihat produk</a>
                        </div>
                    </div>
                    <div class="col col-md-4 mt-auto">
                        <div class="pb-4">
                            <img src="{{ asset("/storage/taartely-assets/KUE.png") }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-decoration-none d-flex pb-1">
            <div class="row container-mx-6-rem justify-content-between pt-2">
                <div class="col col-md-6 p-3 text-decoration-none d-flex">
                    <div class="bg-section rounded h-100 px-5 pt-3">
                        <img src="{{ asset("/storage/taartely-assets/tepung.png") }}" class="card-img-top" alt="...">
                        <div class="pt-3 pb-4 text-center">
                            <a class="btn mt-1 taartely-button" href="/seller/dashboard/products/create">Tambah produk</a>
                        </div>
                    </div>
                </div> 
                <div class="col text-decoration-none d-flex col-md-6 p-3">
                    <div class="bg-section rounded h-100 px-5 pt-3">
                        <img src="{{ asset("/storage/taartely-assets/butter.png") }}" class="card-img-top" alt="...">
                        <div class="pt-3 pb-4 text-center">
                            <a class="btn mt-1 taartely-button" href="/seller/dashboard/categories/create">Tambah Kategori</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    
    <div class="col-md-4 p-3">
        <div class="col d-flex pb-3 ">
            <div class="bg-section h-100 px-3 py-3 rounded">
                <div class="pb-2">
                    <div class="row container-mx-2-rem bg-section1 m-1 rounded pt-3 pb-3">
                        <div class="col col-md-3 d-flex align-items-center">
                            <div>
                                <img src="{{ asset("/storage/taartely-assets/selesai.png") }}" class="card-img-top bayang rounded" alt="...">
                            </div>
                        </div>
                        <div class="col col-md-9">
                            <h5 class="taartely-paragraph">Pesanan Selesai</h5>
                            <h5 class="fw-bold taartely-paragraph">{{ $total_completed }}</h5>    
                        </div>
                    </div>  
                </div>
                <div class="pb-2">
                    <div class="row container-mx-2-rem bg-section1 m-1 rounded pt-3 pb-3">
                        <div class="col col-md-3 d-flex align-items-center">
                            <div>
                                <img src="{{ asset("/storage/taartely-assets/proses.png") }}" class="card-img-top bayang rounded" alt="...">
                            </div>
                        </div>
                        <div class="col col-md-9">
                            <h5 class="taartely-paragraph">Perlu Dibuat</h5>
                            <h5 class="fw-bold taartely-paragraph">{{ $total_process }}</h5>    
                        </div>
                    </div>  
                </div>
                <div class="pb-2">
                    <div class="row container-mx-2-rem bg-section1 m-1 rounded pt-3 pb-3">
                        <div class="col col-md-3 d-flex align-items-center">
                            <div>
                                <img src="{{ asset("/storage/taartely-assets/menunggu.png") }}" class="card-img-top bayang rounded" alt="...">
                            </div>
                        </div>
                        <div class="col col-md-9">
                            <h5 class="taartely-paragraph">Menunggu Persetujuan</h5>
                            <h5 class="fw-bold taartely-paragraph">{{ $total_pending }}</h5>    
                        </div>
                    </div>  
                </div>
                <div class="pb-4">
                    <div class="row container-mx-2-rem bg-section1 m-1 rounded pt-3 pb-3">
                        <div class="col col-md-3 d-flex align-items-center">
                            <div>
                                <img src="{{ asset("/storage/taartely-assets/tolak.png") }}" class="card-img-top bayang rounded" alt="...">
                            </div>
                        </div>
                        <div class="col col-md-9">
                            <h5 class="taartely-paragraph">Ditolak</h5>
                            <h5 class="fw-bold taartely-paragraph">{{ $total_cancelled }}</h5>    
                        </div>
                    </div>  
                </div> 
                <div class="pt-4 pb-4 text-center">
                    <a class="btn mt-1 taartely-button px-5" href="/seller/orders">Lihat Pesanan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection