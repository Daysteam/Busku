@extends('layout.dashboard')

@section('title', 'BusKu | Petugas Jadwal Bus')

@section('content')

    <div class="mt-4 mb-3">

        <h4 class="fw-bold">Jadwal bus hari ini</h4>

        <p class="text-muted">Jadwal berangkat bus hari ini</p>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <table class="table table-custom text-center">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Kota Asal</th>
                        <th>Kota Tujuan</th>
                        <th>Tanggal Berangkat</th>
                        <th>Jam Berangkat</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($buses as $bus)
                        @foreach ($bus->rute as $rute)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rute->kota_asal }}</td>
                                <td>{{ $rute->kota_tujuan }}</td>
                                <td>{{ \Carbon\Carbon::parse($rute->tanggal_berangkat)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($rute->jam_berangkat)->format('H:i') }}</td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="5">Tidak ada data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

@endsection
