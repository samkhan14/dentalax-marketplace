@extends('frontend.layouts.master')
@section('content')
<!-- Hero Section mit modernem Design -->
<section class="position-relative overflow-hidden"
    style="padding: 8rem 0 6rem; background: radial-gradient(circle at 70% 30%, rgba(231, 249, 252, 0.5) 0%, rgba(255, 255, 255, 0) 70%), linear-gradient(130deg, #ffffff 0%, #e3f7fa 100%);">
    <!-- Abstrakte Design-Elemente für modernen Look -->
    <div class="position-absolute top-0 end-0 d-none d-lg-block"
        style="width: 30%; height: 100%; background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI3NSIgY3k9IjI1IiByPSIyMCIgZmlsbD0icmdiYSg2MywgMTkxLCAyMTYsIDAuMDgpIi8+PGNpcmNsZSBjeD0iMjUiIGN5PSI3NSIgcj0iMTUiIGZpbGw9InJnYmEoNjMsIDE5MSwgMjE2LCAwLjA2KSIvPjxjaXJjbGUgY3g9IjgwIiBjeT0iODAiIHI9IjEwIiBmaWxsPSJyZ2JhKDYzLCAxOTEsIDIxNiwgMC4xKSIvPjwvc3ZnPg==') no-repeat; opacity: 0.6; z-index: 0;">
    </div>

    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            <!-- Text und Suchbereich -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800">
                <div class="mb-5">
                    <h1 class="display-4 fw-bold mb-4" style="color: var(--dental-dark)">Finde den passenden Zahnarzt in
                        deiner Nähe</h1>
                    <p class="lead fs-4 text-secondary mb-5">Dentalax verbindet dich mit über 50.000 qualifizierten
                        Zahnarztpraxen deutschlandweit.</p>

                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="badge bg-white text-primary border border-primary rounded-pill px-3 py-2">
                            <i class="fas fa-check-circle me-1"></i> Über 5 Millionen Termine vermittelt
                        </span>
                        <span class="badge bg-white text-primary border border-primary rounded-pill px-3 py-2">
                            <i class="fas fa-check-circle me-1"></i> Über 400 Städte
                        </span>
                        <span class="badge bg-white text-primary border border-primary rounded-pill px-3 py-2">
                            <i class="fas fa-check-circle me-1"></i> Kostenlose Terminvergabe
                        </span>
                    </div>
                </div>

                <!-- Suchformular mit verbessertem Design -->
                <div class="search-card p-4 bg-white rounded-4 shadow" data-aos="fade-up" data-aos-delay="100">
                    <form action="/suche" method="GET">
                        <div class="mb-4">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="fas fa-search me-2" style="color: var(--dental-primary)"></i>
                                Zahnarztsuche
                            </h5>
                        </div>

                        <div class="row g-3">
                            <!-- Stadt oder PLZ -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="ort" class="form-control border-2" id="inputOrt"
                                        placeholder="Stadt oder PLZ" required>
                                    <label for="inputOrt">Stadt oder PLZ</label>
                                </div>
                            </div>

                            <!-- Behandlung -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="behandlung" class="form-control border-2"
                                        id="inputBehandlung" placeholder="Behandlung">
                                    <label for="inputBehandlung">Behandlung (optional)</label>
                                </div>
                            </div>

                            <!-- Umkreis Slider -->
                            <div class="col-12">
                                <label for="umkreisRange" class="form-label d-flex justify-content-between">
                                    <span>Umkreis</span>
                                    <span class="badge bg-primary rounded-pill" id="rangeValue">25 km</span>
                                </label>
                                <input type="range" class="form-range" min="5" max="100" step="5"
                                    value="25" name="umkreis" id="umkreisRange">
                            </div>

                            <!-- Suchbuttons -->
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary w-100 py-3 rounded-3 shadow-sm">
                                    <i class="fas fa-search me-2"></i> Zahnarzt finden
                                </button>
                            </div>

                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-primary w-100 py-3 rounded-3"
                                    onclick="sucheInDerNahe()" id="geoBtn">
                                    <i class="fas fa-map-marker-alt me-2"></i> In meiner Nähe
                                </button>
                            </div>
                        </div>

                        <!-- Spinner für Geolocation -->
                        <div id="geoLoader" class="text-center mt-3 py-2" style="display: none;">
                            <div class="spinner-grow text-primary" role="status"
                                style="width: 1.5rem; height: 1.5rem;">
                                <span class="visually-hidden">Lade Standort...</span>
                            </div>
                            <p class="mt-2 text-muted">Standort wird ermittelt…</p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Hero-Image -->
            <div class="col-lg-6 d-none d-lg-block text-end" data-aos="fade-left">
                <div class="position-relative">
                    <img src="{{ asset('frontend/assets/images/Zahnarzt in der Nähe.jpeg') }}"
                        class="img-fluid rounded-4 shadow-lg" alt="Dentalax Zahnarztsuche"
                        style="max-height: 480px; object-fit: cover;">
                    <div class="position-absolute bottom-0 start-0 bg-white p-3 rounded-3 shadow-sm"
                        style="transform: translate(-15%, 15%); max-width: 200px;">
                        <div class="d-flex align-items-center">
                            <div class="me-3 bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 45px; height: 45px;">
                                <i class="fas fa-tooth fs-4 text-white"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold">Über 50.000 Zahnarztpraxen</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Populäre Städte mit Slick-Slider -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0 fw-bold">Populäre Städte</h2>
            <a href="{{ route('all_cities')}}" class="text-decoration-none text-primary">Alle Städte <i
                    class="fas fa-arrow-right ms-1"></i></a>
        </div>

        <div class="row g-3">
            <div class="col-6 col-md-2">
                <a href="#" class="card border-0 shadow-sm h-100 text-decoration-none hover-card">
                    <div class="card-body text-center py-3">
                        <div class="fs-5 text-primary mb-1"><i class="fas fa-map-marker-alt"></i></div>
                        <h6 class="card-title mb-0">Berlin</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-2">
                <a href="#" class="card border-0 shadow-sm h-100 text-decoration-none hover-card">
                    <div class="card-body text-center py-3">
                        <div class="fs-5 text-primary mb-1"><i class="fas fa-map-marker-alt"></i></div>
                        <h6 class="card-title mb-0">Hamburg</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-2">
                <a href="#" class="card border-0 shadow-sm h-100 text-decoration-none hover-card">
                    <div class="card-body text-center py-3">
                        <div class="fs-5 text-primary mb-1"><i class="fas fa-map-marker-alt"></i></div>
                        <h6 class="card-title mb-0">München</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-2">
                <a href="#" class="card border-0 shadow-sm h-100 text-decoration-none hover-card">
                    <div class="card-body text-center py-3">
                        <div class="fs-5 text-primary mb-1"><i class="fas fa-map-marker-alt"></i></div>
                        <h6 class="card-title mb-0">Köln</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-2">
                <a href="#"
                    class="card border-0 shadow-sm h-100 text-decoration-none hover-card">
                    <div class="card-body text-center py-3">
                        <div class="fs-5 text-primary mb-1"><i class="fas fa-map-marker-alt"></i></div>
                        <h6 class="card-title mb-0">Frankfurt</h6>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-2">
                <a href="#"
                    class="card border-0 shadow-sm h-100 text-decoration-none hover-card">
                    <div class="card-body text-center py-3">
                        <div class="fs-5 text-primary mb-1"><i class="fas fa-map-marker-alt"></i></div>
                        <h6 class="card-title mb-0">Stuttgart</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section mit Icons -->
<section class="py-5" style="background-color: #f8fcfd;">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-6 fw-bold mb-2">Warum Dentalax?</h2>
            <p class="lead text-secondary">Deutschlands größtes Zahnarztportal mit zahlreichen Vorteilen</p>
            <div class="mx-auto" style="width: 100px; height: 3px; background-color: var(--dental-primary);"></div>
        </div>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="card border-0 h-100 shadow-sm rounded-4 hover-card">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                            style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.15);">
                            <i class="fas fa-search fa-2x" style="color: var(--dental-primary);"></i>
                        </div>
                        <h3 class="h4 mb-3">Einfache Zahnarztsuche</h3>
                        <p class="text-secondary mb-0">Finde den passenden Zahnarzt in deiner Nähe mit unserer
                            intelligenten Suchfunktion nach Standort und Fachgebiet.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 h-100 shadow-sm rounded-4 hover-card">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                            style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.15);">
                            <i class="fas fa-calendar-check fa-2x" style="color: var(--dental-primary);"></i>
                        </div>
                        <h3 class="h4 mb-3">Online-Terminbuchung</h3>
                        <p class="text-secondary mb-0">Buche direkt und unkompliziert Termine bei deinem Wunschzahnarzt
                            – rund um die Uhr und ohne Wartezeiten.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 h-100 shadow-sm rounded-4 hover-card">
                    <div class="card-body p-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                            style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.15);">
                            <i class="fas fa-star fa-2x" style="color: var(--dental-primary);"></i>
                        </div>
                        <h3 class="h4 mb-3">Bewertungen & Erfahrungen</h3>
                        <p class="text-secondary mb-0">Profitiere von den Erfahrungen anderer Patienten und finde so
                            genau den richtigen Zahnarzt für deine Bedürfnisse.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Statistics Section -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                <h2 class="h3 fw-bold mb-4">Dentalax in Zahlen</h2>
                <p class="text-secondary mb-4">Unsere Plattform verbindet täglich tausende Patienten mit den besten
                    Zahnärzten in ganz Deutschland. Wir revolutionieren die Art, wie Menschen Zahnarzttermine finden und
                    buchen.</p>
                <a href="{{ route('for_dentists')}}" class="btn btn-outline-primary rounded-pill px-4">Für Zahnärzte <i
                        class="fas fa-arrow-right ms-2"></i></a>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="card border-0 bg-light rounded-4 h-100">
                            <div class="card-body p-4 text-center">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px; background-color: var(--dental-primary);">
                                    <i class="fas fa-user-md fa-2x text-white"></i>
                                </div>
                                <h2 class="display-6 fw-bold text-primary">50.000+</h2>
                                <p class="mb-0 text-secondary">Zahnärzte</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-0 bg-light rounded-4 h-100">
                            <div class="card-body p-4 text-center">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px; background-color: var(--dental-primary);">
                                    <i class="fas fa-users fa-2x text-white"></i>
                                </div>
                                <h2 class="display-6 fw-bold text-primary">2 Mio.</h2>
                                <p class="mb-0 text-secondary">Patienten</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 bg-light rounded-4 h-100">
                            <div class="card-body p-4 text-center">
                                <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                    style="width: 70px; height: 70px; background-color: var(--dental-primary);">
                                    <i class="fas fa-calendar-check fa-2x text-white"></i>
                                </div>
                                <h2 class="display-6 fw-bold text-primary">5 Mio.+</h2>
                                <p class="mb-0 text-secondary">Termine</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Moderne CTA Section -->
<section class="position-relative overflow-hidden py-5 mt-4" style="background-color: var(--dental-primary);">
    <div class="position-absolute top-0 start-0 w-100 h-100"
        style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjgwIiByPSI2MCIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iNDAiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wOCkiLz48L3N2Zz4='); opacity: 0.8;">
    </div>
    <div class="container position-relative py-4">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold text-white mb-3">Bereit, den passenden Zahnarzt zu finden?</h2>
                <p class="lead text-white opacity-80 mb-0">Starte jetzt deine Suche und vereinbare einfach online einen
                    Termin!</p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-lg-end">
                    <a href="{{ route('all_cities')}}" class="btn btn-light btn-lg rounded-pill shadow px-4">
                        Alle Städte <i class="fas fa-arrow-right ms-2"></i>
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
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .opacity-80 {
        opacity: 0.8;
    }

    .search-card {
        border-top: 4px solid var(--dental-primary);
    }
</style>
