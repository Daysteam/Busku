@extends('layout.dashboard')

@section('title', 'BusKu | Admin Manage Bus')

@section('content')

    <div class="mt-4 mb-3">

        <h4 class="mb-0 fw-bold">Manage Bus</h4>

        <small class="text-muted">Menu yang digunakan untuk menambahkan, mengedit atau menghapus bus</small>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="row g-2 align-items-center">

                <div class="col-12 col-md-auto">

                    <a href="{{ route('bus.create') }}" class="btn btn-success w-100">
                        <i class="bi bi-plus-lg">

                        </i>
                        Tambah Bus
                    </a>

                </div>

                <div class="col">

                    <form action="{{ route('bus.index') }}" method="get">

                        <div class="input-group">

                            <input type="search" name="search" placeholder="Search.." class="form-control"
                                value="{{ request('search') }}">

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

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-custom text-center">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Bus</th>
                            <th>Kode Bus</th>
                            <th>Jumlah Kursi</th>
                            <th>Petugas</th>
                            <th>Tipe Bus</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($buses as $index => $bus)
                            <tr>
                                <td>{{ $buses->firstItem() + $index }}</td>
                                <td class="d-flex jusitfy-content-center align-items-center gap-2">
                                    <img src="{{ $bus->image ? asset('storage/' . $bus->image) : 'https://placehold.co/600x400?text=Not+Found' }}" alt="" height="100px" width="170px" class="rounded">
                                    <p>{{ $bus->nama_bus }}</p>
                                </td>
                                <td>{{ $bus->kode_bus }}</td>
                                <td>{{ $bus->jumlah_kursi }}</td>
                                <td>{{ $bus->user->username ?? '-' }}</td>
                                <td>{{ $bus->tipe_bus }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1 flex-nowrap">
                                        <a href="{{ route('bus.edit', $bus->id) }}"
                                            class="btn btn-sm btn-warning btn-sm d-flex align-items-center gap-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('bus.destroy', $bus->id) }}" method="POST">
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
                                <tr>
                                    <td colspan="7" class="py-5 text-muted">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Tidak ada data bus
                                    </td>
                                </tr>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-4">

        {{ $buses->links() }}

    </div>

@endsection
