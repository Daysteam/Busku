@extends('layout.auth')

@section('title','BusKu | Login')


@section('content')

    <div class="row vh-100">

        <div class="d-none d-md-block col-md-5 bg-bus">

            <div class="d-flex justify-content-center align-items-center vh-100">

                <div class="text-white text-center">

                    <i class="bi bi-person-circle mb-0" style="font-size: 8rem">

                    </i>
                    
                    <h4 class="fs-3">Register</h4>

                </div>

            </div>

        </div>

        <div class="col-12 col-md-7 d-flex justify-content-center align-items-center">

            <div class="mx-4 mt-3">

                <a href="{{ route('landing-page') }}" class="navbar-brand fw-bold fs-3">

                    <i class="bi bi-bus-front-fill"></i>

                    BusKu
                    
                </a>

                <h5 class="fs-4">Selamat datang diregister BusKu</h5>

                <p class="fs-6 mb-4">Lengkapilah formulir dibawah ini untuk memulai petualangan bersama kami.</p>

                <div class="card">

                    <div class="card-body">

                        <h4 class="text-center">Register</h4>

                        <form action="" method="POST">

                            <div class="mb-3">

                                <label for="email" class="form-label">Email</label>
                                
                                <div class="input-group">

                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>

                                    <input type="text" name="email" id="email" class="form-control" placeholder="Masukan username...">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label for="password" class="form-label">Password</label>

                                <div class="input-group">

                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password...">

                                    <button class="btn btn-outline-secondary" type="button" id="passwordBtn">

                                        <i class="bi bi-eye"></i>

                                    </button>
                                    
                                </div>

                            </div>

                            <div class="mb-3">

                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>

                                <div class="input-group">

                                    <span class="input-group-text"><i class="bi bi-check-circle"></i></span>
                                    
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Masukan ulang password...">

                                    <button class="btn btn-outline-secondary" type="button" id="passwordConsBtn">

                                        <i class="bi bi-eye"></i>

                                    </button>
                                    
                                </div>

                            </div>

                            <button class="btn btn-primary px-2 w-100">
                                
                                Register

                            </button>

                        </form>

                    </div>

            </div>

        </div>

    </div>

    <script>
        
        const passwordInput = document.getElementById('password');
        const passwordBtn = document.getElementById('passwordBtn');
        const icon = passwordBtn.querySelector('i');

        const passwordConsInput = document.getElementById('password_confirmation');
        const passwordConsBtn = document.getElementById('passwordConsBtn');
        const iconCons = passwordConsBtn.querySelector('i'); 

        passwordBtn.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });

        passwordConsBtn.addEventListener('click', function () {
            if (passwordConsInput.type === 'password') {
                passwordConsInput.type = 'text';
                iconCons.classList.remove('bi-eye');
                iconCons.classList.add('bi-eye-slash');
            } else {
                passwordConsInput.type = 'password';
                iconCons.classList.remove('bi-eye-slash');
                iconCons.classList.add('bi-eye');
            }
        });

    </script>

@endsection