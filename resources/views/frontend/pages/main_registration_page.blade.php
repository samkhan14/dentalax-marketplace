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
                        <i class="fas fa-user-plus text-primary fa-2x"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Registrieren</h1>
                    <p class="lead fs-4 text-secondary mb-0">Wählen Sie Ihre Rolle und registrieren Sie sich kostenlos</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Auswahlkarten -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="row g-4">
                        <!-- Karte für Patienten -->
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="card border-0 shadow-sm rounded-4 h-100 transition-hover"
                                style="transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;"
                                onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 10px 30px rgba(0, 0, 0, 0.1)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 .5rem 1rem rgba(0, 0, 0, .15)';">
                                <div class="card-body p-4 p-md-5">
                                    <div class="text-center mb-4">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                            style="width: 70px; height: 70px; background-color: rgba(63, 191, 216, 0.1);">
                                            <i class="fas fa-user text-primary fa-2x"></i>
                                        </div>
                                        <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Ich bin Patient</h2>
                                        <p class="text-secondary mb-4">Registrieren Sie sich als Patient, um Zahnärzte zu
                                            finden und Termine zu buchen.</p>
                                    </div>

                                    <div class="mb-4">
                                        <h3 class="h6 fw-bold mb-3" style="color: var(--dental-dark);">Als Patient können
                                            Sie:</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Zahnärzte in Ihrer Nähe finden</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Online Termine vereinbaren</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Behandlungshistorie verwalten</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Erinnerungen für Kontrolltermine erhalten</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="{{ route('patient.registration.page') }}"
                                            class="btn btn-primary btn-md rounded-pill">
                                            <i class="fas fa-user-plus me-2"></i> Als Patient registrieren
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Karte für Zahnärzte -->
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm rounded-4 h-100 transition-hover"
                                style="transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;"
                                onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 10px 30px rgba(0, 0, 0, 0.1)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 .5rem 1rem rgba(0, 0, 0, .15)';">
                                <div class="card-body p-4 p-md-5">
                                    <div class="text-center mb-4">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                            style="width: 70px; height: 70px; background-color: rgba(63, 191, 216, 0.1);">
                                            <i class="fas fa-tooth text-primary fa-2x"></i>
                                        </div>
                                        <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Ich bin Zahnarzt</h2>
                                        <p class="text-secondary mb-4">Registrieren Sie Ihre Praxis, um mehr Patienten zu
                                            gewinnen und Ihre Online-Präsenz zu verbessern.</p>
                                    </div>

                                    <div class="mb-4">
                                        <h3 class="h6 fw-bold mb-3" style="color: var(--dental-dark);">Als Zahnarzt können
                                            Sie:</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Ihre Praxis online präsentieren</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Online-Terminbuchungen annehmen</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Patientenbewertungen erhalten</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Marketing-Tools für Ihre Praxis nutzen</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="{{ route('dentist.registration.page') }}"
                                            class="btn btn-primary btn-md rounded-pill">
                                            <i class="fas fa-clinic-medical me-2"></i> Als Zahnarzt registrieren
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card border-0 shadow-sm rounded-4 h-100 transition-hover"
                                style="transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;"
                                onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 10px 30px rgba(0, 0, 0, 0.1)';"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 .5rem 1rem rgba(0, 0, 0, .15)';">
                                <div class="card-body p-4 p-md-5">
                                    <div class="text-center mb-4">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                            style="width: 70px; height: 70px; background-color: rgba(63, 191, 216, 0.1);">
                                            <i class="fas fa-tooth text-primary fa-2x"></i>
                                        </div>
                                        <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Ich bin Bewerbungen
                                        </h2>
                                        <p class="text-secondary mb-4">Registrieren Sie Ihre Praxis, um mehr Patienten zu
                                            gewinnen und Ihre Online-Präsenz zu verbessern.</p>
                                    </div>

                                    <div class="mb-4">
                                        <h3 class="h6 fw-bold mb-3" style="color: var(--dental-dark);">Als Bewerbungen
                                            können
                                            Sie:</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Ihre Praxis online präsentieren</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Online-Terminbuchungen annehmen</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Patientenbewertungen erhalten</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-2">
                                                <i class="fas fa-check-circle text-primary me-3"></i>
                                                <span>Marketing-Tools für Ihre Praxis nutzen</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="{{ route('dentist.registration.page') }}"
                                            class="btn btn-primary btn-md rounded-pill">
                                            <i class="fas fa-clinic-medical me-2"></i> Bewerbungen registrieren
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mt-5 text-center" data-aos="fade-up" data-aos-delay="200">
                        <p class="mb-3">Bereits registriert? Melden Sie sich jetzt an.</p>
                        <a href="/login" class="btn btn-outline-primary rounded-pill">
                            <i class="fas fa-sign-in-alt me-2"></i> Anmelden
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Vorteile/Testimonials -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Was unsere Nutzer sagen</h2>
                    <p class="lead text-secondary">Tausende von Patienten und Zahnärzten vertrauen Dentalax</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Testimonial 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <span class="text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                            <p class="mb-4">"Dank Dentalax habe ich schnell einen Zahnarzt in meiner Nähe gefunden und
                                konnte bequem online einen Termin vereinbaren. Die Erinnerungsfunktion ist auch super
                                praktisch!"</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                    style="width: 40px; height: 40px;">
                                    ML
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold mb-0" style="color: var(--dental-dark);">Maria L.</h3>
                                    <p class="small text-secondary mb-0">Patientin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <span class="text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                            <p class="mb-4">"Als Zahnarzt konnte ich durch Dentalax meine Online-Präsenz deutlich
                                verbessern. Die Plattform ist einfach zu bedienen und die Terminbuchungen funktionieren
                                reibungslos."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                    style="width: 40px; height: 40px;">
                                    TS
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold mb-0" style="color: var(--dental-dark);">Dr. Thomas S.</h3>
                                    <p class="small text-secondary mb-0">Zahnarzt</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <span class="text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </span>
                            </div>
                            <p class="mb-4">"Die Suche nach einem Spezialisten für meine Zahnbehandlung war mit Dentalax
                                super einfach. Ich konnte Bewertungen lesen und mich gut informieren, bevor ich mich für
                                eine Praxis entschieden habe."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                    style="width: 40px; height: 40px;">
                                    JK
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold mb-0" style="color: var(--dental-dark);">Julia K.</h3>
                                    <p class="small text-secondary mb-0">Patientin</p>
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
