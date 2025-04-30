@extends('frontend.layouts.master')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card border-0 shadow rounded-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Neues Passwort setzen</h4>
                    </div>
                    @if (session('status'))
                        <script>
                            toastr.success("{{ session('status') }}");
                        </script>
                    @endif


                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                            @csrf

                            <input type="hidden" name="token" value="{{ request()->route('token') }}">

                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" placeholder="E-Mail" required
                                    value="{{ old('email', request()->email) }}">
                                <label for="email">E-Mail-Adresse</label>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Neues Passwort"
                                    required>
                                <label for="password">Neues Passwort</label>
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Passwort bestätigen" required>
                                <label for="password_confirmation">Passwort bestätigen</label>
                            </div>

                            <button class="btn btn-primary w-100 rounded-pill" type="submit">
                                <i class="fas fa-key me-2"></i> Passwort aktualisieren
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Hero Section -->
    {{-- <section class="position-relative overflow-hidden"
        style="padding: 6rem 0 4rem; background: linear-gradient(135deg, rgba(231, 249, 252, 0.9) 0%, rgba(255, 255, 255, 0.95) 100%);">
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI3NSIgY3k9IjI1IiByPSIyMCIgZmlsbD0icmdiYSg2MywgMTkxLCAyMTYsIDAuMDgpIi8+PGNpcmNsZSBjeD0iMjUiIGN5PSI3NSIgcj0iMTUiIGZpbGw9InJnYmEoNjMsIDE5MSwgMjE2LCAwLjA2KSIvPjxjaXJjbGUgY3g9IjgwIiBjeT0iODAiIHI9IjEwIiBmaWxsPSJyZ2JhKDYzLCAxOTEsIDIxNiwgMC4xKSIvPjwvc3ZnPg==') no-repeat; opacity: 0.6; z-index: 0;">
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4"
                        style="width: 80px; height: 80px; background-color: rgba(63, 191, 216, 0.1);">
                        <i class="fas fa-user-circle text-primary fa-
2x"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Passwort vergessen</h1>
                    <p class="lead fs-4 text-secondary mb-0">Passwort zurücksetzen</p>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Login Formular -->
    {{-- <section class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                                    <i class="fas fa-user me-2"></i> Passwort zurücksetzen
                                </span>
                                <h2 class="h4 fw-bold" style="color: var(--dental-dark);">Passwort zurücksetzen</h2>
                                <p class="text-secondary mb-0">Geben Sie Ihre E-Mail-Adresse ein, um Ihr Passwort zurückzusetzen</p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Ihre E-Mail" required>
                                        <label for="email">E-Mail-Adresse</label>
                                        <div class="invalid-feedback" id="email-error"></div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary rounded-pill py-3">Passwort zurücksetzen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
