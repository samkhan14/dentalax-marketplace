@extends('frontend.layouts.master')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Moderne Stilelemente für die Praxisseite */

        /* Kalender-Styles */
        .calendar-day {
            width: 100%;
            aspect-ratio: 1/1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            font-weight: 500;
            border: 1px solid transparent;
            border-radius: 8px;
            margin: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .calendar-day.clickable {
            cursor: pointer;
            transition: all 0.25s ease;
            background-color: #fff;
            user-select: none;
        }

        .calendar-day.clickable:hover {
            background-color: rgba(63, 191, 216, 0.1);
            border: 1px solid rgba(63, 191, 216, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(63, 191, 216, 0.1);
        }

        .calendar-day.active,
        .calendar-day.clickable.active {
            background-color: #3fbfd8 !important;
            color: white !important;
            font-weight: 600;
            border: 2px solid #3fbfd8 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(63, 191, 216, 0.25);
            z-index: 1;
            position: relative;
        }

        .calendar-day.inactive {
            color: #adb5bd;
            background-color: rgba(0, 0, 0, 0.02);
            box-shadow: none;
        }

        .availability-dot {
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .calendar-day:hover .availability-dot {
            transform: translateX(-50%) scale(1.2);
        }

        .availability-high {
            background-color: #28a745;
        }

        .availability-medium {
            background-color: #ffc107;
        }

        .availability-none {
            background-color: #e9ecef;
            border: 1px solid #dee2e6;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #3fbfd8, #2a8294);
            border-radius: 3px;
        }

        .section-title.text-center::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        /* Service Card Styles werden jetzt aus der globalen custom.css geladen */

        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: rgba(63, 191, 216, 0.1);
            color: #3fbfd8;
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background-color: #3fbfd8;
            color: white;
            transform: scale(1.1);
        }

        /* Glasmorphismus-Effekte */
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
        }

        /* Scrollbar verstecken aber Funktionalität beibehalten */
        .hide-scrollbar {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hover-effect {
            transition: transform 0.3s ease;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
        }
    </style>

    <!-- Hero-Section mit modernem Design -->
    <section class="position-relative overflow-hidden">
        <!-- Hintergrundbild mit Parallax-Effekt -->
        <div class="position-absolute w-100 h-100"
            style="background: linear-gradient(120deg, rgba(42,130,148,0.5), rgba(63,191,216,0.4)), url('{{ asset('frontend/assets/img/dental-hero.jpeg') }}') center center;
                background-size: cover; background-position: 50% 30%;">
        </div>

        <!-- Leerer Div für zukünftige UI-Elemente, Overlay wurde entfernt -->
        <div class="position-absolute w-100 h-100"></div>

        <!-- Content-Container mit verbessertem Layout -->
        <div class="container position-relative py-5">
            <div class="row min-vh-75 align-items-center py-5">
                <!-- Headline mit Animation -->
                <div class="col-lg-7 mb-5 mb-lg-0 text-center text-lg-start">
                    <div class="text-white mb-4 animate__animated animate__fadeInUp">
                        <span class="badge bg-white text-primary px-3 py-2 fs-6 fw-normal shadow-sm mb-3">Premium
                            Zahnarztpraxis</span>
                        <h1 class="display-3 fw-bold mb-3">Zahnarztpraxis Dr. Müller</h1>
                        <p class="lead fs-4 mb-4">Moderne Zahnmedizin in entspannter Atmosphäre</p>
                        <p class="mb-4">Zahnarztpraxis in Berlin mit modernem Konzept und patientenorientierter
                            Behandlung.</p>
                        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                            <a href="#termin" class="btn btn-light btn-lg shadow-sm">
                                <i class="fas fa-calendar-alt me-2"></i> Termin vereinbaren
                            </a>
                            <a href="#leistungen" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-info-circle me-2"></i> Leistungen entdecken
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Info-Karte mit glasigem Effekt -->
                <div class="col-lg-5">
                    <div class="card hover-lift animate__animated animate__fadeInRight"
                        style="border-radius: 16px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                        <div class="card-body p-4 p-xl-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="praxis-logo me-3">
                                    <img src="{{ asset('frontend/assets/images/Demo Mitarbeiter E.jpeg') }}"
                                        alt="Dentist Logo" class="rounded-circle shadow-sm"
                                        style="width: 90px; height: 90px; object-fit: cover; border: 3px solid #fff;">
                                </div>
                                <div>
                                    <h2 class="h4 fw-bold mb-0">Zahnarztpraxis Dr. Müller</h2>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="badge bg-success me-2 py-2 px-3">
                                            <i class="fas fa-check-circle me-1"></i> Verifiziert
                                        </span>
                                        <div class="d-flex align-items-center ms-2">
                                            <div class="text-warning me-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <span class="text-primary fw-bold">4.7</span>
                                            <span class="text-muted small ms-1">3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kontaktinformationen mit modernem Layout -->
                            <div class="card bg-light border-0 mb-4">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle me-3 d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; background-color: rgba(63, 191, 216, 0.1);">
                                            <i class="fas fa-map-marker-alt text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Adresse</div>
                                            <div class="fw-medium">Musterstraße 123, 10115 Berlin</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle me-3 d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; background-color: rgba(63, 191, 216, 0.1);">
                                            <i class="fas fa-phone-alt text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">Telefon</div>
                                            <div><a href="tel:+1987456321" class="text-body fw-medium">+1987456321</a></div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle me-3 d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; background-color: rgba(63, 191, 216, 0.1);">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted small">E-Mail</div>
                                            <div><a href="mailto:info@zahnarzt-mueller.de"
                                                    class="text-body fw-medium">info@zahnarzt-mueller.de</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jetzt Geöffnet Status -->
                            <div class="alert alert-success border-0 shadow-sm mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <div class="position-relative">
                                            <i class="fas fa-clock fs-4 text-success"></i>
                                            <span
                                                class="position-absolute top-75 start-75 translate-middle badge rounded-circle bg-success p-1">
                                                <span class="visually-hidden">Jetzt geöffnet</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium">Jetzt geöffnet</span>
                                        <span class="small">Heute bis 18:00 Uhr</span>
                                    </div>
                                    <a href="#oeffnungszeiten" class="btn btn-sm btn-outline-success ms-auto">Alle
                                        Zeiten</a>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-grid gap-2">
                                <a href="#termin" class="btn btn-primary btn-lg">
                                    <i class="fas fa-calendar-alt me-2"></i> Termin vereinbaren
                                </a>
                                <div class="d-flex gap-2">
                                    <a href="tel:+987654321" class="btn btn-outline-primary flex-grow-1">
                                        <i class="fas fa-phone-alt me-md-2"></i> <span
                                            class="d-none d-md-inline">Anrufen</span>
                                    </a>
                                    <a href="#route" class="btn btn-outline-primary flex-grow-1">
                                        <i class="fas fa-directions me-md-2"></i> <span
                                            class="d-none d-md-inline">Route</span>
                                    </a>
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="fab fa-whatsapp me-2 text-success"></i> WhatsApp</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="fab fa-facebook me-2 text-primary"></i> Facebook</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="far fa-envelope me-2 text-info"></i> E-Mail</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Öffnungszeiten und Über uns -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5 mb-4">
                                <i class="far fa-clock text-primary me-2"></i> Öffnungszeiten
                            </h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">Montag</td>
                                            <td>
                                                {{-- <span class="text-danger">Geschlossen</span> --}}
                                                - Uhr
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Dienstag</td>
                                            <td>
                                                {{-- <span class="text-danger">Geschlossen</span> --}}
                                                - Uhr
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Mittwoch</td>
                                            <td>
                                                {{-- <span class="text-danger">Geschlossen</span> --}}
                                                - Uhr
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Donnerstag</td>
                                            <td>
                                                {{-- <span class="text-danger">Geschlossen</span> --}}
                                                - Uhr
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Freitag</td>
                                            <td>
                                                {{-- <span class="text-danger">Geschlossen</span> --}}
                                                - Uhr
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Samstag</td>
                                            <td>
                                                {{-- <span class="text-danger">Geschlossen</span> --}}
                                                - Uhr
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Sonntag</td>
                                            <td>
                                                {{-- <span class="text-danger">Geschlossen</span> --}}
                                                - Uhr
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h2 class="h4 mb-4">
                                <i class="fas fa-user-md text-primary me-2"></i> Über unsere Praxis
                            </h2>

                            <div class="row align-items-center">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    {{-- <img src="{{ asset('frontend/assets/images/dashboard/team-member-1')}}" alt="Team member" class="img-fluid rounded shadow-sm"> --}}
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                        style="height: 200px;">
                                        <i class="fas fa-users text-primary" style="font-size: 4rem;"></i>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <p>Willkommen in unserer modernen Zahnarztpraxis im Herzen Berlins. Unser erfahrenes
                                        Team bietet Ihnen das gesamte Spektrum aktueller Zahnmedizin auf höchstem Niveau.
                                        Wir legen großen Wert auf eine entspannte Atmosphäre und sanfte Behandlungsmethoden,
                                        damit Sie sich bei uns rundum wohlfühlen können.</p>

                                    <div class="mt-3">
                                        <p class="fw-medium mb-2">Unsere Schwerpunkte:</p>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-light text-dark p-2">Willkommen in unserer modernen
                                                Zahnarztpraxis im Herzen Berlins</span>
                                            <span class="badge bg-light text-dark p-2">Willkommen in unserer modernen
                                                Zahnarztpraxis im Herzen Berlins</span>
                                            <span class="badge bg-light text-dark p-2">Willkommen in unserer modernen
                                                Zahnarztpraxis im Herzen Berlins</span>
                                            <span class="badge bg-light text-dark p-2">Willkommen in unserer modernen
                                                Zahnarztpraxis im Herzen Berlins</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leistungen mit modernem Layout -->
    </div>
    <section class="py-5" id="leistungen">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge bg-light text-primary px-3 py-2 rounded-pill mb-2">Unsere Expertise</span>
                    <h2 class="display-5 fw-bold mb-3">Zahnmedizinische Leistungen</h2>
                    <p class="lead text-muted">Wir bieten das gesamte Spektrum moderner Zahnmedizin, um Ihre Zahngesundheit
                        zu erhalten und Ihr Lächeln zu verschönern.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden transform-on-hover">
                        <div class="card-body p-4 position-relative z-index-1">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 70px; height: 70px; background-color: rgba(63, 191, 216, 0.1); transition: all 0.3s ease;">
                                <i class="fas fa-tooth text-primary fa-2x transition-icon"></i>
                            </div>
                            <h3 class="h4 mb-3">Prophylaxe</h3>
                            <p class="mb-0 text-secondary">Professionelle Zahnreinigung und individuelle Beratung zur
                                optimalen Mundhygiene</p>

                            <!-- Dekorative Elemente -->
                            <div class="position-absolute top-0 end-0 w-50 h-50 opacity-10 bg-primary rounded-circle transform-scale"
                                style="transform: translate(25%, -25%); transition: all 0.5s ease;"></div>
                            <div class="position-absolute bottom-0 start-0 w-25 h-25 opacity-10 bg-primary rounded-circle transform-scale"
                                style="transform: translate(-25%, 25%); transition: all 0.5s ease;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden transform-on-hover">
                        <div class="card-body p-4 position-relative z-index-1">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 70px; height: 70px; background-color: rgba(63, 191, 216, 0.1); transition: all 0.3s ease;">
                                <i class="fas fa-tooth text-primary fa-2x transition-icon"></i>
                            </div>
                            <h3 class="h4 mb-3">Prophylaxe</h3>
                            <p class="mb-0 text-secondary">Professionelle Zahnreinigung und individuelle Beratung zur
                                optimalen Mundhygiene</p>

                            <!-- Dekorative Elemente -->
                            <div class="position-absolute top-0 end-0 w-50 h-50 opacity-10 bg-primary rounded-circle transform-scale"
                                style="transform: translate(25%, -25%); transition: all 0.5s ease;"></div>
                            <div class="position-absolute bottom-0 start-0 w-25 h-25 opacity-10 bg-primary rounded-circle transform-scale"
                                style="transform: translate(-25%, 25%); transition: all 0.5s ease;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden transform-on-hover">
                        <div class="card-body p-4 position-relative z-index-1">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 70px; height: 70px; background-color: rgba(63, 191, 216, 0.1); transition: all 0.3s ease;">
                                <i class="fas fa-tooth text-primary fa-2x transition-icon"></i>
                            </div>
                            <h3 class="h4 mb-3">Prophylaxe</h3>
                            <p class="mb-0 text-secondary">Professionelle Zahnreinigung und individuelle Beratung zur
                                optimalen Mundhygiene</p>

                            <!-- Dekorative Elemente -->
                            <div class="position-absolute top-0 end-0 w-50 h-50 opacity-10 bg-primary rounded-circle transform-scale"
                                style="transform: translate(25%, -25%); transition: all 0.5s ease;"></div>
                            <div class="position-absolute bottom-0 start-0 w-25 h-25 opacity-10 bg-primary rounded-circle transform-scale"
                                style="transform: translate(-25%, 25%); transition: all 0.5s ease;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#termin" class="btn btn-primary btn-lg px-5">
                    <i class="fas fa-calendar-alt me-2"></i> Termin für Beratung vereinbaren
                </a>
            </div>
        </div>
    </section>

    <!-- Team Mitglieder mit modernem Layout -->
    <section class="py-5 bg-light" id="team">
        <div class="container py-lg-4">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge bg-light text-primary px-3 py-2 rounded-pill mb-2">Unser Team</span>
                    <h2 class="display-5 fw-bold mb-3">Erfahrene Spezialisten für Ihre Zahngesundheit</h2>
                    <p class="lead text-muted mb-0">Lernen Sie unser hochqualifiziertes Team kennen, das sich für Ihre
                        optimale Behandlung einsetzt.</p>
                </div>
            </div>

            <div class="row g-5 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 hover-lift overflow-hidden">
                        <div class="position-relative">
                            {{-- <img src="{{ mitglied.bild }}" alt="{{ mitglied.name }}" class="card-img-top" style="height: 280px; object-fit: cover;"> --}}
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                style="height: 280px;">
                                <i class="fas fa-user-md text-primary" style="font-size: 5rem;"></i>
                            </div>

                            <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-white bg-opacity-90">
                                <h3 class="h4 fw-bold mb-1">Dr. Thomas Müller</h3>
                                <p class="text-primary mb-0">Praxisinhaber & Zahnarzt </p>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <p class="mb-4">Praxisinhaber & Zahnarzt </p>
                            <div class="border-top pt-3">
                                <div class="row row-cols-auto g-2">
                                    <div class="col">
                                        <span class="badge bg-light text-dark px-3 py-2">
                                            <i class="fas fa-graduation-cap me-1 text-primary"></i> Expertise
                                        </span>
                                    </div>
                                    <div class="col">
                                        <span class="badge bg-light text-dark px-3 py-2">
                                            <i class="fas fa-language me-1 text-primary"></i> Sprachen
                                        </span>
                                    </div>
                                    <div class="col">
                                        <span class="badge bg-light text-dark px-3 py-2">
                                            <i class="fas fa-certificate me-1 text-primary"></i> Zertifikate
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 p-4 pt-0">
                            <button class="btn btn-outline-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#teamModal1">
                                <i class="fas fa-info-circle me-2"></i> Mehr erfahren
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal für Team-Mitglied Details -->
                <div class="modal fade" id="teamModal1" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Dr. Thomas Müller</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Schließen"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-4">
                                    <div class="col-md-4 text-center">
                                        {{-- <img src="{{ mitglied.bild }}" alt="Dr. Thomas Müller" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;"> --}}

                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                            style="height: 300px;">
                                            <i class="fas fa-user-md text-primary" style="font-size: 5rem;"></i>
                                        </div>
                                        <h6 class="mt-3 mb-1">Dr. Thomas Müller</h6>
                                        <p class="text-primary small">Praxisinhaber & Zahnarzt</p>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="section-title mb-4">Über</h6>
                                        <p>Seit über 20 Jahren widmet sich Dr. Müller der Zahnmedizin mit Schwerpunkt auf
                                            Implantologie und ästhetischer Zahnheilkunde.</p>

                                        <h6 class="section-title mt-4 mb-3">Ausbildung</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>
                                                Studium der Zahnmedizin an der Universität Heidelberg</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>
                                                Promotion zum Dr. med. dent.</li>
                                            <li><i class="fas fa-check-circle text-success me-2"></i> Weiterbildung in
                                                Implantologie</li>
                                        </ul>

                                        <h6 class="section-title mt-4 mb-3">Sprachen</h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-light text-dark px-3 py-2">Deutsch (Muttersprache)</span>
                                            <span class="badge bg-light text-dark px-3 py-2">Englisch (Fließend)</span>
                                            <span class="badge bg-light text-dark px-3 py-2">Spanisch
                                                (Grundkenntnisse)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Schließen</button>
                                <a href="#termin" class="btn btn-primary" data-bs-dismiss="modal">Termin vereinbaren</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary btn-lg rounded-pill px-4">
                    <i class="fas fa-users me-2"></i> Alle Teammirglieder kennenlernen
                </a>
            </div>
        </div>
    </section>

    <!-- Bewertungen mit modernem Layout -->
    <section class="py-5 position-relative" id="bewertungen">
        <!-- Geschwungener Hintergrund für interessantes Design -->
        <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" style="z-index: -1;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                style="position: absolute; top: -200px; width: 100%; height: calc(100% + 400px);">
                <path fill="#f8f9fa" fill-opacity="0.4"
                    d="M0,224L80,197.3C160,171,320,117,480,101.3C640,85,800,107,960,138.7C1120,171,1280,213,1360,234.7L1440,256L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
                </path>
            </svg>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <span class="badge bg-light text-primary px-3 py-2 rounded-pill mb-2">Patientenfeedback</span>
                    <h2 class="display-5 fw-bold mb-3">Was unsere Patienten sagen</h2>
                    <p class="lead text-muted mb-0">Authentische Erfahrungen unserer Patienten geben Ihnen einen Einblick
                        in unsere Praxisqualität.</p>
                </div>
            </div>

            <!-- Gesamtbewertung-Karte -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-10 col-lg-8">
                    <div class="card border-0 shadow-sm mb-5">
                        <div class="card-body p-4 p-md-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center border-end">
                                    <div class="display-4 fw-bold text-primary mb-2">4.8</div>
                                    <div class="text-warning h3 mb-3">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <p class="mb-0">basierend auf 5 Bewertungen</p>
                                </div>
                                <div class="col-md-8 mt-4 mt-md-0">
                                    <div class="row align-items-center mb-2">
                                        <div class="col-3 text-end">5 Sterne</div>
                                        <div class="col">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-start small">75%</div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-3 text-end">4 Sterne</div>
                                        <div class="col">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: 20%;" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-start small">20%</div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-3 text-end">3 Sterne</div>
                                        <div class="col">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 5%;"
                                                    aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-start small">5%</div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-3 text-end">2 Sterne</div>
                                        <div class="col">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-start small">0%</div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-3 text-end">1 Stern</div>
                                        <div class="col">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-start small">0%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Badges für Bewertungskategorien -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center">
                    <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-3">
                        <span class="badge bg-light text-dark py-2 px-3 rounded-pill">
                            <i class="fas fa-thumbs-up text-success me-1"></i> Freundliches Personal (9)
                        </span>
                        <span class="badge bg-light text-dark py-2 px-3 rounded-pill">
                            <i class="fas fa-clock text-primary me-1"></i> Kurze Wartezeiten (8)
                        </span>
                        <span class="badge bg-light text-dark py-2 px-3 rounded-pill">
                            <i class="fas fa-teeth text-info me-1"></i> Schmerzfreie Behandlung (7)
                        </span>
                        <span class="badge bg-light text-dark py-2 px-3 rounded-pill">
                            <i class="fas fa-briefcase-medical text-warning me-1"></i> Moderne Ausstattung (6)
                        </span>
                        <span class="badge bg-light text-dark py-2 px-3 rounded-pill">
                            <i class="fas fa-child text-danger me-1"></i> Kinderfreundlich (5)
                        </span>
                    </div>
                </div>
            </div>

            <!-- Bewertungskarten mit modernem Design -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card hover-lift h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 50px; height: 50px;">
                                        <span class="h5 mb-0 text-primary">M</span>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="mb-1 fw-bold">Maria Schneider</h5>
                                    <div class="text-warning mb-1">
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="text-muted small">
                                        Vor 2 Monaten
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="mb-0">Ich hatte immer Angst vor dem Zahnarzt, aber Dr. Müller und sein Team
                                    haben mir diese komplett genommen. Sehr einfühlsam und professionell!
                                </p>
                            </div>
                            <div class="small text-end mt-3">
                                <span class="text-muted me-3">
                                    <i class="far fa-thumbs-up me-1"></i> Hilfreich (8)
                                </span>
                                <a href="#" class="text-decoration-none">
                                    <i class="far fa-comment me-1"></i> Antworten
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary btn-lg rounded-pill">
                    <i class="fas fa-star me-2"></i> Alle 3 Bewertungen lesen
                </a>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-lg-8 text-center">
                    <div class="card bg-light border-0 p-4">
                        <div class="card-body">
                            <h4 class="mb-3">Teilen Sie Ihre Erfahrungen mit uns</h4>
                            <p class="mb-4">Ihre Meinung ist uns wichtig! Helfen Sie uns, unsere Behandlungsqualität zu
                                verbessern.</p>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-pencil-alt me-2"></i> Bewertung schreiben
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Karte und Kontakt -->
    <section class="py-5 bg-light" id="termin">
        <div class="container">
            <h2 class="text-center mb-4">Termin vereinbaren</h2>
            <p class="text-center text-muted mb-5">Wählen Sie Ihre bevorzugte Methode zur Terminvereinbarung</p>

            <!-- OPTION 1: Dentalax Dashboard Terminbuchung -->
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header bg-white py-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-calendar-alt text-primary me-3 fs-4"></i>
                                <h3 class="h5 mb-0">Verfügbare Termine</h3>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <!-- Terminkalender -->
                            <div class="p-4 border-bottom">
                                <!-- Monats-Navigation mit Dropdown -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                            id="monatDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="far fa-calendar-alt me-2"></i> <span
                                                id="current-month-display">April 2025</span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="monatDropdown">
                                            <li>
                                                <h6 class="dropdown-header">2025</h6>
                                            </li>
                                            <li><a class="dropdown-item month-option" href="#" data-month="3"
                                                    data-year="2025">März 2025</a></li>
                                            <li><a class="dropdown-item month-option active" href="#"
                                                    data-month="4" data-year="2025">April 2025</a></li>
                                            <li><a class="dropdown-item month-option" href="#" data-month="5"
                                                    data-year="2025">Mai 2025</a></li>
                                            <li><a class="dropdown-item month-option" href="#" data-month="6"
                                                    data-year="2025">Juni 2025</a></li>
                                            <li><a class="dropdown-item month-option" href="#" data-month="7"
                                                    data-year="2025">Juli 2025</a></li>
                                            <li><a class="dropdown-item month-option" href="#" data-month="8"
                                                    data-year="2025">August 2025</a></li>
                                            <li><a class="dropdown-item month-option" href="#" data-month="9"
                                                    data-year="2025">September 2025</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary me-1" id="prev-month-btn">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" id="next-month-btn">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Legende für Kalender -->
                                <!-- Legende entfernt für vereinfachte Darstellung -->

                                <!-- Tage Grid -->
                                <div class="text-center calendar-grid-container">
                                    <!-- Wochentage Kopfzeile -->
                                    <div class="row g-2 mb-2">
                                        <div class="col">
                                            <div class="text-center small fw-bold text-muted">Mo</div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center small fw-bold text-muted">Di</div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center small fw-bold text-muted">Mi</div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center small fw-bold text-muted">Do</div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center small fw-bold text-muted">Fr</div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center small fw-bold text-muted">Sa</div>
                                        </div>
                                        <div class="col">
                                            <div class="text-center small fw-bold text-muted">So</div>
                                        </div>
                                    </div>

                                    <!-- April 2025 - Woche 1 -->
                                    <div class="row g-2 mb-2">
                                        <div class="col">
                                            <div class="calendar-day inactive">31</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">1<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">2<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">3<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">4<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">5<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">6</div>
                                        </div>
                                    </div>

                                    <!-- April 2025 - Woche 2 -->
                                    <div class="row g-2 mb-2">
                                        <div class="col">
                                            <div class="calendar-day clickable">7<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">8<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">9<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable active">10<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">11<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">12<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">13</div>
                                        </div>
                                    </div>

                                    <!-- April 2025 - Woche 3 -->
                                    <div class="row g-2 mb-2">
                                        <div class="col">
                                            <div class="calendar-day clickable">14<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">15</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">16<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">17<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">18<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">19</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">20</div>
                                        </div>
                                    </div>

                                    <!-- April 2025 - Woche 4 -->
                                    <div class="row g-2 mb-2">
                                        <div class="col">
                                            <div class="calendar-day clickable">21</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">22<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">23<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">24<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">25<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">26</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">27</div>
                                        </div>
                                    </div>

                                    <!-- April 2025 - Woche 5 -->
                                    <div class="row g-2">
                                        <div class="col">
                                            <div class="calendar-day clickable">28<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">29<span
                                                    class="availability-dot availability-medium"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day clickable">30<span
                                                    class="availability-dot availability-high"></span></div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">1</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">2</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">3</div>
                                        </div>
                                        <div class="col">
                                            <div class="calendar-day inactive">4</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Verfügbare Zeiten für den ausgewählten Tag - verbesserte Anzeige -->
                            <div class="p-4 border-bottom">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <div class="badge bg-primary py-2 px-3 mb-2 verfuegbare-zeiten-titel">Donnerstag,
                                            10. April</div>
                                        <h5 class="h6 mb-0">Verfügbare Zeiten</h5>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    @foreach (['08:30', '09:15', '10:00', '11:00', '11:45', '14:30', '15:00', '15:45', '16:30', '17:15'] as $zeit)
                                        <div class="col-6 col-md-3 col-lg-2">
                                            <a href="#buchen" data-bs-toggle="modal" data-bs-target="#buchungsModal"
                                                data-zeit="{{ $zeit }}" class="text-decoration-none zeit-option">
                                                <div
                                                    class="time-slot text-center py-2 position-relative border {{ $zeit == '11:45' ? 'active' : '' }}">
                                                    {{ $zeit }}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>


                                <style>
                                    .time-slot {
                                        border-radius: 4px;
                                        cursor: pointer;
                                        transition: all 0.2s ease;
                                        background-color: #fff;
                                        color: #3fbfd8;
                                        border-color: #e2f3f7 !important;
                                    }

                                    .time-slot:hover {
                                        background-color: #e2f3f7;
                                        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
                                    }

                                    .time-slot.active {
                                        background-color: #3fbfd8;
                                        color: white;
                                        font-weight: 500;
                                        border-color: #3fbfd8 !important;
                                    }
                                </style>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Kalender-Funktionalität
                                    const currentMonthDisplay = document.getElementById('current-month-display');
                                    const monthOptions = document.querySelectorAll('.month-option');
                                    const prevMonthBtn = document.getElementById('prev-month-btn');
                                    const nextMonthBtn = document.getElementById('next-month-btn');
                                    const calendarDays = document.querySelectorAll('.calendar-day.clickable');
                                    const selectedDateDisplay = document.querySelector('.verfuegbare-zeiten-titel');
                                    const buchungsModalElement = document.getElementById('buchungsModal');

                                    // Gemeinsam genutzte Variablen für das Datum
                                    let currentMonth = 4; // April
                                    let currentYear = 2025;
                                    let selectedDay = 10; // Standard: 10. April
                                    let selectedWeekday = 'Donnerstag';

                                    // Globale Variable für die zuletzt gewählte Zeit
                                    let ausgewaehlteZeit = '11:45';

                                    // Monate für die Anzeige
                                    const monthNames = [
                                        'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni',
                                        'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'
                                    ];

                                    // Wochentage für die Anzeige
                                    const weekdays = ['Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa', 'So'];

                                    // Monatsauswahl aus Dropdown
                                    monthOptions.forEach(option => {
                                        option.addEventListener('click', function(e) {
                                            e.preventDefault();

                                            // Aktive Klasse entfernen
                                            monthOptions.forEach(opt => opt.classList.remove('active'));

                                            // Neue Option als aktiv markieren
                                            this.classList.add('active');

                                            // Monat und Jahr aus Datenattributen lesen
                                            currentMonth = parseInt(this.getAttribute('data-month'));
                                            currentYear = parseInt(this.getAttribute('data-year'));

                                            // Anzeige aktualisieren
                                            updateMonthDisplay();

                                            // Kalenderdaten aktualisieren
                                            updateCalendarGrid();
                                        });
                                    });

                                    // Buttons für vorherigen/nächsten Monat
                                    prevMonthBtn.addEventListener('click', function() {
                                        currentMonth--;
                                        if (currentMonth < 1) {
                                            currentMonth = 12;
                                            currentYear--;
                                        }
                                        updateMonthDisplay();
                                        updateCalendarGrid();
                                        updateDropdownSelection();
                                    });

                                    nextMonthBtn.addEventListener('click', function() {
                                        currentMonth++;
                                        if (currentMonth > 12) {
                                            currentMonth = 1;
                                            currentYear++;
                                        }
                                        updateMonthDisplay();
                                        updateCalendarGrid();
                                        updateDropdownSelection();
                                    });

                                    // Tagesauswahl ermöglichen - extrem vereinfachte Version
                                    function attachClickEventsToDays() {
                                        console.log('Einfache Event-Listener für Kalendertage werden hinzugefügt...');

                                        // Alle klickbaren Tage auswählen
                                        const calendarDays = document.querySelectorAll('.calendar-day.clickable');
                                        console.log(`${calendarDays.length} klickbare Tage gefunden`);

                                        // Jedem Tag einen Klick-Listener hinzufügen
                                        calendarDays.forEach(day => {
                                            day.addEventListener('click', function() {
                                                // Zuerst aktive Klasse von allen Tagen entfernen
                                                document.querySelectorAll('.calendar-day').forEach(d => {
                                                    d.classList.remove('active');
                                                });

                                                // Dann aktive Klasse zu diesem Tag hinzufügen
                                                this.classList.add('active');

                                                // Ausgewähltes Datum aktualisieren
                                                const dayNumber = parseInt(this.innerText);
                                                selectedDay = dayNumber;
                                                selectedWeekday = getWeekdayName(currentYear, currentMonth, selectedDay);

                                                // Datum-Display aktualisieren
                                                updateDateDisplay();
                                            });
                                        });
                                    }

                                    // Initial Event Listener hinzufügen
                                    attachClickEventsToDays();

                                    // Zeit-Optionen Klick-Handler
                                    const zeitOptions = document.querySelectorAll('.zeit-option');
                                    zeitOptions.forEach(option => {
                                        option.addEventListener('click', function(e) {
                                            // Alte Auswahl entfernen
                                            zeitOptions.forEach(opt => {
                                                opt.querySelector('.time-slot').classList.remove('active');
                                            });

                                            // Neue Auswahl markieren
                                            this.querySelector('.time-slot').classList.add('active');

                                            // Zeit für Modal speichern
                                            ausgewaehlteZeit = this.getAttribute('data-zeit');
                                        });
                                    });

                                    // Modal-Handling
                                    if (buchungsModalElement) {
                                        buchungsModalElement.addEventListener('show.bs.modal', function(event) {
                                            // Button, der das Modal geöffnet hat
                                            const button = event.relatedTarget;
                                            const zeit = button ? button.getAttribute('data-zeit') : ausgewaehlteZeit;

                                            // Datum für die Anzeige formatieren
                                            const formattedDate =
                                                `${selectedWeekday}, ${selectedDay}. ${monthNames[currentMonth-1]}`;

                                            // Modal-Text aktualisieren
                                            const modalText = this.querySelector('.modal-body p strong');
                                            if (modalText) {
                                                modalText.textContent = `${formattedDate} um ${zeit} Uhr`;
                                            }
                                        });
                                    }

                                    // Monatsanzeige aktualisieren
                                    function updateMonthDisplay() {
                                        currentMonthDisplay.textContent = `${monthNames[currentMonth-1]} ${currentYear}`;
                                    }

                                    // Datumsanzeige aktualisieren
                                    function updateDateDisplay() {
                                        if (selectedDateDisplay) {
                                            selectedDateDisplay.innerText =
                                                `${selectedWeekday}, ${selectedDay}. ${monthNames[currentMonth-1]} ${currentYear}`;

                                            // Auch das Datum bei der Auswahl der Zeiten aktualisieren
                                            const zeitenTitelElement = document.querySelector('.verfuegbare-zeiten-titel');
                                            if (zeitenTitelElement) {
                                                zeitenTitelElement.innerText =
                                                    `${selectedWeekday}, ${selectedDay}. ${monthNames[currentMonth-1]}`;
                                            }
                                        }
                                    }

                                    // Dropdown-Auswahl dem aktuellen Monat anpassen
                                    function updateDropdownSelection() {
                                        monthOptions.forEach(option => {
                                            const optionMonth = parseInt(option.getAttribute('data-month'));
                                            const optionYear = parseInt(option.getAttribute('data-year'));

                                            if (optionMonth === currentMonth && optionYear === currentYear) {
                                                option.classList.add('active');
                                            } else {
                                                option.classList.remove('active');
                                            }
                                        });
                                    }

                                    // Kalendergitter mit neuen Daten aktualisieren
                                    function updateCalendarGrid() {
                                        console.log(`Kalender für ${monthNames[currentMonth-1]} ${currentYear} wird aktualisiert...`);

                                        // Container für das Kalendergitter
                                        const calendarContainer = document.querySelector('.calendar-grid-container');
                                        if (!calendarContainer) {
                                            console.error('Kalendergitter-Container nicht gefunden');
                                            return;
                                        }

                                        // Alte Kalenderdaten speichern
                                        const oldCalendarHTML = calendarContainer.innerHTML;

                                        // Neuen Kalender erstellen
                                        calendarContainer.innerHTML = generateCalendarHTML(currentYear, currentMonth);

                                        // Event-Listener für neue Kalendertage hinzufügen
                                        attachClickEventsToDays();

                                        // Bei Fehler den alten Kalender wiederherstellen
                                        window.onerror = function() {
                                            console.error('Fehler beim Aktualisieren des Kalenders');
                                            calendarContainer.innerHTML = oldCalendarHTML;
                                            return true;
                                        };
                                    }

                                    // Kalendergitter für einen bestimmten Monat generieren
                                    function generateCalendarHTML(year, month) {
                                        // Erster Tag des Monats
                                        const firstDay = new Date(year, month - 1, 1);
                                        // Letzter Tag des Monats
                                        const lastDay = new Date(year, month, 0);

                                        // Anzahl der Tage im Monat
                                        const daysInMonth = lastDay.getDate();

                                        // Wochentag des ersten Tags (0 = Sonntag, 1 = Montag, ..., 6 = Samstag)
                                        let firstDayIndex = firstDay.getDay();
                                        // Anpassen für europäisches Format (Mo-So statt So-Sa)
                                        firstDayIndex = firstDayIndex === 0 ? 6 : firstDayIndex - 1;

                                        // Letzter Tag des vorherigen Monats
                                        const prevMonthLastDay = new Date(year, month - 1, 0).getDate();

                                        // HTML für den Kalender
                                        let html = '';

                                        // Wochentage-Header
                                        html += `
                      <div class="row g-2 mb-2">
                        <div class="col"><div class="text-center small fw-bold text-muted">Mo</div></div>
                        <div class="col"><div class="text-center small fw-bold text-muted">Di</div></div>
                        <div class="col"><div class="text-center small fw-bold text-muted">Mi</div></div>
                        <div class="col"><div class="text-center small fw-bold text-muted">Do</div></div>
                        <div class="col"><div class="text-center small fw-bold text-muted">Fr</div></div>
                        <div class="col"><div class="text-center small fw-bold text-muted">Sa</div></div>
                        <div class="col"><div class="text-center small fw-bold text-muted">So</div></div>
                      </div>`;

                                        // Tage des Kalenders
                                        let dayCount = 1;
                                        let nextMonthDay = 1;

                                        // Anzahl der Wochen berechnen (max. 6)
                                        const weeksInMonth = Math.ceil((firstDayIndex + daysInMonth) / 7);

                                        for (let week = 0; week < weeksInMonth; week++) {
                                            html += '<div class="row g-2 mb-2">';

                                            for (let day = 0; day < 7; day++) {
                                                if (week === 0 && day < firstDayIndex) {
                                                    // Tage des vorherigen Monats
                                                    const prevDay = prevMonthLastDay - firstDayIndex + day + 1;
                                                    html += `<div class="col"><div class="calendar-day inactive">${prevDay}</div></div>`;
                                                } else if (dayCount > daysInMonth) {
                                                    // Tage des nächsten Monats
                                                    html +=
                                                        `<div class="col"><div class="calendar-day inactive">${nextMonthDay}</div></div>`;
                                                    nextMonthDay++;
                                                } else {
                                                    // Tage des aktuellen Monats
                                                    // Wochenendtage als inaktiv markieren, sonst clickable
                                                    const isWeekend = (day === 5 || day === 6);
                                                    const dayClass = isWeekend ? 'inactive' : 'clickable';

                                                    // Aktiven Tag markieren
                                                    const isActive = (dayCount === selectedDay && currentMonth === month && currentYear ===
                                                        year);
                                                    const activeClass = isActive ? ' active' : '';
                                                    if (isActive) {
                                                        console.log(`Tag ${dayCount} ist aktiv: ${isActive}`);
                                                    }

                                                    // Vereinfachte Version ohne Verfügbarkeitspunkte
                                                    html +=
                                                        `<div class="col"><div class="calendar-day ${dayClass}${activeClass}" id="day-${year}-${month}-${dayCount}">${dayCount}</div></div>`;
                                                    dayCount++;
                                                }
                                            }

                                            html += '</div>';

                                            // Abbrechen, wenn alle Tage gerendert wurden
                                            if (dayCount > daysInMonth && week >= 3) {
                                                break;
                                            }
                                        }

                                        return html;
                                    }

                                    // Wochentagsname für Datum ermitteln
                                    function getWeekdayName(year, month, day) {
                                        const date = new Date(year, month - 1, day);
                                        const weekdayIndex = date.getDay(); // 0 = Sonntag, 1 = Montag, ...
                                        const weekdayNames = ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag',
                                            'Samstag'
                                        ];
                                        return weekdayNames[weekdayIndex];
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-5">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle text-primary me-3 fs-4"></i>
                    <h3 class="h5 mb-0">Behandlungen</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="list-group">
                    {% for behandlung in praxis.termin_option.behandlungen %}
                      <a href="#" class="list-group-item list-group-item-action" data-behandlung="{{ behandlung.name }}">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h6 class="mb-0">{{ behandlung.name }}</h6>
                            <p class="text-muted small mb-0">{{ behandlung.beschreibung }}</p>
                          </div>
                          <span class="badge bg-light text-dark rounded-pill">{{ behandlung.dauer }} Min</span>
                        </div>
                      </a>
                    {% endfor %}
                  </div>
                </div>
              </div>
            </div> --}}
            </div>

            <!-- Modal für die Buchungsbestätigung -->
            {{-- <div class="modal fade" id="buchungsModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Termin bestätigen</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                </div>
                <div class="modal-body">
                  <p>Sie möchten einen Termin buchen am <strong>Donnerstag, 10. April um 11:45 Uhr</strong> für:</p>
                  <div class="form-group mb-3">
                    <label for="modalBehandlung" class="form-label">Behandlung</label>
                    <select class="form-select" id="modalBehandlung">
                      {% for behandlung in praxis.termin_option.behandlungen %}
                        <option value="{{ behandlung.name }}">{{ behandlung.name }} ({{ behandlung.dauer }} Min)</option>
                      {% endfor %}
                    </select>
                  </div>
                  <form>
                    <div class="mb-3">
                      <label for="modalName" class="form-label">Name</label>
                      <input type="text" class="form-control" id="modalName" required>
                    </div>
                    <div class="mb-3">
                      <label for="modalEmail" class="form-label">E-Mail</label>
                      <input type="email" class="form-control" id="modalEmail" required>
                    </div>
                    <div class="mb-3">
                      <label for="modalTelefon" class="form-label">Telefon</label>
                      <input type="tel" class="form-control" id="modalTelefon" required>
                    </div>
                    <div class="mb-3">
                      <label for="modalNachricht" class="form-label">Anmerkung (optional)</label>
                      <textarea class="form-control" id="modalNachricht" rows="2"></textarea>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" id="modalDatenschutz" required>
                      <label class="form-check-label small" for="modalDatenschutz">
                        Ich stimme der Verarbeitung meiner Daten entsprechend der Datenschutzerklärung zu.
                      </label>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                  <button type="button" class="btn btn-primary">Termin bestätigen</button>
                </div>
              </div>
            </div>
          </div>

        {% elif praxis.termin_option.modus == 'redirect' %}
          <!-- OPTION 2: Weiterleitung zu externem Buchungssystem -->
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
              <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                  <div class="mb-4">
                    <div class="icon-wrapper bg-light rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                      <i class="fas fa-external-link-alt text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <h3 class="h5">Online-Terminbuchung</h3>
                    <p class="text-muted">Sie werden zum Terminbuchungssystem der Praxis weitergeleitet, wo Sie bequem und schnell Ihren Wunschtermin vereinbaren können.</p>
                  </div>
                  <a href="{{ praxis.termin_option.redirect_url or '#' }}" class="btn btn-primary btn-lg w-100 py-3" target="_blank" rel="noopener">
                    <i class="fas fa-calendar-alt me-2"></i> Jetzt Termin buchen
                  </a>
                </div>
              </div>
            </div>
          </div>

        {% elif praxis.termin_option.modus == 'api' %}
          <!-- OPTION 3: API-Integration mit externem System -->
          <div class="row justify-content-center mb-4">
            <div class="col-md-10 col-lg-8">
              <div class="alert alert-info">
                <div class="d-flex">
                  <div class="me-3">
                    <i class="fas fa-info-circle fa-2x"></i>
                  </div>
                  <div>
                    <h4 class="h6 mb-1">Echtzeit-Terminbuchung</h4>
                    <p class="mb-0 small">Diese Praxis nutzt ein modernes API-basiertes Buchungssystem. Alle angezeigten Termine sind in Echtzeit verfügbar.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-md-6 col-lg-4">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                  <h3 class="h5 mb-0">1. Behandlung auswählen</h3>
                </div>
                <div class="card-body">
                  <div class="list-group">
                    {% for behandlung in praxis.termin_option.behandlungen %}
                      <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ behandlung.name }}
                        <span class="badge bg-light text-dark rounded-pill">{{ behandlung.dauer }} Min</span>
                      </a>
                    {% endfor %}
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                  <h3 class="h5 mb-0">2. Tag wählen</h3>
                </div>
                <div class="card-body">
                  <div class="list-group">
                    {% for tag in ['Heute, 02.04.', 'Morgen, 03.04.', 'Freitag, 04.04.', 'Montag, 07.04.', 'Dienstag, 08.04.'] %}
                      <a href="#" class="list-group-item list-group-item-action">{{ tag }}</a>
                    {% endfor %}
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                  <h3 class="h5 mb-0">3. Uhrzeit wählen</h3>
                </div>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    {% for zeit in ['09:00', '10:30', '11:15', '14:00', '15:30', '16:45'] %}
                      <a href="#" class="btn btn-outline-primary">{{ zeit }}</a>
                    {% endfor %}
                  </div>
                </div>
              </div>
            </div>
          </div>

        {% else %}
          <!-- OPTION 4: Einfaches Anfrage-Formular (Fallback) -->
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                  <h3 class="h5 mb-4">Terminanfrage</h3>
                  <form>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control" id="email" required>
                      </div>
                      <div class="col-md-6">
                        <label for="telefon" class="form-label">Telefon</label>
                        <input type="tel" class="form-control" id="telefon">
                      </div>
                      <div class="col-md-6">
                        <label for="datum" class="form-label">Wunschdatum</label>
                        <input type="date" class="form-control" id="datum" required>
                      </div>
                      <div class="col-12">
                        <label for="behandlung" class="form-label">Behandlungsgrund</label>
                        <select class="form-select" id="behandlung" required>
                          <option value="" selected disabled>Bitte auswählen</option>
                          {% for leistung in praxis.leistungen %}
                            <option value="{{ leistung.titel }}">{{ leistung.titel }}</option>
                          {% endfor %}
                          <option value="Sonstiges">Sonstiges</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <label for="nachricht" class="form-label">Ihre Nachricht</label>
                        <textarea class="form-control" id="nachricht" rows="3"></textarea>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="datenschutz" required>
                          <label class="form-check-label" for="datenschutz">
                            Ich stimme der Verarbeitung meiner Daten entsprechend der Datenschutzerklärung zu.
                          </label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">Termin anfragen</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        {% endif %}

      {% else %}
        <!-- Fallback wenn keine Terminbuchung aktiviert ist -->
        <div class="row justify-content-center">
          <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
              <div class="card-body p-4 text-center">
                <div class="mb-4">
                  <div class="icon-wrapper bg-light rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                    <i class="fas fa-phone text-primary" style="font-size: 2rem;"></i>
                  </div>
                  <h3 class="h5">Telefonische Terminvereinbarung</h3>
                  <p class="text-muted">Bitte kontaktieren Sie die Praxis telefonisch zur Vereinbarung eines Termins.</p>
                </div>
                <a href="tel:{{ praxis.telefon }}" class="btn btn-primary btn-lg">
                  <i class="fas fa-phone-alt me-2"></i> {{ praxis.telefon }}
                </a>
              </div>
            </div>
          </div>
        </div>
      {% endif %} --}}

            <!-- Praxis-Standort Karte -->
            {{-- <div class="row mt-5">
        <div class="col-12">
          <div class="card shadow-sm border-0">
            <div class="card-body p-0">
              <div class="ratio ratio-21x9">
                <iframe src="https://maps.google.com/maps?q={{ praxis.lat|default('52.520008,13.404954') }},{{ praxis.lng|default('') }}&z=15&output=embed" title="Standort von {{ praxis.name }}" allowfullscreen></iframe>
              </div>
            </div>
            <div class="card-footer bg-white py-3">
              <div class="d-flex align-items-center justify-content-center">
                <i class="fas fa-map-marker-alt text-primary me-3 fs-4"></i>
                <div>
                  <p class="mb-0">{{ praxis.strasse }}, {{ praxis.plz }} {{ praxis.stadt }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
        </div>
    </section>

    {{-- add condition for faqs if length > 0 --}}
    {{-- <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-5">Häufig gestellte Fragen</h2>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="accordion" id="faqAccordion">
            {% for faq in praxis.faqs %}
              <div class="accordion-item border mb-3 shadow-sm">
                <h2 class="accordion-header" id="heading{{ loop.index }}">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ loop.index }}" aria-expanded="false" aria-controls="collapse{{ loop.index }}">
                    {{ faq.frage }}
                  </button>
                </h2>
                <div id="collapse{{ loop.index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ loop.index }}" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">
                    {{ faq.antwort }}
                  </div>
                </div>
              </div>
            {% endfor %}
          </div>
        </div>
      </div>
    </div>
  </section> --}}
@endsection
