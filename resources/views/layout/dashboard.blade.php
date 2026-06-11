<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/bus-front-fill.svg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <x-sidebar></x-sidebar>

    <main class="main d-flex flex-column" id="main">

        <nav class="navbar navbar-light bg-light shadow-sm px-2 d-flex justify-content-between align-items-center">

            <button class="navbar-toggler" id="toggleBtn">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="d-flex justify-content-center aling-items-center">

                <div class="text-end me-2">

                    <p class="my-0">{{ auth()->user()->username }}</p>

                    <p class="text-muted my-0">{{ auth()->user()->email }}</p>

                </div>

                <div class="d-flex align-items-center justify-content-center">

                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold text-uppercase shadow-sm"
                        style="width: 35px; height: 35px; font-size: 14px; letter-spacing: 0.5px;">

                        {{ Str::substr(Auth::user()->username, 0, 1) }}

                    </div>

                </div>

            </div>

        </nav>

        <div class="container-fluid flex-grow-1">

            @yield('content')

        </div>

        <x-footer class="mt-auto"></x-footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main');
        const overlay = document.getElementById('overlay');

        document.getElementById('toggleBtn').addEventListener('click', () => {

            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            } else {
                sidebar.classList.toggle('sidebar--collapsed');
                main.classList.toggle('main--expanded');
            }

        });

        document.getElementById('closeBtn').addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>
    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }

        function confirmPayment(button) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Status akan diubah ke dibayar',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }

        function confirmCancelled(button) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Status akan diubah ke Batal',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }

        function confirmLogout(button){
            Swal.fire({
                title: 'Yakin?',
                text: 'Kamu akan logout!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            })
        }
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonText: 'ok'
            })
        </script>
    @endif
    
</body>

</html>
