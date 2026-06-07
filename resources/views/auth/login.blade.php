@extends('layout.auth')

@section('title','BusKu | Login')


@section('content')

    <div class="row vh-100">

        <div class="d-none d-md-block col-md-5 bg-bus">

            <div class="d-flex justify-content-center align-items-center vh-100">

                <div class="text-white text-center">

                    <i class="bi bi-person-circle mb-0" style="font-size: 8rem">

                    </i>
                    
                    <h4 class="fs-3">Login</h4>

                </div>

            </div>

        </div>

        <div class="col-12 col-md-7 d-flex justify-content-center align-items-center">

            <div class="mx-4 mt-3">

                <a href="{{ route('landing-page') }}" class="navbar-brand fw-bold fs-3">

                    <i class="bi bi-bus-front-fill"></i>

                    BusKu
                    
                </a>

                <h5 class="fs-4">Selamat datang dilogin BusKu</h5>

                <p class="fs-6 mb-4">Lengkapilah formulir dibawah ini untuk memulai petualangan bersama kami.</p>

                <div class="card">

                    <div class="card-body">

                        <h4 class="text-center">Login</h4>

                        <form action="{{ route('login') }}" method="POST">

                            @csrf

                            <div class="mb-3">

                                <label for="email" class="form-label">Email</label>
                                
                                <div class="input-group">

                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>

                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror " placeholder="Masukan username...">

                                </div>
                                
                                @error('email')

                                    <div class="invalid-feedback d-block">

                                        {{ $message }}

                                    </div>

                                @enderror
                            </div>

                            <div class="mb-3">

                                <label for="password" class="form-label">Password</label>

                                <div class="input-group">

                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan password...">

                                    <button class="btn btn-outline-secondary" type="button" id="passwordBtn">

                                        <i class="bi bi-eye"></i>

                                    </button>
                                    
                                </div>

                                @error('password')

                                    <div class="invalid-feedback d-block">

                                        {{ $message }}

                                    </div>

                                @enderror

                            </div>

                            <button class="btn btn-primary px-2 w-100">
                                
                                Login

                            </button>

                            <p class="text-muted text-center mt-3 mb-0">Belum Punya Akun? <a href="{{ route('register-page') }}" class="text-primary text-decoration-none">Daftar</a></p>

                        </form>

                    </div>

            </div>

        </div>

    </div>

    <script>
        
        const passwordInput = document.getElementById('password');
        const passwordBtn = document.getElementById('passwordBtn');
        const icon = passwordBtn.querySelector('i');

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

        })
    </script>

@endsection