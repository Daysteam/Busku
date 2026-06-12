@extends('layout.dashboard')

@section('title', 'BusKu | Admin Manage user')

@section('content')

    <div class="alert alert-warning d-flex align-items-center mt-3 shadow-sm" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <div>
            Semua akun yang dibuat memiliki password default:
            <strong>password</strong>
        </div>
    </div>

    <div class="mt-4 mb-4">

        <h4 class="mb-0 fw-bold">Manage Petugas</h4>

        <small class="text-muted">Digunakan untuk menambahkan akun yang dapat digunakan untuk login</small>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="row g-2 align-items-center">

                <div class="col-12 col-md-auto">

                    <a href="{{ route('user.create') }}" class="btn btn-success w-100">
                        <i class="bi bi-plus-lg">

                        </i>
                        Tambah Petugas
                    </a>

                </div>

                <div class="col">

                    <form action="{{ route('user.index') }}" method="get">

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

    <div class="card border-0 shadow-sm mt-3">

        <div class="card-body">


            <div class="table-responsive">

                <table class="table table-custom text-center">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($users as $index => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1 flex-nowrap">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                                type="button" onclick="confirmDelete(this)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-5 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Tidak ada data user
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-4">
        
        {{ $users->links() }}

    </div>

@endsection
