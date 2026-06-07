@extends('layout.dashboard')

@section('title', 'BusKu | Admin Create User')

@section('content')

    <div class="d-flex justify-content-center align-items-center mt-3">

        <div class="col-12 col-sm-9 col-md-6 col-lg-5">

            <a href="{{ route('user.index') }}" class="btn btn-secondary px-2">

                Kembali

            </a>

            <div class="card shadow-sm mt-3">

                <div class="card-body">

                    <h5 class="my-3 text-start text-md-center">Tambah Pegawai</h5>

                    <form action="{{ route('user.store') }}" method="post">

                        @csrf

                        <div class="mb-3">

                            <label for="username" class="form-label">Username</label>

                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                placeholder="Masukan Username.." value="{{ old('username') }}">

                            @error('username')

                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="email" class="form-label">Email</label>

                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukan Email.." value="{{ old('email') }}">


                            @error('email')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <button class="btn btn-primary px-2 w-100" type="submit">Simpan</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
