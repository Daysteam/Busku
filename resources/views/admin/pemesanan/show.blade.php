@extends('layout.dashboard')

@section('title', 'BusKu | Detail Pemesanan')

@section('content')

<div class="d-flex justify-content-between align-items-center my-4">

    <div>
        <h4 class="fw-bold mb-0">
            Detail Pemesanan
        </h4>

        <small class="text-muted">
            Informasi lengkap pemesanan tiket
        </small>
    </div>

    <a href="{{ route('pemesanan.index') }}"
        class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>

<div class="row g-3">

    <div class="col-lg-8">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <div>

                        <small class="text-muted">
                            Kode Pemesanan
                        </small>

                        <h5 class="fw-bold mb-0">
                            {{ $pemesanan->kode_pemesanan }}
                        </h5>

                    </div>

                    <div class="text-md-end">

                        <small class="text-muted">
                            Status
                        </small>

                        <div>

                            <span class="badge px-3 py-2
                                @switch($pemesanan->status)
                                    @case('pending')
                                        bg-warning text-dark
                                        @break

                                    @case('dibayar')
                                        bg-success
                                        @break

                                    @case('batal')
                                        bg-danger
                                        @break
                                @endswitch">

                                {{ ucfirst($pemesanan->status) }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="card border-0 shadow-sm mt-3">

            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Informasi Pemesan
                </h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <small class="text-muted">
                            Username
                        </small>

                        <div class="fw-semibold">
                            {{ $pemesanan->user->username }}
                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <small class="text-muted">
                            Email
                        </small>

                        <div class="fw-semibold">
                            {{ $pemesanan->user->email }}
                        </div>

                    </div>

                    @foreach ($detailPemesanans as $detailPemesanan)

                        <hr>

                        <div class="row">

                            <div class="col-md-6 mb-3">
    
                                <small class="text-muted">
                                    Nama Penumpang
                                </small>
    
                                <div class="fw-semibold">
                                    {{ $detailPemesanan->nama_penumpang }}
                                </div>
    
                            </div>
    
                            <div class="col-md-6 mb-3">
    
                                <small class="text-muted">
                                    Jenis Kelamin
                                </small>
    
                                <div class="fw-semibold">
                                    {{ $detailPemesanan->jenis_kelamin }}
                                </div>
    
                            </div>
    
                            <div class="col-md-6 mb-3">
    
                                <small class="text-muted">
                                    Umur
                                </small>
    
                                <div class="fw-semibold">
                                    {{ $detailPemesanan->umur }}
                                </div>
    
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

        <div class="card border-0 shadow-sm mt-3">

            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Informasi Perjalanan
                </h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <small class="text-muted">
                            Bus
                        </small>

                        <div class="fw-semibold">
                            {{ $pemesanan->rute->bus->nama_bus }}
                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <small class="text-muted">
                            Rute
                        </small>

                        <div class="fw-semibold">
                            {{ $pemesanan->rute->kota_asal }}
                            →
                            {{ $pemesanan->rute->kota_tujuan }}
                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <small class="text-muted">
                            Tanggal Berangkat
                        </small>

                        <div class="fw-semibold">
                            {{ \Carbon\Carbon::parse($pemesanan->rute->tanggal_berangkat)->format('d/m/Y') }}
                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <small class="text-muted">
                            Jumlah Tiket
                        </small>

                        <div class="fw-semibold">
                            {{ $pemesanan->jumlah_tiket }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Ringkasan Pembayaran
                </h5>
            </div>

            <div class="card-body text-center">

                <small class="text-muted">
                    Total Pembayaran
                </small>

                <h3 class="fw-bold text-success my-2">

                    Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}

                </h3>

                <small class="text-muted">

                    Dibuat pada
                    {{ $pemesanan->created_at->format('d M Y H:i') }}

                </small>

            </div>

        </div>

        <div class="card border-0 shadow-sm mt-3">

            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Aksi
                </h5>
            </div>

            <div class="card-body d-grid gap-2">

                @if($pemesanan->status == 'pending')

                    <form action="{{ route('pemesanan.confirm', $pemesanan) }}" method="POST">
                        @csrf

                        <button
                            type="button"
                            onclick="confirmPayment(this)"
                            class="btn btn-success w-100">

                            <i class="bi bi-check-circle me-1"></i>
                            Konfirmasi Pembayaran

                        </button>

                    </form>

                    <form action="{{ route('pemesanan.cancelled', $pemesanan) }}" method="POST">
                        @csrf

                        <button
                            type="button"
                            onclick="confirmCancelled(this)"
                            class="btn btn-warning w-100">

                            <i class="bi bi-x-circle me-1"></i>
                            Batalkan Transaksi

                        </button>

                    </form>

                @endif

                <button
                    onclick="window.print()"
                    class="btn btn-secondary">

                    <i class="bi bi-printer me-1"></i>
                    Print

                </button>

                <form action="{{ route('pemesanan.destroy', $pemesanan) }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        type="button"
                        onclick="confirmDelete(this)"
                        class="btn btn-danger w-100">

                        <i class="bi bi-trash me-1"></i>
                        Hapus Data

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection