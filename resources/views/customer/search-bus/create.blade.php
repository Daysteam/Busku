@extends('layout.dashboard')

@section('title', 'BusKu | Form Pengisian Tiket')

@section('content')

    <a href="{{ route('search-bus.index') }}" class="btn btn-outline-secondary my-3">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

    <form action="{{ route('search-bus.store', $rute->id) }}" method="POST">

        @csrf

        <input type="hidden" name="rute_id" value="{{ $rute->id }}">

        <div class="row">

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">
                            Data Penumpang
                        </h4>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Jumlah Tiket
                            </label>

                            <div class="d-flex align-items-center gap-2">

                                <button type="button" class="btn btn-outline-secondary" id="btn-minus">
                                    <i class="bi bi-dash"></i>
                                </button>

                                <input type="number" id="jumlah_tiket" name="jumlah_tiket" value="1" min="1"
                                    max="{{ min(3, $sisa_kursi) }}" class="form-control text-center" style="width:100px">

                                <button type="button" class="btn btn-outline-secondary" id="btn-plus">
                                    <i class="bi bi-plus"></i>
                                </button>

                            </div>

                        </div>

                        <div id="container-penumpang"></div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm sticky-top">

                    <div class="card-body">

                        <h5 class="fw-bold mb-4">
                            Ringkasan Pembayaran
                        </h5>

                        <div class="d-flex justify-content-between mb-2">

                            <span>Harga Tiket</span>

                            <span>
                                Rp {{ number_format($rute->harga, 0, ',', '.') }}
                            </span>

                        </div>

                        <div class="d-flex justify-content-between mb-2">

                            <span>Jumlah Tiket</span>

                            <span id="summary-jumlah">
                                1
                            </span>

                        </div>

                        <hr>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Metode Pembayaran
                            </label>

                            <select name="metode_pembayaran" class="form-select" required>

                                <option value="">
                                    Pilih Metode Pembayaran
                                </option>

                                <option value="transfer">
                                    Transfer Bank
                                </option>

                                <option value="ewallet">
                                    E-Wallet (DANA / OVO / GoPay)
                                </option>

                            </select>

                            <div class="mt-2 p-3 bg-light border rounded">

                                <small class="text-muted d-block mb-1 fw-semibold">
                                    Informasi Pembayaran Transfer:
                                </small>

                                <small class="text-muted d-block">
                                    • Transfer ke rekening: <strong>8909873233</strong><br>
                                    • Konfirmasi ke WhatsApp: <strong>0852-3611-7737</strong><br>
                                    • Setelah transfer, tiket akan diverifikasi oleh admin
                                </small>

                            </div>

                        </div>
                        <div class="d-flex justify-content-between">

                            <strong>Total</strong>

                            <strong class="text-primary" id="summary-total">

                                Rp {{ number_format($rute->harga, 0, ',', '.') }}

                            </strong>

                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-4">

                            Pesan Sekarang

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

    <script>
        const hargaTiket = {{ $rute->harga }};
        const maxTiket = {{ min(3, $sisa_kursi) }};

        const jumlahInput =
            document.getElementById('jumlah_tiket');

        const summaryJumlah =
            document.getElementById('summary-jumlah');

        const summaryTotal =
            document.getElementById('summary-total');

        const container =
            document.getElementById('container-penumpang');

        function formatRupiah(angka) {

            return 'Rp ' + angka.toLocaleString('id-ID');

        }

        function generatePenumpang(jumlah) {

            container.innerHTML = '';

            for (let i = 1; i <= jumlah; i++) {

                container.innerHTML += `
                <div class="card border mb-3">

                    <div class="card-body">

                        <h6 class="fw-bold mb-3">
                            Penumpang ${i}
                        </h6>

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Nama Penumpang
                                </label>

                                <input
                                    type="text"
                                    name="nama_penumpang[]"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-3">

                                <label class="form-label">
                                    Umur
                                </label>

                                <input
                                    type="number"
                                    name="umur[]"
                                    min="1"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="col-md-3">

                                <label class="form-label">
                                    Jenis Kelamin
                                </label>

                                <select
                                    name="jenis_kelamin[]"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        Pilih
                                    </option>

                                    <option value="pria">
                                        Laki-Laki
                                    </option>

                                    <option value="wanita">
                                        Perempuan
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>
            `;
            }
        }

        function updateSummary() {

            let jumlah =
                parseInt(jumlahInput.value);

            if (jumlah > maxTiket) {

                jumlah = maxTiket;

                jumlahInput.value = maxTiket;
            }

            if (jumlah < 1 || isNaN(jumlah)) {

                jumlah = 1;

                jumlahInput.value = 1;
            }

            summaryJumlah.innerText =
                jumlah;

            summaryTotal.innerText =
                formatRupiah(jumlah * hargaTiket);

            generatePenumpang(jumlah);
        }

        document
            .getElementById('btn-plus')
            .addEventListener('click', () => {

                if (+jumlahInput.value < maxTiket) {

                    jumlahInput.value++;

                    updateSummary();
                }
            });

        document
            .getElementById('btn-minus')
            .addEventListener('click', () => {

                if (+jumlahInput.value > 1) {

                    jumlahInput.value--;

                    updateSummary();
                }
            });

        jumlahInput.addEventListener(
            'input',
            updateSummary
        );

        updateSummary();
    </script>

@endsection
