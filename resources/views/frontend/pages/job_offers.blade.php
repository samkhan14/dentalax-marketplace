@extends('frontend.layouts.master')
@section('content')
    <style>
        /* Styling für Stellenangebote-Seite */
        .job-title {
            color: #2a8294;
            transition: all 0.2s ease;
        }

        .job-title:hover {
            color: #40bfd8;
        }

        .company-name {
            font-size: 0.9rem;
        }

        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .badge {
            font-weight: 500;
        }

        /* Pagination Styling */
        .pagination .page-link {
            border: none;
            color: #2a8294;
            margin: 0 2px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination .page-item.active .page-link {
            background-color: #40bfd8;
            color: white;
        }

        .pagination .page-link:hover {
            background-color: #e9f7fa;
        }

        /* Sticky Filter auf mobilen Geräten */
        @media (max-width: 991.98px) {
            .sticky-lg-top {
                position: relative;
                top: 0;
            }
        }
    </style>

    <section class="py-5">
        <div class="container">
            <!-- Header-Bereich -->
            <div class="row mb-4">
                <div class="col-lg-7">
                    <h1 class="fw-bold text-primary mb-1">Stellenangebote</h1>
                    <p class="text-muted lead">Die besten Jobs in der Zahnmedizin in ganz Deutschland</p>
                </div>
                <div class="col-lg-5 d-flex justify-content-lg-end align-items-center mt-3 mt-lg-0">
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-light border shadow-sm">
                            <i class="fas fa-bell me-1"></i> Job-Alarm einrichten
                        </button>
                        <a href="{{ route('packages')}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus-circle me-1"></i> Job inserieren
                        </a>
                    </div>
                </div>
            </div>

            <!-- Haupt-Content-Layout -->
            <div class="row">
                <!-- Linke Spalte: Filter -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="card border-0 shadow-sm sticky-lg-top" style="top: 100px; z-index: 10;">
                        <div class="card-header bg-white py-3 border-0">
                            <h5 class="m-0 fw-bold">
                                <i class="fas fa-filter me-2 text-primary"></i>Jobfilter
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="/stellenangebote" method="get">
                                <!-- Suchbegriff -->
                                <div class="mb-3">
                                    <label for="suchbegriff" class="form-label small text-muted">Suchbegriff</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="fas fa-search text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="suchbegriff"
                                            name="query" placeholder="z.B. ZFA, Zahnarzt..." value="">
                                    </div>
                                </div>

                                <!-- Standort -->
                                <div class="mb-3">
                                    <label for="ort" class="form-label small text-muted">Ort / PLZ</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="fas fa-map-marker-alt text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="ort"
                                            name="ort" placeholder="z.B. Berlin oder 10115" value="">
                                    </div>
                                </div>

                                <!-- Umkreis -->
                                <div class="mb-3">
                                    <label for="umkreis" class="form-label small text-muted">Umkreis</label>
                                    <select id="umkreis" name="umkreis" class="form-select">
                                        <option value="5">5 km</option>
                                        <option value="10">10 km</option>
                                        <option value="25" selected>25 km</option>
                                        <option value="50">50 km</option>
                                        <option value="100">100 km</option>
                                    </select>
                                </div>

                                <!-- Position -->
                                <div class="mb-3">
                                    <label for="position" class="form-label small text-muted">Position</label>
                                    <select id="position" name="position" class="form-select">
                                        <option value="">Alle Positionen</option>
                                        <optgroup label="Zahnmedizinische Fachangestellte">
                                            <option value="zfa">ZFA</option>
                                            <option value="zmf">ZMF</option>
                                            <option value="zmv">ZMV</option>
                                            <option value="zmp">ZMP</option>
                                            <option value="dh">Dentalhygieniker/in</option>
                                        </optgroup>
                                        <optgroup label="Zahnärztliches Personal">
                                            <option value="zahnarzt">Zahnarzt/Zahnärztin</option>
                                            <option value="zahntechniker">Zahntechniker/in</option>
                                        </optgroup>
                                        <optgroup label="Verwaltung">
                                            <option value="rezeption">Rezeption</option>
                                            <option value="verwaltung">Verwaltung</option>
                                        </optgroup>
                                        <optgroup label="Sonstige">
                                            <option value="azubi">Auszubildende/r</option>
                                            <option value="sonstige">Sonstige</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <!-- Anstellungsart -->
                                <div class="mb-3">
                                    <label class="form-label small text-muted d-block">Anstellungsart</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="vollzeit" name="vollzeit"
                                                checked>
                                            <label class="form-check-label" for="vollzeit">Vollzeit</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="teilzeit" name="teilzeit"
                                                checked>
                                            <label class="form-check-label" for="teilzeit">Teilzeit</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="ausbildung"
                                                name="ausbildung">
                                            <label class="form-check-label" for="ausbildung">Ausbildung</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Erfahrungslevel -->
                                <div class="mb-3">
                                    <label class="form-label small text-muted d-block">Erfahrungslevel</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="berufseinsteiger"
                                            name="berufseinsteiger" checked>
                                        <label class="form-check-label" for="berufseinsteiger">Berufseinsteiger</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="erfahren" name="erfahren"
                                            checked>
                                        <label class="form-check-label" for="erfahren">Mit Berufserfahrung</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="leitend" name="leitend"
                                            checked>
                                        <label class="form-check-label" for="leitend">Leitende Position</label>
                                    </div>
                                </div>

                                <!-- Aktionsbuttons -->
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search me-1"></i> Jobs finden
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary">
                                        <i class="fas fa-undo me-1"></i> Filter zurücksetzen
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Rechte Spalte: Ergebnisse -->
                <div class="col-lg-9">
                    <!-- Info-Box -->
                    <div class="alert alert-info border-0 bg-light d-flex align-items-center mb-4" role="alert">
                        <div class="me-3 fs-4 text-primary">
                            <i class="fas fa-search"></i>
                        </div>
                        <div>
                            <strong>432 Jobs gefunden</strong> für deine Suche -
                            <span class="fw-normal">Zeige die neuesten Stellenangebote aus ganz Deutschland</span>
                        </div>
                    </div>

                    <!-- Sortieroption und Anzeigemodus -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light border dropdown-toggle shadow-sm" type="button"
                                id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-sort me-1"></i> Sortieren nach: <span class="fw-medium">Neuste
                                    zuerst</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                <li><a class="dropdown-item active" href="#"><i
                                            class="fas fa-calendar-alt me-2"></i> Neuste zuerst</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-map-marker-alt me-2"></i>
                                        Nächste zuerst</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-star me-2"></i> Relevanz</a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group" role="group" aria-label="Anzeigeoptionen">
                            <button type="button" class="btn btn-sm btn-light border shadow-sm active"
                                aria-label="Kompakte Ansicht">
                                <i class="fas fa-list"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light border shadow-sm"
                                aria-label="Detailansicht">
                                <i class="fas fa-th-large"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Stellenangebote Liste -->
                    <div class="job-listings">
                        <!-- Job 1 -->
                        <div class="job-card">
                            <div class="card border-0 shadow-sm hover-shadow mb-3">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div
                                            class="col-md-2 p-3 text-center border-end d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                                alt="Praxislogo" class="img-fluid" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-7 p-3">
                                            <span class="badge bg-success mb-2">Vollzeit</span>
                                            <h5 class="mb-1"><a href="#"
                                                    class="job-title text-decoration-none">Zahnmedizinische/r
                                                    Fachangestellte/r (ZFA)</a></h5>
                                            <p class="text-muted mb-2 company-name">
                                                <i class="fas fa-building me-1"></i> Zahnärzte am Stadtplatz
                                                <span class="ms-2 me-2">|</span>
                                                <i class="fas fa-map-marker-alt me-1"></i> 10115 Berlin-Mitte
                                            </p>
                                            <p class="job-snippet mb-0 small">Wir suchen eine/n engagierte/n ZFA für unsere
                                                moderne Praxis mit digitalen Technologien. Sie arbeiten in einem dynamischen
                                                Team und übernehmen verantwortungsvolle Aufgaben in allen Bereichen.</p>
                                            <div class="mt-2 d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark">mind. 2 Jahre Erfahrung</span>
                                                <span class="badge bg-light text-dark">Prophylaxe</span>
                                                <span class="badge bg-light text-dark">Digitale Praxis</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3 p-3 bg-light d-flex flex-column justify-content-between align-items-end">
                                            <span class="small text-muted"><i class="far fa-calendar-alt me-1"></i> Vor 2
                                                Tagen</span>
                                            <a href="{{ route('job_details')}}" class="btn btn-primary btn-sm mt-auto">
                                                <i class="fas fa-external-link-alt me-1"></i> Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job 2 -->
                        <div class="job-card">
                            <div class="card border-0 shadow-sm hover-shadow mb-3">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div
                                            class="col-md-2 p-3 text-center border-end d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                                alt="Praxislogo" class="img-fluid" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-7 p-3">
                                            <span class="badge bg-info text-white mb-2">Teilzeit</span>
                                            <h5 class="mb-1"><a href="#"
                                                    class="job-title text-decoration-none">Zahntechniker/in</a></h5>
                                            <p class="text-muted mb-2 company-name">
                                                <i class="fas fa-building me-1"></i> Zahnzentrum Frankfurt
                                                <span class="ms-2 me-2">|</span>
                                                <i class="fas fa-map-marker-alt me-1"></i> 60313 Frankfurt am Main
                                            </p>
                                            <p class="job-snippet mb-0 small">Für unser praxiseigenes Labor suchen wir
                                                eine/n qualifizierte/n Zahntechniker/in in Teilzeit (20-30 Std./Woche). Sie
                                                arbeiten eng mit unseren Zahnärzten zusammen und fertigen hochwertigen
                                                Zahnersatz.</p>
                                            <div class="mt-2 d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark">CAD/CAM</span>
                                                <span class="badge bg-light text-dark">20-30 Std./Woche</span>
                                                <span class="badge bg-light text-dark">Flexible Zeiten</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3 p-3 bg-light d-flex flex-column justify-content-between align-items-end">
                                            <span class="small text-muted"><i class="far fa-calendar-alt me-1"></i> Vor 8
                                                Tagen</span>
                                            <a href="{{ route('job_details')}}" class="btn btn-primary btn-sm mt-auto">
                                                <i class="fas fa-external-link-alt me-1"></i> Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job 3 -->
                        <div class="job-card">
                            <div class="card border-0 shadow-sm hover-shadow mb-3">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div
                                            class="col-md-2 p-3 text-center border-end d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                                alt="Praxislogo" class="img-fluid" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-7 p-3">
                                            <span class="badge bg-success mb-2">Vollzeit</span>
                                            <h5 class="mb-1"><a href="#"
                                                    class="job-title text-decoration-none">Zahnmedizinische/r
                                                    Prophylaxeassistent/in (ZMP)</a></h5>
                                            <p class="text-muted mb-2 company-name">
                                                <i class="fas fa-building me-1"></i> Dental Excellence München
                                                <span class="ms-2 me-2">|</span>
                                                <i class="fas fa-map-marker-alt me-1"></i> 80333 München
                                            </p>
                                            <p class="job-snippet mb-0 small">Zur Verstärkung unseres Teams suchen wir
                                                eine/n ZMP, der/die selbstständig Prophylaxebehandlungen durchführt und
                                                unsere Patienten umfassend zur Mundhygiene berät.</p>
                                            <div class="mt-2 d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark">ZMP-Weiterbildung</span>
                                                <span class="badge bg-light text-dark">Übertariflich</span>
                                                <span class="badge bg-light text-dark">Fortbildungen</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3 p-3 bg-light d-flex flex-column justify-content-between align-items-end">
                                            <span class="small text-muted"><i class="far fa-calendar-alt me-1"></i> Vor 5
                                                Tagen</span>
                                            <a href="{{ route('job_details')}}" class="btn btn-primary btn-sm mt-auto">
                                                <i class="fas fa-external-link-alt me-1"></i> Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job 4 -->
                        <div class="job-card">
                            <div class="card border-0 shadow-sm hover-shadow mb-3">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div
                                            class="col-md-2 p-3 text-center border-end d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                                alt="Praxislogo" class="img-fluid" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-7 p-3">
                                            <span class="badge bg-warning text-dark mb-2">Ausbildung</span>
                                            <h5 class="mb-1"><a href="#"
                                                    class="job-title text-decoration-none">Auszubildende/r zur/zum ZFA</a>
                                            </h5>
                                            <p class="text-muted mb-2 company-name">
                                                <i class="fas fa-building me-1"></i> Praxis Dr. Schmidt & Partner
                                                <span class="ms-2 me-2">|</span>
                                                <i class="fas fa-map-marker-alt me-1"></i> 50667 Köln
                                            </p>
                                            <p class="job-snippet mb-0 small">Zum 01.08.2025 bieten wir einen
                                                Ausbildungsplatz zur/zum Zahnmedizinischen Fachangestellten (ZFA) an. In
                                                unserer Praxis erwartet Sie eine fundierte Ausbildung in allen Bereichen.
                                            </p>
                                            <div class="mt-2 d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark">Hauptschulabschluss</span>
                                                <span class="badge bg-light text-dark">Ausbildungsbeginn 08/2025</span>
                                                <span class="badge bg-light text-dark">Gute Perspektiven</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3 p-3 bg-light d-flex flex-column justify-content-between align-items-end">
                                            <span class="small text-muted"><i class="far fa-calendar-alt me-1"></i> Vor 12
                                                Tagen</span>
                                            <a href="{{ route('job_details')}}" class="btn btn-primary btn-sm mt-auto">
                                                <i class="fas fa-external-link-alt me-1"></i> Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job 5 -->
                        <div class="job-card">
                            <div class="card border-0 shadow-sm hover-shadow mb-3">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div
                                            class="col-md-2 p-3 text-center border-end d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                                alt="Praxislogo" class="img-fluid" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-7 p-3">
                                            <span class="badge bg-success mb-2">Vollzeit</span>
                                            <h5 class="mb-1"><a href="#"
                                                    class="job-title text-decoration-none">Zahnarzt/Zahnärztin mit
                                                    Schwerpunkt Implantologie</a></h5>
                                            <p class="text-muted mb-2 company-name">
                                                <i class="fas fa-building me-1"></i> Zahnklinik Westend
                                                <span class="ms-2 me-2">|</span>
                                                <i class="fas fa-map-marker-alt me-1"></i> 80686 München
                                            </p>
                                            <p class="job-snippet mb-0 small">Für unsere moderne Praxisklinik suchen wir
                                                eine/n erfahrene/n Zahnarzt/Zahnärztin mit Schwerpunkt Implantologie. Wir
                                                bieten ein hochmodernes Arbeitsumfeld mit digitalem Workflow.</p>
                                            <div class="mt-2 d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark">Implantologie</span>
                                                <span class="badge bg-light text-dark">Min. 3 Jahre Erfahrung</span>
                                                <span class="badge bg-light text-dark">Digitaler Workflow</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3 p-3 bg-light d-flex flex-column justify-content-between align-items-end">
                                            <span class="small text-muted"><i class="far fa-calendar-alt me-1"></i> Vor 3
                                                Tagen</span>
                                            <a href="{{ route('job_details')}}" class="btn btn-primary btn-sm mt-auto">
                                                <i class="fas fa-external-link-alt me-1"></i> Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job 6 -->
                        <div class="job-card">
                            <div class="card border-0 shadow-sm hover-shadow mb-3">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div
                                            class="col-md-2 p-3 text-center border-end d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                                alt="Praxislogo" class="img-fluid" style="max-height: 80px;">
                                        </div>
                                        <div class="col-md-7 p-3">
                                            <span class="badge bg-info text-white mb-2">Teilzeit</span>
                                            <h5 class="mb-1"><a href="#"
                                                    class="job-title text-decoration-none">Rezeptionist/in für moderne
                                                    Zahnarztpraxis</a></h5>
                                            <p class="text-muted mb-2 company-name">
                                                <i class="fas fa-building me-1"></i> Zahnarztpraxis Dr. Müller
                                                <span class="ms-2 me-2">|</span>
                                                <i class="fas fa-map-marker-alt me-1"></i> 20354 Hamburg
                                            </p>
                                            <p class="job-snippet mb-0 small">Wir suchen zur Verstärkung unseres Teams
                                                eine/n freundliche/n und kompetente/n Rezeptionist/in (20-25 Std./Woche).
                                                Sie sind die erste Anlaufstelle für unsere Patienten und koordinieren die
                                                Terminvergabe.</p>
                                            <div class="mt-2 d-flex flex-wrap gap-2">
                                                <span class="badge bg-light text-dark">20-25 Std./Woche</span>
                                                <span class="badge bg-light text-dark">Patientenmanagement</span>
                                                <span class="badge bg-light text-dark">Praxissoftware</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-3 p-3 bg-light d-flex flex-column justify-content-between align-items-end">
                                            <span class="small text-muted"><i class="far fa-calendar-alt me-1"></i> Vor 1
                                                Tag</span>
                                            <a href="{{ route('job_details')}}" class="btn btn-primary btn-sm mt-auto">
                                                <i class="fas fa-external-link-alt me-1"></i> Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center my-4">
                        <button class="btn btn-outline-primary px-5">
                            <i class="fas fa-sync-alt me-2"></i> Weitere Stellenangebote laden
                        </button>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Seitennavigation" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link rounded-start" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-end" href="#">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Info-Box am Ende -->
                    <div class="card border-0 shadow-sm bg-primary text-white mt-5">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <h3 class="fw-bold mb-2">Selbst ein Stellenangebot veröffentlichen?</h3>
                                    <p class="mb-0">Als Zahnarztpraxis mit PraxisPlus-Paket können Sie unbegrenzt
                                        Stellenangebote veröffentlichen und tausende qualifizierte Fachkräfte in ganz
                                        Deutschland erreichen.</p>
                                </div>
                                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                                    <a href="{{ route('packages')}}" class="btn btn-light text-primary px-4 py-2 fw-medium shadow-sm">
                                        <i class="fas fa-plus-circle me-2"></i>Jetzt PraxisPlus buchen
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
