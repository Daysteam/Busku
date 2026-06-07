@extends('layout.dashboard')

@section('title', 'BusKu | Dashboard Admin')

@section('content')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 mt-2">
    <div>
        <h3 class="fw-bold mb-0">Dashboard</h3>
        <small class="text-muted">
            Kelola data bus, rute, pengguna, dan pemesanan tiket.
        </small>
    </div>

    <div class="mt-3 mt-md-0">
        <span class="badge bg-primary px-3 py-2">
            {{ now()->format('d F Y') }}
        </span>
    </div>
</div>

<div class="row g-3 mb-4">

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card stats-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle green rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-bus-front-fill fs-3 text-success"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">2,000</h5>
                    <small class="text-muted">Jumlah Bus</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card stats-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle purple rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-ticket fs-3" style="color:#c340f7;"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">15,430</h5>
                    <small class="text-muted">Tiket Terjual</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card stats-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle red rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-fill fs-3 text-danger"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">8,542</h5>
                    <small class="text-muted">Jumlah User</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card stats-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle blue rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-map fs-3 text-primary"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">350</h5>
                    <small class="text-muted">Jumlah Rute</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card stats-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle orange rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-people-fill fs-3" style="color:#ff6b6b;"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">25,120</h5>
                    <small class="text-muted">Penumpang</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card stats-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle rounded-circle d-flex justify-content-center align-items-center bg-light">
                    <i class="bi bi-cash-stack fs-3 text-warning"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">Rp 15.500.000</h5>
                    <small class="text-muted">Pendapatan</small>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-white border-0">
        <h5 class="fw-semibold mb-0">Ringkasan Hari Ini</h5>
    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100">
                    <h6 class="fw-semibold mb-1">Pemesanan Baru</h6>
                    <h3 class="fw-bold text-primary mb-0">25</h3>
                    <small class="text-muted">Hari ini</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100">
                    <h6 class="fw-semibold mb-1">Menunggu Pembayaran</h6>
                    <h3 class="fw-bold text-warning mb-0">12</h3>
                    <small class="text-muted">Perlu diproses</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100">
                    <h6 class="fw-semibold mb-1">Pendapatan Hari Ini</h6>
                    <h3 class="fw-bold text-success mb-0">Rp 2.500.000</h3>
                    <small class="text-muted">Transaksi berhasil</small>
                </div>
            </div>

        </div>

    </div>

</div>

<div class="row g-3">

    <div class="col-lg-7">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">Tiket Terbaru</h5>

                <a href="#" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-custom table-hover mb-0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Tanggal</th>
                                <th>Tujuan</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Budi Santoso</td>
                                <td>31 Mei 2026</td>
                                <td>Jakarta</td>
                                <td>
                                    <span class="badge bg-success">Dibayar</span>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Siti Aminah</td>
                                <td>30 Mei 2026</td>
                                <td>Bandung</td>
                                <td>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Andi Saputra</td>
                                <td>29 Mei 2026</td>
                                <td>Yogyakarta</td>
                                <td>
                                    <span class="badge bg-danger">Batal</span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-5">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">Bus Terbaru</h5>

                <a href="#" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-custom table-hover mb-0">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bus</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Bus Nusantara</td>
                                <td>45 Kursi</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Bus Harapan Jaya</td>
                                <td>50 Kursi</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Bus Sinar Jaya</td>
                                <td>40 Kursi</td>
                                <td>
                                    <span class="badge bg-secondary">Maintenance</span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


@endsection
