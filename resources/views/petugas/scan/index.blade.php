@extends('layout.dashboard')

@section('title','BusKu | Pegawai Scan Tiket')

@section('content')

	<div class="mt-4 mb-0">

		<h4 class="fw-bold">Scan Tiket</h4>

		<p class="text-muted">Scan Qr code yang telah didapatkan oleh customer</p>

	</div>

	<div class="card border-0 shadow-sm mt-3">

		<div class="card-body">

			<div class="row">

				<div class="col-12 col-md-6">

					<div class="card">

						<div class="card-body">
							<div class="circle green">

								<i class="bi bi-check-circle"></i>

							</div>

									<h4 class="fw-bold">Tiket yang sudah discan</h4>

									<p>100</p>

						</div>

					</div>

				</div>

				<div class="col-12 col-md-6">

					<div class="card">

						<div class="card-body">
							<div class="circle red">

								<i class="bi bi-hourglass-split"></i>

							</div>

									<h4 class="fw-bold">Tiket yang sudah discan</h4>

									<p>100</p>

						</div>

					</div>

				</div

			</div>

		</div>

	</div>

	<div class="card border-0 shadow-sm">

		<div class="card-body">

			<div id="reader" style="width: 500px;" class="rounded">

			</div>

		</div>

	</div>

	<script src="https://unpkg.com/html5-qrcode"></script>

	<script>
		function onScanSuccess(decodedText) {
			fetch('/scan-qr', {

				method: 'POST',
				header: {
					Content-Type: 'application/json',
					'X-CSRF-TOKEN: '{{ csrf_token }}'
				},
				body: JSON.stringify({
					qr_code: decodedText
				})

			}).then(res => res.json())
			.then(data => {
				alert(data.message
			});
		}

		new Html5QrcodeScanner{
			"reader",
			{
				fps:15,
				qrbox:250
			}
		}.render(onScanSuccess):
	</script>

@endsection
