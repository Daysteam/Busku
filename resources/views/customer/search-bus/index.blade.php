@extends('layout.dashboard')

@section('title', 'BusKu | Cari Tiket Bus')

@section('content')


        <div class="mb-4">
            <h3 class="fw-bold">Cari Tiket Bus</h3>
            <p class="text-muted mb-0">Temukan perjalanan terbaik untuk tujuan Anda</p>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <form action="{{ route('search-bus.index') }}" method="GET">

                    @csrf

                    <div class="mb-3">

                        <label for="kota_asal" class="form-label">Kota Asal</label>

                        <div class="input-group">

                            <div class="input-group-text">

                                <i class="bi bi-geo-alt"></i>

                            </div>

                            <select name="kota_asal" id="kota_asal" class="form-select">

                                <option value="">Pilih Kota Asal</option>

                                @forelse ($kotaAsals as $kotaAsal)
                                    <option value="{{ $kotaAsal }}"
                                        {{ request('kota_asal') === $kotaAsal ? 'selected' : '' }}>{{ $kotaAsal }}
                                    </option>
                                @empty
                                    <option value="" disabled>Tidak ada data kota</option>
                                @endforelse

                            </select>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label for="kota_tujuan" class="form-label">Kota Tujuan</label>

                        <div class="input-group">

                            <div class="input-group-text">

                                <i class="bi bi-geo"></i>

                            </div>

                            <select name="kota_tujuan" id="kota_tujuan" class="form-select">

                                <option value="">Pilih Kota Tujuan</option>

                                @forelse ($kotaTujuans as $kotaTujuan)
                                    <option value="{{ $kotaTujuan }}"
                                        {{ request('kota_tujuan') === $kotaTujuan ? 'selected' : '' }}>{{ $kotaTujuan }}
                                    </option>
                                @empty
                                    <option value="" disabled>Tidak ada data kota</option>
                                @endforelse

                            </select>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label for="tanggal_berangkat" class="form-label">
                            Tanggal Berangkat
                        </label>

                        <div class="input-group">

                            <div class="input-group-text">

                                <i class="bi bi-calendar"></i>

                            </div>

                            <input type="date" name="tanggal_berangkat" id="tanggal_berangkat" class="form-control" value="{{ request('tanggal_berangkat') }}">

                        </div>

                    </div>

                    <button class="btn btn-primary w-100">

                        <i class="bi bi-search">

                        </i>

                        <span>Cari</span>

                    </button>

                </form>

            </div>

        </div>

        <div class="row mt-4">

            @forelse ($rutes as $rute)
                <div class="col-12">

                    <div class="card border-0 shadow-sm mb-3 hover-card">

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-md-2 text-center">

                                    <img src="{{ $rute->bus->image ? asset('storage/' . $rute->bus->image) : 'https://placehold.co/600x400?text=Bus' }}"
                                        class="rounded" style="width: 100px; height: 100px; object-fit: cover;">

                                </div>

                                <div class="col-md-6 mt-2 mt-md-0">

                                    <h5 class="fw-bold mb-1">
                                        {{ $rute->bus->nama_bus }} ({{ $rute->bus->tipe_bus }})
                                    </h5>

                                    <p class="text-muted mb-2">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        {{ $rute->kota_asal }}
                                        <i class="bi bi-arrow-right mx-2"></i>
                                        {{ $rute->kota_tujuan }}
                                    </p>

                                    <div class="d-flex gap-4">

                                        <small class="text-muted">
                                            <i class="bi bi-calendar-event"></i>
                                            {{ \Carbon\Carbon::parse($rute->tanggal_berangkat)->format('d M Y') }}
                                        </small>

                                        <small class="text-muted">
                                            <i class="bi bi-clock"></i>
                                            {{ $rute->jam_berangkat }}
                                        </small>

                                        <small class="text-muted">
                                            <i class="bi bi-person-fill"></i>
                                            {{ $rute->sisa_kursi ?? '-' }} Kursi Tersedia
                                        </small>

                                    </div>

                                </div>

                                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                                    <div class="text-success fw-bold fs-4">
                                        Rp {{ number_format($rute->harga, 0, ',', '.') }}
                                    </div>

                                    <small class="text-muted d-block mb-3">
                                        per penumpang
                                    </small>

                                    <a href="{{ route('search-bus.create', $rute->id) }}" class="btn btn-primary px-4">
                                        Pesan Sekarang
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center text-muted">

                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>

                            Tidak ada bus di rute yang dipilih

                        </div>

                    </div>

                </div>
            @endforelse

        </div>

        {{ $rutes->links() }}


@endsection
