@extends('layout.dashboard')

@section('title','BusKu | Petugas Scan Tiket')

@section('content')

<div class="mt-4">
    <h4 class="fw-bold mb-0">Scan Tiket</h4>
    <small class="text-muted">
        Arahkan kamera ke QR Code tiket penumpang
    </small>
</div>

<div class="row mt-4 g-3">

    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center">

                    <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width:70px;height:70px;">
                        <i class="bi bi-hourglass-split text-warning fs-3"></i>
                    </div>

                    <div>
                        <small class="text-muted">
                            Belum Scan
                        </small>

                        <h2 class="fw-bold mb-0">
                            {{ $totalTiketBelum }}
                        </h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center">

                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width:70px;height:70px;">
                        <i class="bi bi-check-circle-fill text-success fs-3"></i>
                    </div>

                    <div>
                        <small class="text-muted">
                            Sudah Scan
                        </small>

                        <h2 class="fw-bold mb-0">
                            {{ $totalTiketSudah }}
                        </h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-12">

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">

                <div class="text-center mb-4">

                    <div
                        class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                        style="width:80px;height:80px;">
                        <i class="bi bi-qr-code-scan text-primary fs-1"></i>
                    </div>

                    <h5 class="fw-bold mt-3">
                        Scanner Tiket
                    </h5>

                    <p class="text-muted mb-0">
                        Tempatkan QR Code di dalam area scan
                    </p>

                </div>

                <div class="d-flex justify-content-center">
                    <div
                        id="reader"
                        class="border rounded-4 overflow-hidden"
                        style="max-width:500px;width:100%;">
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    function onScanSuccess(decodedText) {

        scanner.clear();

        fetch('/scan-qr', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                qr_code: decodedText
            })
        })
        .then(res => res.json())
        .then(data => {

            Swal.fire({
                icon: data.success ? 'success' : 'error',
                title: data.success ? 'Berhasil' : 'Gagal',
                text: data.message
            }).then(() => {
                location.reload();
            });

        })
        .catch(error => {

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan saat memproses QR Code'
            });

            console.error(error);

            setTimeout(() => {
                scanner.render(onScanSuccess);
            }, 1000);
        });
    }

    const scanner = new Html5QrcodeScanner(
        "reader",
        {
            fps: 15,
            qrbox: 250
        },
        false
    );

    scanner.render(onScanSuccess);
</script>

@endsection