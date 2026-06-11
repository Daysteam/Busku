@extends('layout.dashboard')

@section('title', 'BusKu | Admin Manage Tiket')

@section('content')

    <div class="mt-4 mb-3">
        <h4 class="fw-bold mb-0">Manage Tiket</h4>
        <small class="text-muted">
            Digunakan untuk mengubah dan approve tiket
        </small>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('pemesanan.index') }}" method="GET">

                <div class="row g-2">

                    <div class="col-md">
                        <input type="search" name="nama" class="form-control" placeholder="Cari nama user..."
                            value="{{ request('nama') }}">
                    </div>

                    <div class="col-md-auto">
                        <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                    </div>

                    <div class="col-md-auto">
                        <button class="btn btn-primary px-4">
                            <i class="bi bi-search"></i>
                            Cari
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-custom text-center align-middle mb-0">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Rute</th>
                            <th>Jumlah Tiket</th>
                            <th>Total Harga</th>
                            <th>Tanggal Pesan</th>
                            <th>Status</th>
                            <th width="260">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($pemesanans as $index => $pemesanan)
                            <tr>

                                <td>{{ $pemesanans->firstItem() + $index }}</td>

                                <td class="fw-semibold">
                                    {{ $pemesanan->user->username }}
                                </td>

                                <td>
                                    {{ $pemesanan->rute->kota_asal }}
                                    <i class="bi bi-arrow-right mx-1"></i>
                                    {{ $pemesanan->rute->kota_tujuan }}
                                </td>

                                <td>{{ $pemesanan->jumlah_tiket }}</td>

                                <td class="fw-semibold text-success">
                                    Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($pemesanan->created_at)->format('d/m/Y') }}
                                </td>

                                <td>

                                    @switch($pemesanan->status)
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

                                <td>

                                    <div class="d-flex justify-content-center gap-1 flex-nowrap">

                                        <a href="{{ route('pemesanan.show', $pemesanan->id) }}"
                                            class="btn btn-warning btn-sm btn-action">

                                            <i class="bi bi-eye"></i>

                                        </a>

                                        <form action="{{ route('pemesanan.confirm', $pemesanan->id) }}" method="POST">

                                            @csrf

                                            <button class="btn btn-success btn-sm btn-action" type="button"
                                                onclick="confirmPayment(this)">

                                                <i class="bi bi-check-circle"></i>

                                            </button>

                                        </form>

                                        <form action="{{ route('pemesanan.cancelled', $pemesanan->id) }}" method="POST">

                                            @csrf

                                            <button class="btn btn-secondary btn-sm btn-action" type="button"
                                                onclick="confirmCancelled(this)">

                                                <i class="bi bi-x-circle"></i>

                                            </button>

                                        </form>

                                        <form action="{{ route('pemesanan.destroy', $pemesanan->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm btn-action" type="button"
                                                onclick="confirmDelete(this)">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="py-5 text-muted">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Tidak ada data pemesanan
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

        <div class="mt-4">
            {{ $pemesanans->links() }}
        </div>

    @endsection
