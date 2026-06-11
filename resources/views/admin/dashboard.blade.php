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

        <div class="card static-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle green rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-bus-front-fill fs-3 text-success"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">{{ $totalBus }}</h5>
                    <small class="text-muted">Jumlah Bus</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card static-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle purple rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-ticket fs-3" style="color:#c340f7;"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">{{ $totalTiket }}</h5>
                    <small class="text-muted">Tiket Terjual</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card static-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle red rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-fill fs-3 text-danger"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">{{ $totalUser }}</h5>
                    <small class="text-muted">Jumlah User</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card static-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle blue rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-map fs-3 text-primary"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">{{ $totalRute }}</h5>
                    <small class="text-muted">Jumlah Rute</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card static-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle orange rounded-circle d-flex justify-content-center align-items-center">
                    <i class="bi bi-people-fill fs-3" style="color:#ff6b6b;"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">{{ $totalPenumpang }}</h5>
                    <small class="text-muted">Penumpang</small>
                </div>

            </div>

        </div>

    </div>

    <div class="col-12 col-md-6 col-lg-4">

        <div class="card static-card border-0 shadow-sm">

            <div class="card-body d-flex align-items-center">

                <div class="circle rounded-circle d-flex justify-content-center align-items-center bg-light">
                    <i class="bi bi-cash-stack fs-3 text-warning"></i>
                </div>

                <div class="ms-3">
                    <h5 class="fw-bold mb-0">Rp {{ number_format($totalPendapatan,'0',',','.') }}</h5>
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
                <div class="border rounded-3 p-3 h-100 static-card">
                    <h6 class="fw-semibold mb-1">Pemesanan Baru</h6>
                    <h3 class="fw-bold text-primary mb-0">{{ $totalTiketHariIni }}</h3>
                    <small class="text-muted">Hari ini</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100 static-card">
                    <h6 class="fw-semibold mb-1">Menunggu Pembayaran</h6>
                    <h3 class="fw-bold text-warning mb-0">{{ $totalTiketDibayarHariIni }}</h3>
                    <small class="text-muted">Perlu diproses</small>
                </div>
            </div>

            <div class="col-md-4">
                <div class="border rounded-3 p-3 h-100 static-card">
                    <h6 class="fw-semibold mb-1">Pendapatan Hari Ini</h6>
                    <h3 class="fw-bold text-success mb-0">Rp {{ number_format($totalPendapatanHariIni,'0',',','.') }}</h3>
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

                <a href="{{ route('pemesanan.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-custom table-hover mb-0 text-center">

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

                            @forelse ($detailPemesanans as $index => $detailPemesanan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $detailPemesanan->nama_penumpang }}</td>
                                    <td>{{ \Carbon\Carbon::parse($detailPemesanan->pemesanan->rute->tanggal_berangkat)->format('d/m/Y') }}</td>
                                    <td>{{ $detailPemesanan->pemesanan->rute->kota_tujuan }}</td>
                                    <td>
                                            @switch($detailPemesanan->pemesanan->status)
                                                @case('pending')
                                                    <span class="badge badge-pending">
                                                        Pending
                                                    </span>
                                                @break

                                                @case('dibayar')
                                                    <span class="badge badge-paid">
                                                        Dibayar
                                                    </span>
                                                @break

                                                @case('batal')
                                                    <span class="badge badge-cancel">
                                                        Batal
                                                    </span>
                                                @break

                                                @case('selesai')
                                                    <div class="badge badge-primary">
                                                        Selesai
                                                    </div>
                                                @break
                                            @endswitch
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada data</td>
                                </tr>
                            @endforelse

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

                <a href="{{ route('bus.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-custom table-hover mb-0 text-center">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bus</th>
                                <th>Kode Bus</th>
                                <th>Kapasitas</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($buses as $index => $bus)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $bus->nama_bus }}</td>
                                    <td>{{ $bus->kode_bus }}</td>
                                    <td>{{ $bus->jumlah_kursi }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Tidak ada data</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


@endsection
