@extends('layout.dashboard')

@section('title','BusKu | Petugas Mencari Penumpang')

@section('content')

    <div class="mt-4 mb-3">

        <h4 class="fw-bold">

            Nama Penumpang Hari Ini

        </h4>

        <p class="text-muted">

            Mencari nama penumpang hari ini

        </p>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="" method="get">

                <div class="input-group">

                    <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Masukan Nama Penumpang...">

                    <button class="btn btn-primary" type="submit">
                        
                        <i class="bi bi-search ms-1">

                        </i>

                        <span class="d-none d-md-inline">
                            Cari
                        </span>

                    </button>

                </div>

            </form>

        </div>

    </div>

    <div class="card border-0 shadow-sm mt-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-custom text-center">
                    
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Penumpang</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($penumpangs as $index => $penumpang)
                            <tr>
                                <td>{{ $penumpangs->firstItem() + $index }}</td>
                                <td>{{ $penumpang->nama_penumpang }}</td>
                                <td>{{ $penumpang->jenis_kelamin }}</td>
                                <td>{{ $penumpang->umur }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4 text-center">Tidak Ada Data</td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{ $penumpangs->links() }}

@endsection