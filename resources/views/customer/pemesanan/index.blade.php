@extends('layout.dashboard')

@section('title', 'BusKu | Customer Pemesanan')

@section('content')

    <div class="mt-4 mb-3">

        <h4 class="text-bold mb-0>Daftar Pemesanan Tiket Saya</h4>
                
                <p class="text-muted">
            Tempat
            untuk melihat tiket yang telah dipesan</p>

    </div>

    @forelse ($pemesanans as $pemesanan)
        <div class="card border-0 shadow-sm mb-3 hover-card">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-md-2 text-center">

                        <img src="{{ $pemesanan->rute->bus->image ? asset('storage/' . $pemesanan->rute->bus->image) : 'https://placehold.co/600x400?text=Bus' }}"
                            class="rounded" style="width: 100px; height: 100px; object-fit: cover;">

                    </div>

                    <div class="col-md-6">

                        <h5 class="fw-bold mb-1">
                            {{ $pemesanan->rute->bus->nama_bus }} ({{ $pemesanan->rute->bus->tipe_bus }})
                        </h5>

                        <p class="text-muted mb-2">
                            <i class="bi bi-geo-alt-fill"></i>
                            {{ $pemesanan->rute->kota_asal }}
                            <i class="bi bi-arrow-right mx-2"></i>
                            {{ $pemesanan->rute->kota_tujuan }}
                        </p>

                        <div class="d-flex gap-4">

                            <small class="text-muted">
                                <i class="bi bi-calendar-event"></i>
                                {{ \Carbon\Carbon::parse($pemesanan->rute->tanggal_berangkat)->format('d M Y') }}
                            </small>

                            <small class="text-muted">
                                <i class="bi bi-clock"></i>
                                {{ $pemesanan->rute->jam_berangkat }}
                            </small>

                            <small class="text-muted">
                                <i class="bi bi-person-fill"></i>
                                Jumlah Tiket {{ $pemesanan->jumlah_tiket }}
                            </small>

                        </div>

                    </div>

                    <div class="col-md-4 text-md-end mt-3 mt-md-0 flex-column">

                        @switch($pemesanan->status)
                            @case('pending')
                                <div class="badge badge-pending">
                                    Pending
                                </div>
                            @break

                            @case('dibayar')
                                <div class="badge badge-paid">
                                    Dibayar
                                </div>
                            @break

                            @case('batal')
                                <div class="badge badge-cancel">
                                    Batal
                                </div>
                            @break

                            @case('selesai')
                                <div class="badge badge-primary">
                                    Selesai
                                </div>
                            @break
                        @endswitch

                        <a href="{{ route('qr-code.show', $pemesanan->id) }}" class="btn btn-warning">

                            <i class="bi bi-qr-code fs-3"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>



        @empty
            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <i class="bi bi-inbox fs-3 d-block mb-2 text-center"></i>

                    <p class="text-center text-muted">Tidak ada tiket yang dibeli</p>

                </div>

            </div>
        @endforelse

        </div>

@endsection
