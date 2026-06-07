@extends('layout.dashboard')

@section('title', 'BusKu | Admin Edit Bus')

@section('content')

    <div class="d-flex justify-content-center align-items-center mt-3">

        <div class="col-12 col-sm-9 col-md-6 col-lg-5">

            <a href="{{ route('bus.index') }}" class="btn btn-secondary px-2">

                Kembali

            </a>

            <div class="card shadow-sm mt-3">

                <div class="card-body">

                    <h5 class="my-3 text-start text-md-center">Edit Bus</h5>

                    <form action="{{ route('bus.update', $bus->id) }}" method="post" enctype="multipart/form-data">

                        @csrf

                        @method('PUT')

                        <div class="mb-3">

                            <label for="nama_bus" class="form-label">Nama Bus</label>

                            <input type="text" name="nama_bus" id="nama_bus"
                                class="form-control @error('nama_bus') is-invalid @enderror"
                                placeholder="Masukan Nama Bus.." value="{{ old('nama_bus', $bus->nama_bus) }}">

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
                                placeholder="Masukan Kode Bus.." value="{{ old('kode_bus', $bus->kode_bus) }}">


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
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id', $bus->user_id) == $user->id ? 'selected' : '' }}>
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
                                value="{{ old('jumlah_kursi', $bus->jumlah_kursi) }}">

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

                                <option value="ekonomi"
                                    {{ old('tipe_bus', $bus->tipe_bus) === 'ekonomi' ? 'selected' : '' }}>Ekonomi
                                </option>

                                <option value="eksekutive"
                                    {{ old('tipe_bus', $bus->tipe_bus) === 'eksekutive' ? 'selected' : '' }}>
                                    Eksekutive</option>

                                <option value="vip" {{ old('tipe_bus', $bus->tipe_bus) === 'vip' ? 'selected' : '' }}>
                                    Vip</option>

                            </select>

                            @error('tipe_bus')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="image" class="form-label">Foto Bus</label>

                            <div class="border rounded p-3 text-center">


                                <img src="{{ $bus->image ? asset('storage/' . $bus->image) : 'https://placehold.co/600x400?text=Preview' }}"
                                    id="preview" class="img-fluid mb-3 preview">
                                    

                                <input type="file" name="image" id="image" placeholder="0"
                                    class="form-control @error('images') is-invalid @enderror">

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

@endsection
