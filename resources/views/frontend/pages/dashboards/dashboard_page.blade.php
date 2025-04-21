@extends('frontend.layouts.master')
@section('content')
    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.css">

    <section class="py-4">
        <div class="container-fluid px-4">
            <!-- Dashboard Header -->
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <h1 class="h3 fw-bold text-primary mb-1">Praxis-Dashboard</h1>
                    <p class="text-muted">Willkommen zurück, Dr. Michael Schmidt</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <span class="badge bg-success me-2">Premium-Paket: PraxisPlus</span>
                    <span class="text-muted small">Letzte Aktualisierung: Heute, 08:47 Uhr</span>
                </div>
            </div>

            <div class="row">
                <!-- Linke Spalte: Navigation -->
                <div class="col-lg-3 mb-4">
                    <div class="card border-0 shadow-sm sticky-lg-top" style="top: 100px; z-index: 1000;">
                        <div class="list-group list-group-flush">
                            <a href="/zahnarzt-dashboard"
                                class="list-group-item list-group-item-action fw-medium active">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                            <a href="/zahnarzt-dashboard?page=landingpage"
                                class="list-group-item list-group-item-action fw-medium">
                                <i class="fas fa-globe me-2"></i> Landingpage
                            </a>
                            <a href="/zahnarzt-dashboard?page=praxisdaten"
                                class="list-group-item list-group-item-action fw-medium">
                                <i class="fas fa-clinic-medical me-2"></i> Praxisdaten
                            </a>
                            <a href="/zahnarzt-dashboard?page=termine"
                                class="list-group-item list-group-item-action fw-medium">
                                <i class="fas fa-calendar-alt me-2"></i> Terminverwaltung
                            </a>
                            <a href="/zahnarzt-dashboard?page=bewertungen"
                                class="list-group-item list-group-item-action fw-medium">
                                <i class="fas fa-star me-2"></i> Bewertungen
                            </a>
                            <a href="/zahnarzt-dashboard?page=abo"
                                class="list-group-item list-group-item-action fw-medium">
                                <i class="fas fa-tags me-2"></i> Abo & Pakete
                            </a>
                            <a href="/zahnarzt-dashboard?page=stellenangebote"
                                class="list-group-item list-group-item-action fw-medium">
                                <i class="fas fa-briefcase me-2"></i> Stellenangebote
                            </a>
                        </div>
                    </div>

                    <!-- Profil-Box -->
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend/assets/images/dashboard/team-member-1.jpg') }}"
                                    alt="Dr. Schmidt" class="rounded-circle me-3" width="40" height="40">
                                <div>
                                    <h6 class="mb-0">Dr. Michael Schmidt</h6>
                                    <small class="text-muted">Praxisinhaber</small>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-sm btn-light border-0" type="button" id="profileDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-2"></i>
                                                Profil bearbeiten</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>
                                                Einstellungen</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="fas fa-sign-out-alt me-2"></i> Ausloggen</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support-Box -->
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3"><i class="fas fa-headset me-2 text-primary"></i>Support</h5>
                            <p class="small text-muted mb-3">Haben Sie Fragen oder benötigen Hilfe?</p>
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-book me-1"></i> Hilfebereich
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-envelope me-1"></i> Kontakt aufnehmen
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rechte Spalte: Dashboard-Inhalte -->
                <div class="col-lg-9">
                    <!-- Main Dashboard Content -->
                    <div id="dashboard-main">
                        <!-- Quick Stats Row -->
                        <div class="row g-3 mb-4">
                            <!-- Anrufe (früher: Patienten) -->
                            <div class="col-md-6 col-xl-3">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="stat-icon-circle bg-light-primary">
                                                    <i class="fas fa-phone-alt text-primary"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="card-title text-muted mb-0">Anrufe</h6>
                                                <h4 class="fw-bold mb-0">1.847</h4>
                                            </div>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%;"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-success">
                                                <i class="fas fa-arrow-up me-1"></i> +8% im letzten Monat
                                            </small>
                                            <small class="text-muted">72% Ziel erreicht</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Termine heute -->
                            <div class="col-md-6 col-xl-3">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="stat-icon-circle bg-light-info">
                                                    <i class="fas fa-calendar-check text-info"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="card-title text-muted mb-0">Termine heute</h6>
                                                <h4 class="fw-bold mb-0">24</h4>
                                            </div>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%;"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-muted">
                                                <i class="fas fa-check-circle me-1"></i> 14 bestätigt
                                            </small>
                                            <small class="text-info">
                                                Noch 2 freie Slots
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Website Weiterleitung (früher: Auslastung) -->
                            <div class="col-md-6 col-xl-3">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="stat-icon-circle bg-light-success">
                                                    <i class="fas fa-external-link-alt text-success"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="card-title text-muted mb-0">Website Weiterleitung</h6>
                                                <h4 class="fw-bold mb-0">93%</h4>
                                            </div>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 93%;"
                                                aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-success">
                                                <i class="fas fa-arrow-up me-1"></i> +4% gegenüber Vormonat
                                            </small>
                                            <small class="text-success">Optimal</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bewertungen -->
                            <div class="col-md-6 col-xl-3">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="stat-icon-circle bg-light-warning">
                                                    <i class="fas fa-star text-warning"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="card-title text-muted mb-0">Bewertungen</h6>
                                                <h4 class="fw-bold mb-0">4.8 <small class="text-muted fs-6">/ 5</small>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 96%;"
                                                aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <small class="text-muted">
                                                <i class="fas fa-comment me-1"></i> 287 Bewertungen
                                            </small>
                                            <small class="text-warning">
                                                <i class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i><i
                                                    class="fas fa-star me-1"></i><i class="fas fa-star me-1"></i><i
                                                    class="fas fa-star-half-alt"></i>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Linke Spalte (8/12) -->
                            <div class="col-xl-8 mb-4">
                                <!-- Terminkalender -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div
                                        class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                        <h5 class="card-title m-0 fw-bold">
                                            <i class="fas fa-calendar-alt me-2 text-primary"></i>Terminübersicht
                                        </h5>
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary active">Tag</button>
                                            <button type="button" class="btn btn-sm btn-outline-primary">Woche</button>
                                            <button type="button" class="btn btn-sm btn-outline-primary">Monat</button>
                                        </div>
                                    </div>
                                    <div class="card-body p-2 p-sm-3">
                                        <div id="calendar" style="height: 480px;"></div>
                                    </div>
                                </div>

                                <!-- Umsatzentwicklung Chart -->
                                <div class="card border-0 shadow-sm">
                                    <div
                                        class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                        <h5 class="card-title m-0 fw-bold">
                                            <i class="fas fa-chart-line me-2 text-primary"></i>Umsatzentwicklung
                                        </h5>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                type="button" id="revenueTimeRange" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Letzten 6 Monate
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="revenueTimeRange">
                                                <li><a class="dropdown-item" href="#">Letzten 30 Tage</a></li>
                                                <li><a class="dropdown-item active" href="#">Letzten 6 Monate</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Letztes Jahr</a></li>
                                                <li><a class="dropdown-item" href="#">Alle Zeiten</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="revenueChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Rechte Spalte (4/12) -->
                            <div class="col-xl-4">
                                <!-- Heutige Termine -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div
                                        class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                        <h5 class="card-title m-0 fw-bold">
                                            <i class="fas fa-clock me-2 text-primary"></i>Heutige Termine
                                        </h5>
                                        <span class="badge bg-primary">24 Termine</span>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            <!-- Termin 1 (aktueller Termin) -->
                                            <div class="list-group-item p-3 current-appointment">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="badge bg-success">Aktuell</span>
                                                    <span class="fw-medium text-primary">09:00 - 09:30</span>
                                                </div>
                                                <h6 class="mb-1">Julia Meier</h6>
                                                <p class="small text-muted mb-0">
                                                    <span class="badge bg-light text-dark me-1">Kontrolle</span>
                                                    <span class="badge bg-light text-dark">Erste Behandlung</span>
                                                </p>
                                            </div>

                                            <!-- Termin 2 -->
                                            <div class="list-group-item p-3">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="badge bg-secondary">Nächster</span>
                                                    <span class="fw-medium text-primary">09:45 - 10:30</span>
                                                </div>
                                                <h6 class="mb-1">Thomas Schulz</h6>
                                                <p class="small text-muted mb-0">
                                                    <span class="badge bg-light text-dark me-1">Wurzelbehandlung</span>
                                                    <span class="badge bg-info text-white">Schmerzen</span>
                                                </p>
                                            </div>

                                            <!-- Termin 3 -->
                                            <div class="list-group-item p-3">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="text-muted small">#3</span>
                                                    <span class="fw-medium text-primary">10:45 - 11:15</span>
                                                </div>
                                                <h6 class="mb-1">Sarah Werner</h6>
                                                <p class="small text-muted mb-0">
                                                    <span class="badge bg-light text-dark me-1">Professionelle
                                                        Zahnreinigung</span>
                                                </p>
                                            </div>

                                            <!-- Termin 4 -->
                                            <div class="list-group-item p-3">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <span class="text-muted small">#4</span>
                                                    <span class="fw-medium text-primary">11:30 - 12:15</span>
                                                </div>
                                                <h6 class="mb-1">Michael Hoffmann</h6>
                                                <p class="small text-muted mb-0">
                                                    <span class="badge bg-light text-dark me-1">Füllungen</span>
                                                    <span class="badge bg-warning text-dark">Privatpatient</span>
                                                </p>
                                            </div>

                                            <!-- Weitere Termine anzeigen Link -->
                                            <div class="list-group-item p-3 text-center">
                                                <a href="#" class="text-decoration-none">Alle heutigen Termine
                                                    anzeigen</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Benachrichtigungen -->
                                <div class="card border-0 shadow-sm mb-4">
                                    <div
                                        class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                        <h5 class="card-title m-0 fw-bold">
                                            <i class="fas fa-bell me-2 text-primary"></i>Benachrichtigungen
                                        </h5>
                                        <span class="badge bg-danger">3 Neu</span>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            <a href="#" class="list-group-item list-group-item-action p-3">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <span class="badge bg-danger">Neu</span>
                                                    <small class="text-muted">Vor 25 Min.</small>
                                                </div>
                                                <p class="mb-0 fw-medium">Terminerinnerungen für morgen wurden versendet
                                                </p>
                                                <small class="text-muted">23 Patienten wurden benachrichtigt</small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action p-3">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <span class="badge bg-danger">Neu</span>
                                                    <small class="text-muted">Vor 1 Std.</small>
                                                </div>
                                                <p class="mb-0 fw-medium">Neue Onlinebewertung: 5 Sterne</p>
                                                <small class="text-muted">Von: Maria K. - "Sehr zufrieden mit der
                                                    Behandlung..."</small>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action p-3">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <span class="badge bg-danger">Neu</span>
                                                    <small class="text-muted">Vor 2 Std.</small>
                                                </div>
                                                <p class="mb-0 fw-medium">Materialbestand niedrig: Abformmaterial</p>
                                                <small class="text-muted">Verbleibend: 2 Packungen</small>
                                            </a>
                                            <a href="#"
                                                class="list-group-item list-group-item-action p-3 text-center">
                                                Alle Benachrichtigungen anzeigen
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Landingpage Content -->
                    <div id="landingpage-content" class="dashboard-content">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <h5 class="card-title m-0 fw-bold">
                                    <i class="fas fa-globe me-2 text-primary"></i>Landingpage-Verwaltung
                                </h5>
                                <div>
                                    <a href="/praxis-landingpage/zahnärzte-am-stadtplatz-berlin" target="_blank"
                                        class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-external-link-alt me-1"></i> Vorschau
                                    </a>
                                    <button class="btn btn-sm btn-success">
                                        <i class="fas fa-cloud-upload-alt me-1"></i> Veröffentlichen
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle me-2"></i> Hier können Sie Ihre individuelle
                                    Premium-Landingpage gestalten und verwalten. Alle Änderungen werden zunächst im
                                    Vorschaumodus gespeichert.
                                </div>

                                <!-- Vorschau und Design-Auswahl -->
                                <div class="row mb-4">
                                    <div class="col-lg-9">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body p-2">
                                                <img src="{{ asset('frontend/assets/images/dashboard/landingpage-preview.jpg') }}"
                                                    alt="Landingpage Vorschau" class="img-fluid rounded border">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card border-0 shadow-sm h-100">
                                            <div class="card-body">
                                                <h6 class="fw-bold mb-3">Design-Einstellungen</h6>

                                                <div class="mb-3">
                                                    <label class="form-label">Template-Auswahl</label>
                                                    <select class="form-select">
                                                        <option selected>Modern (aktuell)</option>
                                                        <option>Klassisch</option>
                                                        <option>Minimalistisch</option>
                                                        <option>Premium Plus</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Farbschema</label>
                                                    <div class="d-flex gap-2 mb-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="farbschema" id="farbeBlau" checked>
                                                            <label class="form-check-label" for="farbeBlau">
                                                                <span class="d-inline-block rounded-circle"
                                                                    style="width: 20px; height: 20px; background-color: #40bfd8;"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="farbschema" id="farbeGruen">
                                                            <label class="form-check-label" for="farbeGruen">
                                                                <span class="d-inline-block rounded-circle"
                                                                    style="width: 20px; height: 20px; background-color: #28a745;"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="farbschema" id="farbeViolett">
                                                            <label class="form-check-label" for="farbeViolett">
                                                                <span class="d-inline-block rounded-circle"
                                                                    style="width: 20px; height: 20px; background-color: #6f42c1;"></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="farbschema" id="farbeTeal">
                                                            <label class="form-check-label" for="farbeTeal">
                                                                <span class="d-inline-block rounded-circle"
                                                                    style="width: 20px; height: 20px; background-color: #20c997;"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Header-Stil</label>
                                                    <select class="form-select">
                                                        <option selected>Bild mit Overlay</option>
                                                        <option>Video-Hintergrund</option>
                                                        <option>Minimalistisch</option>
                                                    </select>
                                                </div>

                                                <button class="btn btn-primary w-100">Design anwenden</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion für die Sektionen -->
                                <div class="accordion mb-4" id="landingpageAccordion">
                                    <!-- Header-Sektion -->
                                    <div class="accordion-item border-0 shadow-sm mb-3">
                                        <h2 class="accordion-header" id="headingHeader">
                                            <button class="accordion-button fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseHeader"
                                                aria-expanded="true" aria-controls="collapseHeader">
                                                <i class="fas fa-image me-2 text-primary"></i> Header-Bereich
                                            </button>
                                        </h2>
                                        <div id="collapseHeader" class="accordion-collapse collapse show"
                                            aria-labelledby="headingHeader" data-bs-parent="#landingpageAccordion">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="headerTitle"
                                                            class="form-label">Hauptüberschrift</label>
                                                        <input type="text" class="form-control" id="headerTitle"
                                                            value="Zahnärzte am Stadtplatz - Ihre moderne Zahnarztpraxis in Berlin">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="headerSubtitle"
                                                            class="form-label">Unterüberschrift</label>
                                                        <input type="text" class="form-control" id="headerSubtitle"
                                                            value="Kompetente Behandlung mit modernster Technik in angenehmer Atmosphäre">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="headerButtonText"
                                                            class="form-label">Button-Text</label>
                                                        <input type="text" class="form-control" id="headerButtonText"
                                                            value="Termin vereinbaren">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="headerButtonLink"
                                                            class="form-label">Button-Link</label>
                                                        <input type="text" class="form-control" id="headerButtonLink"
                                                            value="/termine">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Header-Bild</label>
                                                        <div class="d-flex align-items-center border rounded p-2">
                                                            <img src="{{ asset('frontend/assets/images/dashboard/landingpage-header.jpg') }}"
                                                                alt="Header Bild" class="img-fluid me-2"
                                                                style="max-height: 100px;">
                                                            <div class="flex-grow-1">
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control"
                                                                        id="headerImage">
                                                                    <button class="btn btn-outline-secondary"
                                                                        type="button">Hochladen</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Über uns Sektion -->
                                    <div class="accordion-item border-0 shadow-sm mb-3">
                                        <h2 class="accordion-header" id="headingAbout">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseAbout"
                                                aria-expanded="false" aria-controls="collapseAbout">
                                                <i class="fas fa-info-circle me-2 text-primary"></i> Über uns
                                            </button>
                                        </h2>
                                        <div id="collapseAbout" class="accordion-collapse collapse"
                                            aria-labelledby="headingAbout" data-bs-parent="#landingpageAccordion">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="aboutTitle" class="form-label">Überschrift</label>
                                                        <input type="text" class="form-control" id="aboutTitle"
                                                            value="Willkommen in unserer Praxis">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="aboutSubtitle"
                                                            class="form-label">Unterüberschrift</label>
                                                        <input type="text" class="form-control" id="aboutSubtitle"
                                                            value="Moderne Zahnheilkunde in angenehmer Atmosphäre">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="aboutDescription"
                                                            class="form-label">Beschreibung</label>
                                                        <textarea class="form-control" id="aboutDescription" rows="5">Die Zahnarztpraxis "Zahnärzte am Stadtplatz" ist eine moderne Gemeinschaftspraxis im Herzen von Berlin-Mitte. Mit unserem Team aus 5 Zahnärzten und 12 Mitarbeitern bieten wir unseren Patienten das gesamte Spektrum der modernen Zahnmedizin. Digitale Technologien, neueste Behandlungsmethoden und ein freundliches Arbeitsklima zeichnen unsere Praxis aus.

Wir legen großen Wert auf eine angenehme Atmosphäre, in der Sie sich wohlfühlen können. Unser Ziel ist es, Ihnen die bestmögliche zahnmedizinische Versorgung zu bieten und Ihnen zu einem strahlenden Lächeln zu verhelfen.</textarea>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Bild für "Über uns"</label>
                                                        <div class="d-flex align-items-center border rounded p-2">
                                                            <img src="{{ asset('frontend/assets/images/dashboard/landingpage-about.jpg') }}"
                                                                alt="Über uns Bild" class="img-fluid me-2"
                                                                style="max-height: 100px;">
                                                            <div class="flex-grow-1">
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control"
                                                                        id="aboutImage">
                                                                    <button class="btn btn-outline-secondary"
                                                                        type="button">Hochladen</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Leistungen Sektion -->
                                    <div class="accordion-item border-0 shadow-sm mb-3">
                                        <h2 class="accordion-header" id="headingServices">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseServices"
                                                aria-expanded="false" aria-controls="collapseServices">
                                                <i class="fas fa-tooth me-2 text-primary"></i> Leistungen
                                            </button>
                                        </h2>
                                        <div id="collapseServices" class="accordion-collapse collapse"
                                            aria-labelledby="headingServices" data-bs-parent="#landingpageAccordion">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h6 class="fw-bold mb-0">Leistungen bearbeiten</h6>
                                                        <button class="btn btn-sm btn-primary">
                                                            <i class="fas fa-plus me-1"></i> Neue Leistung
                                                        </button>
                                                    </div>

                                                    <!-- Leistungen Liste -->
                                                    <div class="list-group">
                                                        <!-- Leistung 1 -->
                                                        <div class="list-group-item list-group-item-action p-3">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-2">
                                                                <h6 class="mb-0 fw-bold">
                                                                    <i class="fas fa-tooth text-primary me-2"></i>
                                                                    Prophylaxe & Zahnreinigung
                                                                </h6>
                                                                <div>
                                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                    <button class="btn btn-sm btn-outline-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0 small text-muted">Professionelle Zahnreinigung
                                                                und individuelles Prophylaxe-Programm für gesunde Zähne.</p>
                                                        </div>

                                                        <!-- Leistung 2 -->
                                                        <div class="list-group-item list-group-item-action p-3">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-2">
                                                                <h6 class="mb-0 fw-bold">
                                                                    <i class="fas fa-teeth text-primary me-2"></i>
                                                                    Implantologie
                                                                </h6>
                                                                <div>
                                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                    <button class="btn btn-sm btn-outline-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0 small text-muted">Hochwertige Zahnimplantate für
                                                                festsitzenden Zahnersatz und ein natürliches Lächeln.</p>
                                                        </div>

                                                        <!-- Leistung 3 -->
                                                        <div class="list-group-item list-group-item-action p-3">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-2">
                                                                <h6 class="mb-0 fw-bold">
                                                                    <i class="fas fa-smile text-primary me-2"></i>
                                                                    Ästhetische Zahnheilkunde
                                                                </h6>
                                                                <div>
                                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                                        <i class="fas fa-edit"></i>
                                                                    </button>
                                                                    <button class="btn btn-sm btn-outline-danger">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0 small text-muted">Veneers, Bleaching und
                                                                Zahnformkorrekturen für ein strahlendes Lächeln.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Team Sektion -->
                                    <div class="accordion-item border-0 shadow-sm mb-3">
                                        <h2 class="accordion-header" id="headingTeam">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTeam"
                                                aria-expanded="false" aria-controls="collapseTeam">
                                                <i class="fas fa-user-md me-2 text-primary"></i> Unser Team
                                            </button>
                                        </h2>
                                        <div id="collapseTeam" class="accordion-collapse collapse"
                                            aria-labelledby="headingTeam" data-bs-parent="#landingpageAccordion">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h6 class="fw-bold mb-0">Team-Mitglieder bearbeiten</h6>
                                                        <button class="btn btn-sm btn-primary">
                                                            <i class="fas fa-plus me-1"></i> Neues Mitglied
                                                        </button>
                                                    </div>

                                                    <!-- Team-Mitglieder Liste -->
                                                    <div class="row g-3">
                                                        <!-- Mitglied 1 -->
                                                        <div class="col-md-6 col-xl-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body p-3">
                                                                    <div class="d-flex mb-3">
                                                                        <img src="{{ asset('frontend/assets/images/dashboard/team-member-1.jpg') }}"
                                                                            class="rounded-circle me-3" width="60"
                                                                            height="60" alt="Dr. Michael Schmidt">
                                                                        <div>
                                                                            <h6 class="card-title mb-1 fw-bold">Dr. Michael
                                                                                Schmidt</h6>
                                                                            <p class="card-subtitle text-muted mb-0">
                                                                                Zahnarzt / Inhaber</p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="card-text small">Facharzt für Implantologie
                                                                        mit über 15 Jahren Erfahrung. Leitet die Praxis seit
                                                                        2008.</p>
                                                                    <div class="d-flex justify-content-end mt-3">
                                                                        <button
                                                                            class="btn btn-sm btn-outline-primary me-1">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button class="btn btn-sm btn-outline-danger">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Mitglied 2 -->
                                                        <div class="col-md-6 col-xl-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body p-3">
                                                                    <div class="d-flex mb-3">
                                                                        <img src="{{ asset('frontend/assets/images/dashboard/team-member-2.jpg') }}"
                                                                            class="rounded-circle me-3" width="60"
                                                                            height="60" alt="Dr. Sandra Klein">
                                                                        <div>
                                                                            <h6 class="card-title mb-1 fw-bold">Dr. Sandra
                                                                                Klein</h6>
                                                                            <p class="card-subtitle text-muted mb-0">
                                                                                Zahnärztin</p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="card-text small">Spezialistin für ästhetische
                                                                        Zahnheilkunde und Kinderzahnheilkunde. Teil unseres
                                                                        Teams seit 2015.</p>
                                                                    <div class="d-flex justify-content-end mt-3">
                                                                        <button
                                                                            class="btn btn-sm btn-outline-primary me-1">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button class="btn btn-sm btn-outline-danger">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Mitglied 3 -->
                                                        <div class="col-md-6 col-xl-4">
                                                            <div class="card h-100 border-0 shadow-sm">
                                                                <div class="card-body p-3">
                                                                    <div class="d-flex mb-3">
                                                                        <img src="{{ asset('frontend/assets/images/dashboard/team-member-3.jpg') }}"
                                                                            class="rounded-circle me-3" width="60"
                                                                            height="60" alt="Maria Wagner">
                                                                        <div>
                                                                            <h6 class="card-title mb-1 fw-bold">Maria
                                                                                Wagner</h6>
                                                                            <p class="card-subtitle text-muted mb-0">ZFA /
                                                                                Prophylaxe</p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="card-text small">Expertin für professionelle
                                                                        Zahnreinigung und Prophylaxe mit langjähriger
                                                                        Erfahrung.</p>
                                                                    <div class="d-flex justify-content-end mt-3">
                                                                        <button
                                                                            class="btn btn-sm btn-outline-primary me-1">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button class="btn btn-sm btn-outline-danger">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kontakt & Öffnungszeiten Sektion -->
                                    <div class="accordion-item border-0 shadow-sm mb-3">
                                        <h2 class="accordion-header" id="headingContact">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseContact"
                                                aria-expanded="false" aria-controls="collapseContact">
                                                <i class="fas fa-map-marker-alt me-2 text-primary"></i> Kontakt &
                                                Öffnungszeiten
                                            </button>
                                        </h2>
                                        <div id="collapseContact" class="accordion-collapse collapse"
                                            aria-labelledby="headingContact" data-bs-parent="#landingpageAccordion">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="contactTitle" class="form-label">Überschrift</label>
                                                        <input type="text" class="form-control" id="contactTitle"
                                                            value="Kontakt & Anfahrt">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="contactSubtitle"
                                                            class="form-label">Unterüberschrift</label>
                                                        <input type="text" class="form-control" id="contactSubtitle"
                                                            value="So erreichen Sie uns">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="contactForm" class="form-label">Kontaktformular
                                                                aktivieren</label>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="contactForm" checked>
                                                                <label class="form-check-label" for="contactForm">Formular
                                                                    anzeigen</label>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="contactMap" class="form-label">Karte
                                                                anzeigen</label>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="contactMap" checked>
                                                                <label class="form-check-label" for="contactMap">Google
                                                                    Maps einbinden</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Öffnungszeiten einblenden</label>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="showHours" checked>
                                                                <label class="form-check-label"
                                                                    for="showHours">Öffnungszeiten anzeigen</label>
                                                            </div>
                                                        </div>
                                                        <div class="alert alert-light p-2 mb-0">
                                                            <small class="text-muted">Die Öffnungszeiten werden automatisch
                                                                aus Ihren Praxisdaten übernommen.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SEO-Einstellungen -->
                                    <div class="accordion-item border-0 shadow-sm mb-3">
                                        <h2 class="accordion-header" id="headingSEO">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSEO"
                                                aria-expanded="false" aria-controls="collapseSEO">
                                                <i class="fas fa-search me-2 text-primary"></i> SEO-Einstellungen
                                            </button>
                                        </h2>
                                        <div id="collapseSEO" class="accordion-collapse collapse"
                                            aria-labelledby="headingSEO" data-bs-parent="#landingpageAccordion">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="seoTitle" class="form-label">Meta-Titel (50-60
                                                            Zeichen)</label>
                                                        <input type="text" class="form-control" id="seoTitle"
                                                            value="Zahnärzte am Stadtplatz Berlin | Moderne Zahnarztpraxis im Zentrum">
                                                        <div class="form-text">Aktuell: 67 Zeichen</div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="seoKeywords" class="form-label">Keywords (durch Komma
                                                            getrennt)</label>
                                                        <input type="text" class="form-control" id="seoKeywords"
                                                            value="Zahnarzt Berlin, Zahnärzte am Stadtplatz, Implantate Berlin, Prophylaxe">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="seoDescription" class="form-label">Meta-Beschreibung
                                                            (150-160 Zeichen)</label>
                                                        <textarea class="form-control" id="seoDescription" rows="3">Ihre moderne Zahnarztpraxis in Berlin-Mitte. Wir bieten das gesamte Spektrum der Zahnmedizin: Prophylaxe, Implantologie, ästhetische Zahnheilkunde und mehr. Jetzt Termin vereinbaren!</textarea>
                                                        <div class="form-text">Aktuell: 157 Zeichen</div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="seoSlug" class="form-label">URL-Pfad (Slug)</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">dentalax.de/praxis/</span>
                                                            <input type="text" class="form-control" id="seoSlug"
                                                                value="zahnärzte-am-stadtplatz-berlin">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-light">Zurücksetzen</button>
                                    <div>
                                        <button class="btn btn-primary me-2">
                                            <i class="fas fa-save me-1"></i> Speichern
                                        </button>
                                        <button class="btn btn-success">
                                            <i class="fas fa-cloud-upload-alt me-1"></i> Veröffentlichen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Praxisdaten Content -->
                    <div id="praxisdaten-content" class="dashboard-content">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="card-title m-0 fw-bold">
                                    <i class="fas fa-clinic-medical me-2 text-primary"></i>Praxisdaten
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle me-2"></i> Hier können Sie Ihre Praxisdaten verwalten und
                                    aktualisieren.
                                </div>

                                <form>
                                    <div class="row mb-4">
                                        <div class="col-12 mb-3">
                                            <h6 class="fw-bold">Praxisangaben</h6>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="praxisname" class="form-label">Praxisname *</label>
                                            <input type="text" class="form-control" id="praxisname"
                                                value="Zahnärzte am Stadtplatz" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="gruendungsjahr" class="form-label">Gründungsjahr</label>
                                            <input type="text" class="form-control" id="gruendungsjahr"
                                                value="2008">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="praxisbeschreibung" class="form-label">Praxisbeschreibung</label>
                                            <textarea class="form-control" id="praxisbeschreibung" rows="4">Die Zahnarztpraxis "Zahnärzte am Stadtplatz" ist eine moderne Gemeinschaftspraxis im Herzen von Berlin-Mitte. Mit unserem Team aus 5 Zahnärzten und 12 Mitarbeitern bieten wir unseren Patienten das gesamte Spektrum der modernen Zahnmedizin. Digitale Technologien, neueste Behandlungsmethoden und ein freundliches Arbeitsklima zeichnen unsere Praxis aus.</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-12 mb-3">
                                            <h6 class="fw-bold">Kontaktdaten</h6>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="strasse" class="form-label">Straße und Hausnummer *</label>
                                            <input type="text" class="form-control" id="strasse"
                                                value="Friedrichstraße 120" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="plz" class="form-label">PLZ *</label>
                                            <input type="text" class="form-control" id="plz" value="10115"
                                                required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="ort" class="form-label">Ort *</label>
                                            <input type="text" class="form-control" id="ort" value="Berlin"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefon" class="form-label">Telefon *</label>
                                            <input type="tel" class="form-control" id="telefon"
                                                value="030 123456789" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">E-Mail *</label>
                                            <input type="email" class="form-control" id="email"
                                                value="info@zahnaerzte-stadtplatz.de" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="webseite" class="form-label">Webseite</label>
                                            <input type="url" class="form-control" id="webseite"
                                                value="https://www.zahnaerzte-stadtplatz.de">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="maps" class="form-label">Google Maps Eintrag</label>
                                            <input type="url" class="form-control" id="maps"
                                                value="https://goo.gl/maps/...">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-12 mb-3">
                                            <h6 class="fw-bold">Öffnungszeiten</h6>
                                        </div>
                                        <!-- Montag -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Montag</label>
                                            <div class="input-group">
                                                <input type="time" class="form-control" value="08:00">
                                                <span class="input-group-text">-</span>
                                                <input type="time" class="form-control" value="18:00">
                                                <div class="form-check ms-3 d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="montagGeschlossen">
                                                    <label class="form-check-label ms-2"
                                                        for="montagGeschlossen">Geschlossen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Dienstag -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Dienstag</label>
                                            <div class="input-group">
                                                <input type="time" class="form-control" value="08:00">
                                                <span class="input-group-text">-</span>
                                                <input type="time" class="form-control" value="18:00">
                                                <div class="form-check ms-3 d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="dienstagGeschlossen">
                                                    <label class="form-check-label ms-2"
                                                        for="dienstagGeschlossen">Geschlossen</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Weitere Tage... -->
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light me-2">Zurücksetzen</button>
                                        <button type="submit" class="btn btn-primary">Praxisdaten speichern</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Terminverwaltung Content -->
                    <div id="termine-content" class="dashboard-content">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="card-title m-0 fw-bold">
                                    <i class="fas fa-calendar-alt me-2 text-primary"></i>Terminverwaltung
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info" role="alert">
                                    <i class="fas fa-info-circle me-2"></i> Hier können Sie Termineinstellungen verwalten
                                    und Ihre Terminbuchung konfigurieren.
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 mb-3">
                                        <div class="card border-0 bg-light">
                                            <div class="card-body">
                                                <h6 class="fw-bold">Buchungsmethode auswählen</h6>
                                                <div class="row g-3 mt-2">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="buchungsmethode" id="methodeIntegriert" checked>
                                                            <label class="form-check-label" for="methodeIntegriert">
                                                                <i class="fas fa-desktop me-1 text-primary"></i>
                                                                Integrierte Buchung
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="buchungsmethode" id="methodeExtern">
                                                            <label class="form-check-label" for="methodeExtern">
                                                                <i class="fas fa-external-link-alt me-1 text-primary"></i>
                                                                Externe Buchung
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="buchungsmethode" id="methodeFormular">
                                                            <label class="form-check-label" for="methodeFormular">
                                                                <i class="fas fa-envelope me-1 text-primary"></i>
                                                                Anfrage-Formular
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="buchungsmethode" id="methodeApi">
                                                            <label class="form-check-label" for="methodeApi">
                                                                <i class="fas fa-code me-1 text-primary"></i>
                                                                API-Integration
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body p-0">
                                                <div class="p-4 border-bottom">
                                                    <h5 class="fw-bold">Terminbuchungseinstellungen</h5>
                                                    <p class="text-muted small">Hier können Sie die Einstellungen für Ihre
                                                        Online-Terminbuchung anpassen.</p>

                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="terminDauer"
                                                                class="form-label">Standard-Termindauer</label>
                                                            <select class="form-select" id="terminDauer">
                                                                <option>15 Minuten</option>
                                                                <option selected>30 Minuten</option>
                                                                <option>45 Minuten</option>
                                                                <option>60 Minuten</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="terminVorlauf"
                                                                class="form-label">Mindestvorlaufzeit</label>
                                                            <select class="form-select" id="terminVorlauf">
                                                                <option>Keine</option>
                                                                <option>4 Stunden</option>
                                                                <option>12 Stunden</option>
                                                                <option selected>1 Tag</option>
                                                                <option>2 Tage</option>
                                                                <option>3 Tage</option>
                                                                <option>1 Woche</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="terminBuchungsberechtigung"
                                                                class="form-label">Buchungsberechtigung</label>
                                                            <select class="form-select" id="terminBuchungsberechtigung">
                                                                <option selected>Alle (auch Neupatienten)</option>
                                                                <option>Nur Bestandspatienten</option>
                                                                <option>Manuell freischalten</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="terminBestaetigung"
                                                                class="form-label">Terminbestätigung</label>
                                                            <select class="form-select" id="terminBestaetigung">
                                                                <option>Keine Bestätigung erforderlich</option>
                                                                <option selected>Automatische Bestätigung</option>
                                                                <option>Manuelle Bestätigung</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="p-4 border-bottom">
                                                    <h5 class="fw-bold">Terminarten</h5>
                                                    <p class="text-muted small">Legen Sie fest, welche Arten von Terminen
                                                        online gebucht werden können.</p>

                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="terminKontrolle" checked>
                                                                <label class="form-check-label"
                                                                    for="terminKontrolle">Kontrolle / Check-up</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="terminPZR" checked>
                                                                <label class="form-check-label"
                                                                    for="terminPZR">Professionelle Zahnreinigung</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="terminErstberatung" checked>
                                                                <label class="form-check-label"
                                                                    for="terminErstberatung">Erstberatung</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="terminBehandlung">
                                                                <label class="form-check-label"
                                                                    for="terminBehandlung">Behandlung</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="terminNotfall">
                                                                <label class="form-check-label"
                                                                    for="terminNotfall">Notfalltermin</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="terminSonstige">
                                                                <label class="form-check-label"
                                                                    for="terminSonstige">Sonstige</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="p-4">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button"
                                                            class="btn btn-light me-2">Abbrechen</button>
                                                        <button type="button" class="btn btn-primary">Einstellungen
                                                            speichern</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bewertungen Content -->
                    <div id="bewertungen-content" class="dashboard-content">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <h5 class="card-title m-0 fw-bold">
                                    <i class="fas fa-star me-2 text-primary"></i>Bewertungen
                                </h5>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span class="fw-bold fs-4 me-2">4.8</span>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </div>
                                    <span class="badge bg-primary">287 Bewertungen</span>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <!-- Bewertung 1 -->
                                    <div class="list-group-item p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <div>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <span class="ms-2 fw-bold">5.0</span>
                                            </div>
                                            <small class="text-muted">03.04.2025</small>
                                        </div>
                                        <h6 class="mb-1">Maria K.</h6>
                                        <p class="mb-2">Ich bin mit der Behandlung sehr zufrieden. Das Team ist
                                            freundlich und kompetent. Die Praxis ist modern und sauber. Ich empfehle diese
                                            Zahnarztpraxis gerne weiter!</p>

                                        <div class="mt-3 border-top pt-3">
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-reply me-1"></i> Antworten
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-flag me-1"></i> Melden
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Bewertung 2 -->
                                    <div class="list-group-item p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <div>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="far fa-star text-warning"></i>
                                                <span class="ms-2 fw-bold">4.0</span>
                                            </div>
                                            <small class="text-muted">01.04.2025</small>
                                        </div>
                                        <h6 class="mb-1">Thomas M.</h6>
                                        <p class="mb-2">Gute Behandlung, aber etwas lange Wartezeiten. Die Beratung war
                                            ausführlich und kompetent. Würde die Praxis weiterempfehlen, aber mit dem
                                            Hinweis auf die Wartezeiten.</p>

                                        <div class="bg-light p-3 rounded mb-3">
                                            <h6 class="mb-1 text-primary">
                                                <i class="fas fa-reply me-1"></i> Antwort von Dr. Michael Schmidt
                                            </h6>
                                            <p class="mb-0 small">Vielen Dank für Ihr Feedback, Herr M. Wir entschuldigen
                                                uns für die Wartezeiten und arbeiten daran, diese zu verbessern. Danke für
                                                die freundlichen Worte zur Behandlung.</p>
                                        </div>

                                        <div class="mt-3 border-top pt-3">
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-reply me-1"></i> Antworten
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-flag me-1"></i> Melden
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Bewertung 3 -->
                                    <div class="list-group-item p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <div>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <i class="fas fa-star text-warning"></i>
                                                <span class="ms-2 fw-bold">5.0</span>
                                            </div>
                                            <small class="text-muted">28.03.2025</small>
                                        </div>
                                        <h6 class="mb-1">Lisa K.</h6>
                                        <p class="mb-2">Hervorragende Behandlung, sehr schmerzfrei und professionell!
                                            Das Team hat sich viel Zeit genommen, um alle Fragen zu beantworten. Die Praxis
                                            ist modern eingerichtet und sehr sauber.</p>

                                        <div class="mt-3 border-top pt-3">
                                            <button class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-reply me-1"></i> Antworten
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-flag me-1"></i> Melden
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Weitere Bewertungen anzeigen Link -->
                                    <div class="list-group-item p-3 text-center">
                                        <a href="#" class="text-decoration-none">Weitere Bewertungen anzeigen</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Abo Informationen Content -->
                    <div id="abo-content" class="dashboard-content">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="card-title m-0 fw-bold">
                                    <i class="fas fa-tags me-2 text-primary"></i>Abo & Pakete
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-success mb-4" role="alert">
                                    <div class="d-flex">
                                        <div class="me-3 fs-3">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div>
                                            <h5 class="alert-heading">Ihr aktuelles Paket: PraxisPlus</h5>
                                            <p class="mb-0">Sie haben das Premium-Paket mit allen verfügbaren
                                                Funktionen. Nächste Abrechnung: 06.05.2025</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12 mb-3">
                                        <h6 class="fw-bold">Paketdetails</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold text-primary mb-3">
                                                    <i class="fas fa-star me-2"></i>PraxisPlus
                                                </h5>
                                                <h6 class="fw-bold mb-3">
                                                    <span class="fs-2">79</span><sup>€</sup>
                                                    <span class="text-muted fw-normal fs-6">/ Monat</span>
                                                </h6>
                                                <p class="text-muted mb-4">Jährlich bezahlt: 59€/Monat (spare 240€/Jahr)
                                                </p>

                                                <ul class="list-group list-group-flush mb-4">
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i> Eigene
                                                        Praxis-Landingpage
                                                    </li>
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i> Premium-Platzierung
                                                        in Suchergebnissen
                                                    </li>
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i> Unbegrenzte
                                                        Stellenangebote schalten
                                                    </li>
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i>
                                                        Online-Terminbuchungssystem
                                                    </li>
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i>
                                                        Bewertungsmanagement
                                                    </li>
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i> API-Zugang für
                                                        Praxissoftware
                                                    </li>
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i> Statistiken und
                                                        Reports
                                                    </li>
                                                    <li class="list-group-item border-0 px-0 py-2">
                                                        <i class="fas fa-check text-success me-2"></i> Premium Support
                                                    </li>
                                                </ul>

                                                <div class="d-grid">
                                                    <button class="btn btn-success" disabled>Ihr aktuelles Paket</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card h-100 border-0 bg-light">
                                            <div class="card-body">
                                                <h6 class="fw-bold mb-3">Abrechnungsdetails</h6>

                                                <dl class="row mb-0">
                                                    <dt class="col-sm-6">Paket:</dt>
                                                    <dd class="col-sm-6">PraxisPlus</dd>

                                                    <dt class="col-sm-6">Abrechnungszeitraum:</dt>
                                                    <dd class="col-sm-6">Monatlich</dd>

                                                    <dt class="col-sm-6">Nächste Abrechnung:</dt>
                                                    <dd class="col-sm-6">06.05.2025</dd>

                                                    <dt class="col-sm-6">Betrag:</dt>
                                                    <dd class="col-sm-6">79,00 €</dd>

                                                    <dt class="col-sm-6">Zahlungsmethode:</dt>
                                                    <dd class="col-sm-6">Kreditkarte (VISA ****4281)</dd>
                                                </dl>

                                                <hr class="my-4">

                                                <h6 class="fw-bold mb-3">Optionen</h6>

                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-outline-primary">
                                                        <i class="fas fa-exchange-alt me-1"></i> Paket ändern
                                                    </button>
                                                    <button class="btn btn-outline-primary">
                                                        <i class="fas fa-credit-card me-1"></i> Zahlungsmethode ändern
                                                    </button>
                                                    <button class="btn btn-outline-primary">
                                                        <i class="fas fa-file-invoice me-1"></i> Rechnungen anzeigen
                                                    </button>
                                                    <button class="btn btn-outline-danger">
                                                        <i class="fas fa-times-circle me-1"></i> Abo kündigen
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stellenangebote Content -->
                    <div id="stellenangebote-content" class="dashboard-content">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <h5 class="card-title m-0 fw-bold">
                                    <i class="fas fa-briefcase me-2 text-primary"></i>Stellenangebote
                                </h5>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i> Neues Stellenangebot
                                </button>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Titel</th>
                                                <th scope="col">Position</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Veröffentlicht am</th>
                                                <th scope="col">Bewerbungen</th>
                                                <th scope="col">Aktionen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#"
                                                        class="fw-medium text-decoration-none">Zahnmedizinische/r
                                                        Fachangestellte/r (ZFA)</a>
                                                </td>
                                                <td>ZFA</td>
                                                <td><span class="badge bg-success">Aktiv</span></td>
                                                <td>02.04.2025</td>
                                                <td><span class="badge bg-primary">3</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#"
                                                        class="fw-medium text-decoration-none">Zahnmedizinische/r
                                                        Prophylaxeassistent/in (ZMP)</a>
                                                </td>
                                                <td>ZMP</td>
                                                <td><span class="badge bg-success">Aktiv</span></td>
                                                <td>01.04.2025</td>
                                                <td><span class="badge bg-primary">1</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="fw-medium text-decoration-none">Ausbildung
                                                        zum/zur Zahnmedizinischen Fachangestellten</a>
                                                </td>
                                                <td>Azubi</td>
                                                <td><span class="badge bg-warning text-dark">Entwurf</span></td>
                                                <td>-</td>
                                                <td><span class="badge bg-secondary">0</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white py-3">
                                <h5 class="card-title m-0 fw-bold">
                                    <i class="fas fa-file-alt me-2 text-primary"></i>Bewerbungen
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Stellenangebot</th>
                                                <th scope="col">Eingegangen am</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aktionen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-2">
                                                            <h6 class="mb-0">Julia Meier</h6>
                                                            <small class="text-muted">julia.meier@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Zahnmedizinische/r Fachangestellte/r (ZFA)</td>
                                                <td>05.04.2025</td>
                                                <td><span class="badge bg-warning text-dark">Neu</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-2">
                                                            <h6 class="mb-0">Thomas Müller</h6>
                                                            <small class="text-muted">thomas.mueller@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Zahnmedizinische/r Fachangestellte/r (ZFA)</td>
                                                <td>04.04.2025</td>
                                                <td><span class="badge bg-primary">In Bearbeitung</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-2">
                                                            <h6 class="mb-0">Anna Schmidt</h6>
                                                            <small class="text-muted">anna.schmidt@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Zahnmedizinische/r Prophylaxeassistent/in (ZMP)</td>
                                                <td>03.04.2025</td>
                                                <td><span class="badge bg-success">Zum Gespräch eingeladen</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

    <!-- Dashboard Initializations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kalender initialisieren
            var calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridDay',
                    slotMinTime: '08:00:00',
                    slotMaxTime: '18:00:00',
                    headerToolbar: {
                        left: '',
                        center: 'title',
                        right: 'prev,next today'
                    },
                    locale: 'de',
                    height: 'auto',
                    allDaySlot: false,
                    slotDuration: '00:15:00',
                    timeZone: 'local',
                    dayHeaderFormat: {
                        weekday: 'long',
                        day: 'numeric',
                        month: 'long'
                    },
                    events: [{
                            title: 'Julia Meier - Kontrolle',
                            start: '2025-04-06T09:00:00',
                            end: '2025-04-06T09:30:00',
                            backgroundColor: '#28a745',
                            borderColor: '#28a745'
                        },
                        {
                            title: 'Thomas Schulz - Wurzelbehandlung',
                            start: '2025-04-06T09:45:00',
                            end: '2025-04-06T10:30:00',
                            backgroundColor: '#17a2b8',
                            borderColor: '#17a2b8'
                        },
                        {
                            title: 'Sarah Werner - PZR',
                            start: '2025-04-06T10:45:00',
                            end: '2025-04-06T11:15:00',
                            backgroundColor: '#28a745',
                            borderColor: '#28a745'
                        },
                        {
                            title: 'Michael Hoffmann - Füllungen',
                            start: '2025-04-06T11:30:00',
                            end: '2025-04-06T12:15:00',
                            backgroundColor: '#ffc107',
                            borderColor: '#ffc107'
                        },
                        {
                            title: 'Mittagspause',
                            start: '2025-04-06T12:30:00',
                            end: '2025-04-06T13:30:00',
                            backgroundColor: '#6c757d',
                            borderColor: '#6c757d'
                        },
                        {
                            title: 'Frank Weber - Beratung',
                            start: '2025-04-06T13:45:00',
                            end: '2025-04-06T14:15:00',
                            backgroundColor: '#007bff',
                            borderColor: '#007bff'
                        },
                        {
                            title: 'Anja Klein - Krone einsetzen',
                            start: '2025-04-06T14:30:00',
                            end: '2025-04-06T15:15:00',
                            backgroundColor: '#28a745',
                            borderColor: '#28a745'
                        },
                        {
                            title: 'Peter Schwarz - Kontrolle',
                            start: '2025-04-06T15:30:00',
                            end: '2025-04-06T16:00:00',
                            backgroundColor: '#28a745',
                            borderColor: '#28a745'
                        },
                        {
                            title: 'Lisa Meyer - PZR',
                            start: '2025-04-06T16:15:00',
                            end: '2025-04-06T16:45:00',
                            backgroundColor: '#28a745',
                            borderColor: '#28a745'
                        },
                        {
                            title: 'Klaus Fischer - Beratung Implantate',
                            start: '2025-04-06T17:00:00',
                            end: '2025-04-06T17:30:00',
                            backgroundColor: '#007bff',
                            borderColor: '#007bff'
                        }
                    ]
                });
                calendar.render();
            }

            // Umsatz-Chart initialisieren
            var revenueCtx = document.getElementById('revenueChart');
            if (revenueCtx) {
                var revenueChart = new Chart(revenueCtx.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: ['Nov', 'Dez', 'Jan', 'Feb', 'März', 'Apr'],
                        datasets: [{
                                label: 'Gesamtumsatz',
                                data: [45200, 48500, 43800, 49900, 52300, 55100],
                                backgroundColor: 'rgba(64, 191, 216, 0.1)',
                                borderColor: '#40bfd8',
                                borderWidth: 3,
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Privatleistungen',
                                data: [18900, 20100, 19500, 22300, 24700, 26200],
                                backgroundColor: 'transparent',
                                borderColor: '#2a8294',
                                borderWidth: 2,
                                tension: 0.4,
                                borderDash: [5, 5]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                align: 'end'
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                callbacks: {
                                    label: function(context) {
                                        var label = context.dataset.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.parsed.y !== null) {
                                            label += new Intl.NumberFormat('de-DE', {
                                                style: 'currency',
                                                currency: 'EUR'
                                            }).format(context.parsed.y);
                                        }
                                        return label;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: false,
                                ticks: {
                                    callback: function(value) {
                                        return value.toLocaleString('de-DE') + ' €';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>

    <style>
        /* Dashboard Styles */
        .stat-icon-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .bg-light-primary {
            background-color: rgba(64, 191, 216, 0.15);
        }

        .bg-light-success {
            background-color: rgba(40, 167, 69, 0.15);
        }

        .bg-light-info {
            background-color: rgba(23, 162, 184, 0.15);
        }

        .bg-light-warning {
            background-color: rgba(255, 193, 7, 0.15);
        }

        .current-appointment {
            border-left: 4px solid #28a745;
            background-color: rgba(40, 167, 69, 0.05);
        }

        /* Navigation Styling */
        .list-group-item-action {
            padding: 0.75rem 1rem;
            border-radius: 0.25rem;
            margin-bottom: 0.25rem;
            border: none;
            transition: all 0.2s ease;
        }

        .list-group-item-action:hover,
        .list-group-item-action:focus {
            background-color: #f5f5f5;
            color: #40bfd8;
        }

        .list-group-item-action.active {
            background-color: #40bfd8;
            color: white;
        }

        /* Calendar Customizations */
        .fc-event {
            border-radius: 4px;
            padding: 2px 4px;
            font-size: 0.85rem;
        }

        .fc-theme-standard td,
        .fc-theme-standard th,
        .fc-theme-standard .fc-scrollgrid {
            border-color: #eee;
        }

        .fc .fc-timegrid-slot {
            height: 2.5em;
        }

        .fc .fc-button-primary {
            background-color: #40bfd8;
            border-color: #40bfd8;
        }

        .fc .fc-button-primary:hover {
            background-color: #2a8294;
            border-color: #2a8294;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:not(:disabled):active {
            background-color: #2a8294;
            border-color: #2a8294;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stat-icon-circle {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>

 @endsection
