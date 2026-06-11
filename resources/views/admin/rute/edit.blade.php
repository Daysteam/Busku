@extends('layout.dashboard')

@section('title', 'BusKu | Admin Edit Rute')

@section('content')

    <div class="d-flex justify-content-center align-items-center mt-3">

        <div class="col-12 col-sm-9 col-md-6 col-lg-5">

            <a href="{{ route('rute.index') }}" class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali

            </a>

            <div class="card shadow-sm mt-3">

                <div class="card-body">

                    <h5 class="my-3 text-start text-md-center">Edit Rute</h5>

                    <form action="{{ route('rute.update', $rute->id) }}" method="post">

                        @csrf

                        @method('PUT')

                        <div class="mb-3">

                            <label for="bus_id" class="form-label">Nama Bus</label>

                            <select name="bus_id" id="bus_id" class="form-select @error('bus_id') is-invalid @enderror">

                                <option value="">-- Pilih Bus --</option>

                                @forelse ($buses as $bus)
                                    <option value="{{ $bus->id }}"
                                        {{ old('bus_id', $rute->bus_id) == $bus->id ? 'selected' : '' }}>
                                        {{ $bus->nama_bus }}</option>
                                @empty
                                    <option value="">-- Tidak Ada Bus --</option>
                                @endforelse

                            </select>

                            @error('bus_id')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="kota_tujuan" class="form-label">Kota Tujuan</label>

                            <input type="text" name="kota_tujuan" id="kota_tujuan"
                                class="form-control @error('kota_tujuan') is-invalid @enderror"
                                placeholder="Masukan Kota Tujuan.." value="{{ old('kota_tujuan', $rute->kota_tujuan) }}">


                            @error('kota_tujuan')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="kota_asal" class="form-label">Kota Asal</label>

                            <input type="text" name="kota_asal" id="kota_asal"
                                class="form-control @error('kota_asal') is-invalid @enderror"
                                placeholder="Masukan Kota Asal.." value="{{ old('kota_asal', $rute->kota_asal) }}">


                            @error('kota_asal')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>

                            <input type="date" name="tanggal_berangkat" id="tanggal_berangkat"
                                class="form-control @error('tanggal_berangkat') is-invalid @enderror"
                                placeholder="Masukan Tanggal Berangkat"
                                value="{{ old('tanggal_berangkat', $rute->tanggal_berangkat) }}">

                            @error('tanggal_berangkat')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="jam_berangkat" class="form-label">Jam Berangkat</label>

                            <input type="time" name="jam_berangkat" id="jam_berangkat"
                                class="form-control @error('jam_berangkat') is-invalid @enderror"
                                placeholder="Masukan Jam Berangkat"
                                value="{{ old('jam_berangkat', \Carbon\Carbon::parse($rute->jam_berangkat)->format('H:i')) }}">

                            @error('jam_berangkat')
                                <div class="invalid-feedback d-block">

                                    {{ $message }}

                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="harga" class="form-label">Harga</label>

                            <input type="number" name="harga" id="harga"
                                class="form-control @error('harga') is-invalid @enderror" placeholder="Masukan Harga.."
                                value="{{ old('harga', $rute->harga) }}">

                            @error('harga')
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
