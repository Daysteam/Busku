@extends('layout.dashboard')

@section('title', 'BusKu | Customer Qr')

@section('content')

        <a href="{{ route('search-bus.index') }}" class="btn btn-outline-secondary my-3">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-center align-items-cet">

                    @php
                        $qrPath = str_starts_with($pemesanan->qr_code, 'qr/')
                            ? asset('storage/' . $pemesanan->qr_code)
                            : asset('storage/qr/' . $pemesanan->qr_code . '.svg');
                    @endphp
                    <img src="{{ $qrPath }}" width="200px" height="200px">

                </div>

                <hr class="hr-dashed">


                <div class="d-flex justify-content-center align-items-center mb-2">

                    <i class="bi bi-bus-front-fill fs-3"></i>

                </div>

                <h4 class="text-center fw-bold mb-4">Tiket Bus ({{ $pemesanan->rute->bus->nama_bus }})</h4>

                <div class="row">

                    <div class="col-6">

                        <div class="mb-3">
                            <h5 class="mb-0">Tanggal:</h5>

                            <small
                                class="text-muted">{{ \Carbon\Carbon::parse($pemesanan->rute->tanggal_berangkat)->format('d/m/Y') }}</small>

                        </div>

                        <div class="mb-3">
                            <h5 class="mb-0">Jam Berangkat:</h5>

                            <small
                                class="text-muted">{{ \Carbon\Carbon::parse($pemesanan->rute->jam_berangkat)->format('H:i') }}</small>

                        </div>

                    </div>

                    <div class="col-6">

                        <div class="mb-3">
                            <h5 class="mb-0">Tipe Bus:</h5>

                            <small class="text-muted">{{ $pemesanan->rute->bus->tipe_bus }}</small>

                        </div>

                        <div class="mb-3">
                            <h5 class="mb-0">Jumlah Tiket:</h5>

                            <small class="text-muted">{{ $pemesanan->jumlah_tiket }}</small>

                        </div>

                    </div>

                </div>

            </div>

        </div>


@endsection
