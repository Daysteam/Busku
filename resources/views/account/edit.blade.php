@extends('layout.dashboard')

@section('title', 'BusKu | Pengaturan Akun')

@section('content')

    <div class="mt-4">
        <h4 class="fw-bold mb-0">Pengaturan Akun</h4>
        <small class="text-muted">
            Kelola username, email, dan password akun Anda
        </small>
    </div>

    <div class="row mt-4">

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center">

                    <i class="bi bi-person-circle display-1 text-primary"></i>

                    <h5 class="fw-bold mt-3 mb-0">
                        {{ $user->username }}
                    </h5>

                    <p class="text-muted">
                        {{ $user->email }}
                    </p>

                    <hr>

                    <div class="text-start">

                        <div class="mb-3">
                            <small class="text-muted d-block">
                                Username
                            </small>

                            <span class="fw-semibold">
                                {{ $user->username }}
                            </span>
                        </div>

                        <div>
                            <small class="text-muted d-block">
                                Email
                            </small>

                            <span class="fw-semibold">
                                {{ $user->email }}
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Form Edit --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-gear me-2"></i>
                        Edit Akun
                    </h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('account.update') }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label for="username" class="form-label">
                                    Username
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>

                                    <input type="text" name="username" id="username"
                                        value="{{ old('username', $user->username) }}"
                                        class="form-control @error('username') is-invalid @enderror"
                                        placeholder="Masukkan Username">

                                </div>

                                @error('username')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $user->email) }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Masukkan Email">

                                </div>

                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                        <hr>

                        <div class="mb-3">

                            <label for="current_password" class="form-label">
                                Password Lama
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-key"></i>
                                </span>

                                <input type="password" name="current_password" id="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="Masukkan Password Lama">

                                <button class="btn btn-outline-secondary" type="button" id="currentPasBtn">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                            @error('current_password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="password" class="form-label">
                                Password Baru
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan Password Baru">

                                <button class="btn btn-outline-secondary" type="button" id="newPasBtn">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label for="password_confirmation" class="form-label">
                                Konfirmasi Password Baru
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-shield-check"></i>
                                </span>

                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Masukkan Password Lagi">

                                <button class="btn btn-outline-secondary" type="button" id="newConfPasBtn">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                        </div>

                        <div class="d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary px-4">

                                <i class="bi bi-check-circle me-2"></i>
                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>
        const passwordCurrentField = document.getElementById('current_password');
        const passwordCurrentButton = document.getElementById('currentPasBtn');
        const passwordCurrentIcon = passwordCurrentButton.querySelector('i');
        const passwordField = document.getElementById('password');
        const passwordButton = document.getElementById('newPasBtn');
        const passwordIcon = passwordButton.querySelector('i');
        const passwordConfirmationField = document.getElementById('password_confirmation');
        const passwordConfirmationButton = document.getElementById('newConfPasBtn');
        const passwordConfirmationIcon = passwordConfirmationButton.querySelector('i');

        passwordCurrentButton.addEventListener('click', function () {
            if(passwordCurrentField.type === 'password'){
                
                passwordCurrentField.type = 'text',
                passwordCurrentIcon.classList.remove('bi-eye');
                passwordCurrentIcon.classList.add('bi-eye-slash');

            }else {

                passwordCurrentField.type = 'password',
                passwordCurrentIcon.classList.remove('bi-eye-slash');
                passwordCurrentIcon.classList.add('bi-eye');

            }
        })

        passwordButton.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                
                passwordField.type = 'text';
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');

            } else {

                passwordField.type = 'password';
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');

            }
        })

        passwordConfirmationButton.addEventListener('click', function () {

            if (passwordConfirmationField.type === 'password') {

                passwordConfirmationField.type = 'text';
                passwordConfirmationIcon.classList.remove('bi-eye');
                passwordConfirmationIcon.classList.add('bi-eye-slash');

            } else {

                passwordConfirmationField.type = 'password';
                passwordConfirmationIcon.classList.remove('bi-eye-slash');
                passwordConfirmationIcon.classList.add('bi-eye');

            }

        })
    </script>

@endsection
