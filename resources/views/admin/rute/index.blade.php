@extends('layout.dashboard')

@section('title', 'BusKu | Admin Manage Rute')

@section('content')

    <div class="mt-4 mb-3">

        <h4 class="mb-0 fw-bold">Manage Rute</h4>

        <small class="text-muted">Digunakan untuk menambahkan, mengubah atau menghapus rute</small>

    </div>

    <div class="card shadow-sm border-0 pt-0 mt-0">

        <div class="card-body">

            <div class="row g-2 align-items-center">

                <div class="col-12 col-md-auto">

                    <a href="{{ route('rute.create') }}" class="btn btn-success w-100">
                        <i class="bi bi-plus-lg">

                        </i>
                        Tambah rute
                    </a>

                </div>

                <div class="col">

                    <form action="{{ route('rute.index') }}" method="get">

                        <div class="input-group">

                            <input type="search" name="name" placeholder="Search.." class="form-control"
                                value="{{ request('name') }}">

                            <input type="date" name="date" class="form-control" value="{{ request('date') }}">

                            <button class="btn btn-primary" type="submit">

                                <i class="bi bi-search"></i>

                                <span class="d-none d-sm-inline">Cari</span>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm mt-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-custom text-center">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Bus</th>
                            <th>Kota Tujuan</th>
                            <th>Kota Asal</th>
                            <th>Tanggal_Berangkat</th>
                            <th>Jam_Berangkat</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($rutes as $index => $rute)
                            <tr>
                                <td>{{ $rutes->firstItem() + $index }}</td>
                                <td>{{ $rute->bus->nama_bus }}</td>
                                <td>{{ $rute->kota_tujuan }}</td>
                                <td>{{ $rute->kota_asal }}</td>
                                <td>{{ \Carbon\Carbon::parse($rute->tanggal_berangkat)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($rute->jam_berangkat)->format('H:i') }}</td>
                                <td>Rp.{{ number_format($rute->harga, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1 flex-nowrap">

                                        <a href="{{ route('rute.edit', $rute->id) }}"
                                            class="btn btn-sm btn-warning btn-sm d-flex align-items-center gap-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('rute.destroy', $rute->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger btn-sm d-flex align-items-center gap-1"
                                                type="button" onclick="confirmDelete(this)">
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
                                        Tidak ada data rute
                                    </td>
                                </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{ $rutes->links() }}

@endsection
