@extends('layout.dashboard')

@section('title', 'BusKu | Admin Create Bus')

@section('content')

    <div class="d-flex justify-content-center align-items-center mt-3">

        <div class="col-12 col-sm-9 col-md-6 col-lg-5">

            <a href="{{ route('bus.index') }}" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali

            </a>

            <div class="card shadow-sm mt-3">

                <div class="card-body">

                    <h5 class="my-3 text-start text-md-center">Tambah Bus</h5>

                    <form action="{{ route('bus.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label for="nama_bus" class="form-label">Nama Bus</label>

                            <input type="text" name="nama_bus" id="nama_bus"
                                class="form-control @error('nama_bus') is-invalid @enderror"
                                placeholder="Masukan Nama Bus.." value="{{ old('nama_bus') }}">

                            @error('nama_bus')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="kode_bus" class="form-label">Kode Bus</label>

                            <input type="text" name="kode_bus" id="kode_bus"
                                class="form-control @error('kode_bus') is-invalid @enderror"
                                placeholder="Masukan Kode Bus.." value="{{ old('kode_bus') }}">


                            @error('kode_bus')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="user_id" class="form-label">Petugas</label>

                            <select name="user_id" id="user_id"
                                class="form-select @error('user_id') is-invalid @enderror">

                                <option value="">-- Pilih Petugas --</option>

                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->username }}</option>
                                @empty
                                    <option value="">-- Tidak Ada Petugas --</option>
                                @endforelse

                            </select>


                            @error('user_id')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>

                            <input type="number" name="jumlah_kursi" id="jumlah_kursi" placeholder="0"
                                class="form-control @error('jumlah_kursi') is-invalid @enderror"
                                value="{{ old('jumlah_kursi') }}">

                            @error('jumlah_kursi')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">

                            <label for="tipe_bus" class="form-label">Tipe Bus</label>

                            <select name="tipe_bus" id="tipe_bus"
                                class="form-select @error('tipe_bus') is-invalid @enderror">

                                <option value="">-- Pilih Tipe Bus --</option>

                                <option value="ekonomi" {{ old('tipe_bus') === 'ekonomi' ? 'selected' : '' }}>Ekonomi
                                </option>

                                <option value="eksekutive" {{ old('tipe_bus') === 'eksekutive' ? 'selected' : '' }}>
                                    Eksekutive</option>

                                <option value="vip" {{ old('tipe_bus') === 'vip' ? 'selected' : '' }}>
                                    Vip</option>

                            </select>

                            @error('tipe_bus')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="image" class="form-label fw-semibold">
                                Foto Bus
                            </label>

                            <div class="border rounded p-3 text-center">

                                <img src="https://placehold.co/600x400?text=Preview" id="preview"
                                    class="img-fluid rounded mb-3 preview">

                                <input type="file" name="image" id="image" accept="image/*"
                                    class="form-control @error('image') is-invalid @enderror">

                                <small class="text-muted mt-2">
                                    Format JPG, PNG, SVG, WEBP. Maksimal 2MB.
                                </small>

                                @error('image')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        <button class="btn btn-primary px-2 w-100" type="submit">Simpan</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>
        document.getElementById('image').addEventListener('change', function() {

            const file = this.files[0];

            if (file) {
                document.getElementById('preview').src =
                    URL.createObjectURL(file);
            }

        });
    </script>

@endsection
