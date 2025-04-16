@extends('frontend.layouts.master')
@section('content')
    <section class="position-relative overflow-hidden"
        style="padding: 8rem 0 6rem; background: linear-gradient(130deg, rgba(42, 130, 148, 0.9) 0%, rgba(63, 191, 216, 0.8) 100%);">
        <!-- Abstrakte Design-Elemente für modernen Look -->
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjgwIiByPSI2MCIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iNDAiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wOCkiLz48L3N2Zz4=') no-repeat; opacity: 0.8; z-index: 0;">
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center text-white">
                    <h1 class="display-4 fw-bold mb-3" data-aos="fade-up">Mehr Sichtbarkeit. Mehr Patienten. <span
                            class="text-white opacity-80">Mehr Kontrolle.</span></h1>
                    <p class="lead fs-4 mb-5" data-aos="fade-up" data-aos-delay="100">Mit Dentalax bringen Sie Ihre
                        Zahnarztpraxis auf das nächste digitale Level – einfach, sichtbar und effizient.</p>

                    <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-4">
                            <div class="card border-0 h-100 shadow-lg rounded-4 hover-card text-start"
                                style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
                                <div class="card-body p-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                        style="width: 60px; height: 60px; background-color: rgba(255, 255, 255, 0.2);">
                                        <i class="fas fa-laptop-medical fa-2x text-white"></i>
                                    </div>
                                    <h3 class="h5 mb-3 fw-bold text-white">Eigene Praxis-Landingpage</h3>
                                    <p class="text-white opacity-80 mb-0">Modern, mobil-optimiert und
                                        suchmaschinenfreundlich – ganz ohne Aufwand.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 h-100 shadow-lg rounded-4 hover-card text-start"
                                style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
                                <div class="card-body p-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                        style="width: 60px; height: 60px; background-color: rgba(255, 255, 255, 0.2);">
                                        <i class="fas fa-search fa-2x text-white"></i>
                                    </div>
                                    <h3 class="h5 mb-3 fw-bold text-white">Bessere Google-Sichtbarkeit</h3>
                                    <p class="text-white opacity-80 mb-0">Profitieren Sie von unserem SEO-System für
                                        regionale Auffindbarkeit Ihrer Praxis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 h-100 shadow-lg rounded-4 hover-card text-start"
                                style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
                                <div class="card-body p-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                        style="width: 60px; height: 60px; background-color: rgba(255, 255, 255, 0.2);">
                                        <i class="fas fa-user-md fa-2x text-white"></i>
                                    </div>
                                    <h3 class="h5 mb-3 fw-bold text-white">Top-Mitarbeiter finden</h3>
                                    <p class="text-white opacity-80 mb-0">Erreichen Sie passende Bewerber aus Ihrer Region
                                        und besetzen Sie Stellen gezielt & schnell.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5" data-aos="fade-up" data-aos-delay="300">
                        <a href="{{ route('packages')}}" class="btn btn-light btn-lg rounded-pill px-5 py-3 shadow">
                            <i class="fas fa-check-circle me-2"></i> Jetzt Paket wählen
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistiken -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="0">
                    <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px; background-color: var(--dental-light);">
                        <i class="fas fa-users fa-2x" style="color: var(--dental-primary);"></i>
                    </div>
                    <h2 class="display-5 fw-bold" style="color: var(--dental-primary);">50.000+</h2>
                    <p class="lead text-secondary">Zahnärzte vertrauen uns</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px; background-color: var(--dental-light);">
                        <i class="fas fa-tooth fa-2x" style="color: var(--dental-primary);"></i>
                    </div>
                    <h2 class="display-5 fw-bold" style="color: var(--dental-primary);">2 Mio.</h2>
                    <p class="lead text-secondary">Patienten monatlich</p>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px; background-color: var(--dental-light);">
                        <i class="fas fa-chart-line fa-2x" style="color: var(--dental-primary);"></i>
                    </div>
                    <h2 class="display-5 fw-bold" style="color: var(--dental-primary);">84%</h2>
                    <p class="lead text-secondary">Steigerung der Sichtbarkeit</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Marketingbereich -->
    <section class="py-5" style="background-color: #f8fcfd;">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="{{ asset('frontend/assets/images/Zahnarzt_Marketing.jpeg') }}"
                            class="img-fluid rounded-4 shadow" alt="Marketing für Zahnärzte"
                            style="max-height: 500px; object-fit: cover;">
                        <div class="position-absolute bottom-0 end-0 bg-white p-3 rounded-3 shadow-lg"
                            style="transform: translate(10%, 20%); max-width: 200px;">
                            <div class="d-flex align-items-center">
                                <div class="me-3 bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">
                                    <i class="fas fa-search fs-4 text-white"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-semibold">Top Google-Rankings</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="ps-lg-5">
                        <h6 class="text-primary fw-bold text-uppercase mb-3">Marketing für Ihre Praxis</h6>
                        <h2 class="display-6 fw-bold mb-4">Mehr Sichtbarkeit, mehr Patienten</h2>
                        <p class="lead text-secondary mb-4">Mit Dentalax profitieren Sie von gezielten Marketingmaßnahmen –
                            SEO, Google Ads und Social Media – die Ihre Praxis ins Rampenlicht rücken.</p>

                        <div class="d-flex mb-3 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Leistungsstarke Google-Rankings durch optimierte Praxisseiten</p>
                        </div>
                        <div class="d-flex mb-3 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Aktive Patientenakquise über zielgenaue Werbung</p>
                        </div>
                        <div class="d-flex mb-4 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Regionale Sichtbarkeit – automatisch und ohne Aufwand</p>
                        </div>

                        <a href="{{ route('packages')}}" class="btn btn-primary rounded-pill px-4 py-2 mt-2">
                            <i class="fas fa-info-circle me-2"></i> Mehr erfahren
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Landingpage-Bereich -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row align-items-center g-5 flex-md-row-reverse">
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="position-relative">
                        <img src="{{ asset('frontend/assets/images/Zahnarzt_Landingpage.jpeg') }}"
                            class="img-fluid rounded-4 shadow" alt="Praxis Landingpage"
                            style="max-height: 500px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 bg-white p-3 rounded-3 shadow-lg"
                            style="transform: translate(-10%, -20%); max-width: 200px;">
                            <div class="d-flex align-items-center">
                                <div class="me-3 bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">
                                    <i class="fas fa-laptop-code fs-4 text-white"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-semibold">Modernes Design</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="pe-lg-5">
                        <h6 class="text-primary fw-bold text-uppercase mb-3">Ihre Praxis online</h6>
                        <h2 class="display-6 fw-bold mb-4">Ihre Praxis im besten Licht</h2>
                        <p class="lead text-secondary mb-4">Ihre Landingpage auf Dentalax ist schnell,
                            suchmaschinenfreundlich und spiegelt Ihre Kompetenz wider. Ohne Designaufwand, ohne
                            Technikkenntnisse.</p>

                        <div class="d-flex mb-3 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Modernes responsives Design für alle Geräte optimiert</p>
                        </div>
                        <div class="d-flex mb-3 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Automatische Einrichtung – kein technischer Aufwand</p>
                        </div>
                        <div class="d-flex mb-4 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Für Patienten optimiert & DSGVO-konform</p>
                        </div>

                        <a href="{{ route('dentist.landingpage')}}" class="btn btn-primary rounded-pill px-4 py-2 mt-2"
                            target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i> Demo ansehen
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mitarbeiter-Bereich -->
    <section class="py-5" style="background-color: #f8fcfd;">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="{{ asset('frontend/assets/images/Zahnarzt_Mitarbeiter.jpeg') }}"
                            class="img-fluid rounded-4 shadow" alt="Jobs für Zahnarztpraxen"
                            style="max-height: 500px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 bg-white p-3 rounded-3 shadow-lg"
                            style="transform: translate(10%, 20%); max-width: 200px;">
                            <div class="d-flex align-items-center">
                                <div class="me-3 bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 45px; height: 45px;">
                                    <i class="fas fa-briefcase fs-4 text-white"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-semibold">Qualifiziertes Personal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="ps-lg-5">
                        <h6 class="text-primary fw-bold text-uppercase mb-3">Personalgewinnung</h6>
                        <h2 class="display-6 fw-bold mb-4">Fachkräfte gezielt erreichen</h2>
                        <p class="lead text-secondary mb-4">Ob ZFA, ZMF oder Verwaltung – offene Stellen besetzen Sie mit
                            Dentalax schneller. Ihre Jobanzeige erscheint auf Ihrer Praxisseite und im deutschlandweiten
                            Dental-Jobportal.</p>

                        <div class="d-flex mb-3 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Flächendeckende Jobreichweite in Ihrer Region</p>
                        </div>
                        <div class="d-flex mb-3 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Lokales Recruiting durch gezielte Kampagnen</p>
                        </div>
                        <div class="d-flex mb-4 align-items-start">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                style="width: 28px; height: 28px; background-color: var(--dental-light);">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <p class="mb-0">Integration auf Ihrer Praxis-Seite für mehr Reichweite</p>
                        </div>

                        <a href="/paketwahl" class="btn btn-primary rounded-pill px-4 py-2 mt-2">
                            <i class="fas fa-user-plus me-2"></i> Personal finden
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA-Bereich -->
    <section class="position-relative overflow-hidden py-5 mt-4" style="background-color: var(--dental-primary);">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjgwIiByPSI2MCIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iNDAiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wOCkiLz48L3N2Zz4='); opacity: 0.8;">
        </div>
        <div class="container position-relative py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <h2 class="display-5 fw-bold text-white mb-3">Bereit, Ihre Praxis zu digitalisieren?</h2>
                    <p class="lead text-white opacity-80 mb-0">Steigern Sie Ihre Sichtbarkeit und gewinnen Sie neue
                        Patienten mit Dentalax.</p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-lg-end">
                        <a href="/paketwahl" class="btn btn-light btn-lg rounded-pill shadow px-4">
                            <i class="fas fa-check-circle me-2"></i> Jetzt starten
                        </a>
                        <a href="/kontakt" class="btn btn-outline-light btn-lg rounded-pill px-4">
                            Beratung anfragen <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2) !important;
        }

        .opacity-80 {
            opacity: 0.8;
        }
    </style>
@endsection
