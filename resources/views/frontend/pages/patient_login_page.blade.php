@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Section -->
    <section class="position-relative overflow-hidden"
        style="padding: 6rem 0 4rem; background: linear-gradient(135deg, rgba(231, 249, 252, 0.9) 0%, rgba(255, 255, 255, 0.95) 100%);">
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI3NSIgY3k9IjI1IiByPSIyMCIgZmlsbD0icmdiYSg2MywgMTkxLCAyMTYsIDAuMDgpIi8+PGNpcmNsZSBjeD0iMjUiIGN5PSI3NSIgcj0iMTUiIGZpbGw9InJnYmEoNjMsIDE5MSwgMjE2LCAwLjA2KSIvPjxjaXJjbGUgY3g9IjgwIiBjeT0iODAiIHI9IjEwIiBmaWxsPSJyZ2JhKDYzLCAxOTEsIDIxNiwgMC4xKSIvPjwvc3ZnPg==') no-repeat; opacity: 0.6; z-index: 0;">
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4"
                        style="width: 80px; height: 80px; background-color: rgba(63, 191, 216, 0.1);">
                        <i class="fas fa-user-circle text-primary fa-2x"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Patienten-Login</h1>
                    <p class="lead fs-4 text-secondary mb-0">Zugang für Patienten</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Formular -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">


                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                                    <i class="fas fa-user me-2"></i> Für Patienten
                                </span>
                                <h2 class="h4 fw-bold" style="color: var(--dental-dark);">Anmeldung für Patienten</h2>
                                <p class="text-secondary mb-0">Melden Sie sich an, um auf Ihr Patientenkonto zuzugreifen</p>
                            </div>

                            <form method="POST" action="{{ route('patient.login.in') }}">
                                @csrf
                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="name@example.com" required>
                                        <label for="email">E-Mail-Adresse</label>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="passwort" name="password"
                                            placeholder="Passwort" required>
                                        <label for="passwort">Passwort</label>
                                    </div>
                                </div>

                                {{-- <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="angemeldet_bleiben"
                                        name="angemeldet_bleiben">
                                    <label class="form-check-label" for="angemeldet_bleiben">Angemeldet bleiben</label>
                                </div> --}}

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                        <i class="fas fa-sign-in-alt me-2"></i> Anmelden
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p>Noch kein Konto? <a href="{{ route('main.registration.page') }}"
                                            class="text-decoration-none">Jetzt
                                            registrieren</a></p>
                                    <p class="mb-0"><a href="{{ route('password.forget.for.both') }}"
                                            class="text-decoration-none">Passwort
                                            vergessen?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="mb-0">
                            <i class="fas fa-tooth me-2 text-secondary"></i>
                            Sie sind Zahnarzt? <a href="{{ route('dentist.login.page') }}" class="text-decoration-none">Zum
                                Zahnarzt-Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Alternativen -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Sie sind Zahnarzt oder Praxisinhaber?
                    </h2>
                    <p class="lead text-secondary">Nutzen Sie unsere speziellen Funktionen für Zahnärzte und Praxisinhaber
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
                        <div class="card-body p-4 p-md-5">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="text-center text-md-start">
                                        <h3 class="h4 fw-bold mb-3" style="color: var(--dental-dark);">Ihre Praxis bei
                                            Dentalax registrieren</h3>
                                        <p class="mb-4">Erreichen Sie mehr Patienten und optimieren Sie Ihre
                                            Online-Präsenz mit unseren speziell entwickelten Zahnarzt-Paketen.</p>
                                        <div
                                            class="d-flex flex-column flex-sm-row gap-2 justify-content-center justify-content-md-start">
                                            <a href="{{ route('dentist.registration.page') }}"
                                                class="btn btn-primary rounded-pill">
                                                <i class="fas fa-clinic-medical me-2"></i> Praxis registrieren
                                            </a>
                                            <a href="{{ route('for_dentists') }}"
                                                class="btn btn-outline-primary rounded-pill">
                                                <i class="fas fa-info-circle me-2"></i> Mehr erfahren
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <img src="{{ asset('frontend/assets/static/img/dentist-illustration.svg') }}"
                                            alt="Zahnarzt Illustration" class="img-fluid" style="max-height: 230px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // AOS Initialisierung, falls vorhanden
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true
                });
            }
        });
    </script>
@endsection
