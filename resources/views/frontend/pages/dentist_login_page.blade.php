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
                        <i class="fas fa-tooth text-primary fa-2x"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Zahnarzt-Login</h1>
                    <p class="lead fs-4 text-secondary mb-0">Zugang für Zahnärzte und Praxen</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Formular -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="alert alert-primary alert-dismissible fade show mb-4" role="alert">
                        message info
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
                        <div class="card-body p-4 p-md-5">
                            <div class="text-center mb-4">
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                                    <i class="fas fa-clinic-medical me-2"></i> Für Zahnärzte & Praxisinhaber
                                </span>
                                <h2 class="h4 fw-bold" style="color: var(--dental-dark);">Anmeldung für Ihre Praxis</h2>
                                <p class="text-secondary mb-0">Melden Sie sich an, um auf Ihr Praxiskonto zuzugreifen</p>
                            </div>

                            <form method="post" action="/zahnarzt-login">
                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="name@example.com" required>
                                        <label for="email">E-Mail-Adresse</label>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="passwort" name="passwort"
                                            placeholder="Passwort" required>
                                        <label for="passwort">Passwort</label>
                                    </div>
                                </div>

                                <!-- Hidden field für next-Parameter -->
                                <input type="hidden" name="next" value="">

                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="angemeldet_bleiben"
                                        name="angemeldet_bleiben">
                                    <label class="form-check-label" for="angemeldet_bleiben">Angemeldet bleiben</label>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                        <i class="fas fa-sign-in-alt me-2"></i> Als Zahnarzt anmelden
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p>Noch kein Praxiskonto? <a href="{{ route('registration.page')}}" class="text-decoration-none">Praxis
                                            registrieren</a></p>
                                    <p class="mb-0"><a href="{{ route('password.forget.for.both')}}"
                                            class="text-decoration-none">Passwort vergessen?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="mb-0">
                            <i class="fas fa-user me-2 text-secondary"></i>
                            Sie sind Patient? <a href="{{ route('patient.login.page')}}" class="text-decoration-none">Zum Patienten-Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features für Zahnärzte -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Ihre Vorteile als registrierte Praxis
                    </h2>
                    <p class="lead text-secondary">Nutzen Sie alle Funktionen der Dentalax-Plattform für Ihre Praxis</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Vorteil 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-calendar-alt text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Online-Terminkalender</h3>
                            <p class="text-secondary mb-0">Verwalten Sie Termine online und ermöglichen Sie Patienten die
                                direkte Terminbuchung.</p>
                        </div>
                    </div>
                </div>

                <!-- Vorteil 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-chart-line text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Praxis-Statistiken</h3>
                            <p class="text-secondary mb-0">Erhalten Sie Einblicke in Ihre Online-Performance und verfolgen
                                Sie die Entwicklung Ihrer Praxis.</p>
                        </div>
                    </div>
                </div>

                <!-- Vorteil 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-bullhorn text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Marketing-Tools</h3>
                            <p class="text-secondary mb-0">Nutzen Sie unsere Marketing-Tools, um Ihre Online-Präsenz zu
                                stärken und neue Patienten zu gewinnen.</p>
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
