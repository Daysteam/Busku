@extends('layout.app')

@section('title', 'BusKu | Landing Page')

@section('content')
    <section class="hero d-flex align-items-center">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6 text-white">

                    <h1 class="display-3 fw-bold">
                        Pesan Tiket Bus
                        Lebih Cepat
                    </h1>

                    <p class="lead my-4">
                        Cari jadwal, beli tiket
                        nikmati perjalananmu bersama 
                        kami.
                    </p>

                    <button class="btn btn-primary btn-lg">
                        Pesan Sekarang
                    </button>

                </div>

                <div class="col-lg-6">

                    <div class="search-card p-4 text-white">

                        <h4 class="mb-4">
                            Cari Tiket Bus
                        </h4>

                        <form>

                            <div class="input-group mb-3">

                                <span class="input-group-text">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                </span>

                                <div class="form-floating flex-grow-1">

                                    <select class="form-select">
                                        <option>Jakarta</option>
                                        <option>Bandung</option>
                                        <option>Surabaya</option>
                                    </select>

                                    <label class="text-muted">Dari</label>

                                </div>

                            </div>

                            <div class="input-group mb-3">

                                <span class="input-group-text">
                                    <i class="bi bi-box-arrow-right"></i>
                                </span>

                                <div class="form-floating flex-grow-1">

                                    <select class="form-select">
                                        <option>Malang</option>
                                        <option>Yogyakarta</option>
                                        <option>Semarang</option>
                                    </select>

                                    <label class="text-muted">Ke</label>

                                </div>

                            </div>

                            <div class="input-group mb-4">

                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>

                                <div class="form-floating flex-grow-1">

                                    <input
                                        type="date"
                                        class="form-control"
                                        id="tanggal">

                                    <label class="text-muted">
                                        Tanggal Berangkat
                                    </label>

                                </div>

                            </div>

                            <button
                                class="btn btn-primary w-100 py-3">
                                Cari Bus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="container mt-4">

        <div class="row d-flex justify-content-center g-3">

            <div class="col-md-3">

                <div class="card static-card">
    
                    <div class="card-body text-center">

                        <h5 class="fs-4 fw-bolder m-0">50+</h5>

                        <p class="text-muted m-0">Bus Aktif</p>

                    </div>
    
                </div>

            </div>
            <div class="col-md-3">

                <div class="card static-card">
    
                    <div class="card-body text-center">

                        <h5 class="fs-4 fw-bolder m-0">100+</h5>

                        <p class="text-muted m-0">Rute Aktif</p>

                    </div>
    
                </div>

            </div>

            <div class="col-md-3">

                <div class="card static-card">
    
                    <div class="card-body text-center">

                        <h5 class="fs-4 fw-bolder m-0">10K +</h5>

                        <p class="text-muted m-0">User Aktif</p>

                    </div>
    
                </div>

            </div>

            <div class="col-md-3">

                <div class="card static-card">
    
                    <div class="card-body text-center">

                        <h5 class="fs-4 fw-bolder m-0">20K +</h5>

                        <p class="text-muted m-0">Tiket Terjual</p>

                    </div>
    
                </div>

            </div>

        </div>

    </section>

    <section class="features" id="features">

        <div class="container">

            <div class="text-center mb-4">

                <h4 class="fs-4 fw-bolder">Mengapa Memilih Kami?</h4>
    
                <p class="text-muted">Layanan terbaik untuk perjalanan anda</p>

            </div>

            <div class="row g-3">

                <div class="col-md-4">

                    <div class="card static-card">
        
                        <div class="card-body text-center">

                            <div class="icon-box mx-auto">

                                <i class="bi bi-shield-check fs-1">
                                </i>

                            </div>
                            
                            <h4 class="mb-1">Pembayaran Aman</h4>

                            <p>Semua Transaksi Terlindungi</p>

                        </div>
        
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card static-card">
        
                        <div class="card-body text-center">

                            <div class="icon-box mx-auto">

                                <i class="bi bi-ticket fs-1">
                                </i>

                            </div>
                            
                            <h4 class="mb-1">Cepat dan Praktis</h4>

                            <p>Pemesanan tiket yang praktis dan cepat</p>

                        </div>
        
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card static-card">
        
                        <div class="card-body text-center">

                            <div class="icon-box mx-auto">

                                <i class="bi bi-headset fs-1">
                                </i>

                            </div>
                            
                            <h4 class="mb-1">Support 24 Jam</h4>

                            <p>Tim kami siap membantu kapan saja</p>

                        </div>
        
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="bus" id="bus">

        <div class="container">

            <div class="text-center mb-4">

                <h4 class="fs-4 fw-bolder">Bus Yang Tersedia</h4>
    
                <p class="text-muted">Mulailah perjalananmu dengan bus kami</p>

            </div>

            <div class="row g-3">

                <div class="col-md-4">

                    <div class="card static-card">

                        <img src="{{ asset('images/bus.jpg') }}" alt="" class="card-img-top">
        
                        <div class="card-body">

                            <h4>Sinary Jaya</h4>

                            <p class="text-muted">Jakarta -> Jember</p>

                            <a href="" class="btn btn-primary px-2">Lihat Jadwal</a>

                        </div>
        
                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection