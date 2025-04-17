@extends('frontend.layouts.master')
@section('content')
    <section class="py-5">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Startseite</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('job_offers')}}" class="text-decoration-none">Stellenangebote</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Zahnmedizinische/r Fachangestellte/r (ZFA)</li>
                </ol>
            </nav>

            <!-- Hauptinhalt im 2-Spalten-Layout -->
            <div class="row">
                <!-- Linke Spalte: Job-Details -->
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body p-4">
                            <!-- Job-Header mit Bild und Titel -->
                            <div class="d-flex align-items-center mb-4">
                                <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                    alt="Zahnärzte am Stadtplatz" class="me-4"
                                    style="width: 100px; height: 100px; object-fit: contain;">
                                <div>
                                    <span class="badge bg-success mb-2">Vollzeit</span>
                                    <h1 class="h3 mb-1 fw-bold text-primary">Zahnmedizinische/r Fachangestellte/r (ZFA)</h1>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-building me-1"></i> Zahnärzte am Stadtplatz
                                        <span class="mx-2">|</span>
                                        <i class="fas fa-map-marker-alt me-1"></i> 10115 Berlin-Mitte
                                        <span class="mx-2">|</span>
                                        <i class="far fa-calendar-alt me-1"></i> Veröffentlicht: 02.04.2025
                                    </p>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-light text-dark p-2"><i
                                        class="fas fa-briefcase me-1 text-primary"></i> Min. 2 Jahre Erfahrung</span>
                                <span class="badge bg-light text-dark p-2"><i class="fas fa-tooth me-1 text-primary"></i>
                                    Prophylaxe-Kenntnisse</span>
                                <span class="badge bg-light text-dark p-2"><i
                                        class="fas fa-laptop-medical me-1 text-primary"></i> Digitale Praxis</span>
                                <span class="badge bg-light text-dark p-2"><i class="fas fa-clock me-1 text-primary"></i>
                                    Flexible Arbeitszeiten</span>
                                <span class="badge bg-light text-dark p-2"><i
                                        class="fas fa-euro-sign me-1 text-primary"></i> Attraktive Vergütung</span>
                            </div>

                            <!-- Job-Beschreibung -->
                            <div class="job-description">
                                <h2 class="h5 mb-3 fw-bold">Über uns</h2>
                                <p>
                                    Die Zahnarztpraxis "Zahnärzte am Stadtplatz" ist eine moderne Gemeinschaftspraxis im
                                    Herzen von Berlin-Mitte. Mit unserem Team aus 5 Zahnärzten und 12 Mitarbeitern bieten
                                    wir unseren Patienten das gesamte Spektrum der modernen Zahnmedizin. Digitale
                                    Technologien, neueste Behandlungsmethoden und ein freundliches Arbeitsklima zeichnen
                                    unsere Praxis aus.
                                </p>

                                <h2 class="h5 mb-3 fw-bold mt-4">Ihre Aufgaben</h2>
                                <ul class="mb-4">
                                    <li>Assistenz bei verschiedenen zahnärztlichen Behandlungen</li>
                                    <li>Vorbereitung der Behandlungsräume und Instrumente</li>
                                    <li>Durchführung von Prophylaxemaßnahmen (je nach Qualifikation)</li>
                                    <li>Beratung und Betreuung unserer Patienten</li>
                                    <li>Mitwirkung bei der Praxisorganisation</li>
                                    <li>Unterstützung bei der Abrechnung und Dokumentation</li>
                                </ul>

                                <h2 class="h5 mb-3 fw-bold">Ihr Profil</h2>
                                <ul class="mb-4">
                                    <li>Abgeschlossene Berufsausbildung zur/zum Zahnmedizinischen Fachangestellten</li>
                                    <li>Mindestens 2 Jahre Berufserfahrung in einer Zahnarztpraxis</li>
                                    <li>Kenntnisse in der professionellen Zahnreinigung wünschenswert</li>
                                    <li>Erfahrung im Umgang mit digitalen Praxistechnologien (idealerweise mit dem
                                        Praxisprogramm Dampsoft)</li>
                                    <li>Freundliches und sicheres Auftreten, Teamfähigkeit</li>
                                    <li>Selbstständige, zuverlässige und sorgfältige Arbeitsweise</li>
                                    <li>Hohe Patientenorientierung und Servicebereitschaft</li>
                                </ul>

                                <h2 class="h5 mb-3 fw-bold">Wir bieten</h2>
                                <ul class="mb-4">
                                    <li>Eine unbefristete Anstellung in Vollzeit (40 Stunden/Woche)</li>
                                    <li>Attraktive, übertarifliche Vergütung je nach Qualifikation und Erfahrung</li>
                                    <li>Moderne Praxis mit digitalen Technologien und angenehmer Arbeitsatmosphäre</li>
                                    <li>Regelmäßige Fort- und Weiterbildungsmöglichkeiten</li>
                                    <li>Betriebliche Altersvorsorge und weitere Benefits</li>
                                    <li>Zentrale Lage mit guter Verkehrsanbindung</li>
                                    <li>Ein dynamisches, freundliches Team</li>
                                </ul>

                                <h2 class="h5 mb-3 fw-bold">Arbeitsbeginn</h2>
                                <p>Ab sofort oder nach Vereinbarung</p>
                            </div>

                            <!-- Bewerbungs-CTA -->
                            <div class="mt-5">
                                <a href="#bewerben" class="btn btn-primary btn-lg px-5 py-3 shadow-sm">
                                    <i class="fas fa-paper-plane me-2"></i> Jetzt bewerben
                                </a>
                                <button class="btn btn-outline-secondary ms-2" onclick="window.print();">
                                    <i class="fas fa-print me-1"></i> Drucken
                                </button>
                                <button class="btn btn-outline-secondary ms-2" data-bs-toggle="modal"
                                    data-bs-target="#shareModal">
                                    <i class="fas fa-share-alt me-1"></i> Teilen
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Bewerbungsformular -->
                    <div class="card shadow-sm border-0" id="bewerben">
                        <div class="card-header bg-white py-3 border-0">
                            <h2 class="h4 m-0 fw-bold text-primary">
                                <i class="fas fa-paper-plane me-2"></i>Online bewerben
                            </h2>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-muted mb-4">Bitte füllen Sie das folgende Formular aus, um sich auf diese Stelle
                                zu bewerben. Felder mit * sind Pflichtfelder.</p>

                            <form action="/stellenangebot/zfa-berlin/bewerben" method="post" enctype="multipart/form-data">
                                <!-- Persönliche Daten -->
                                <div class="row mb-4">
                                    <div class="col-12 mb-3">
                                        <h3 class="h6 fw-bold">Persönliche Daten</h3>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="vorname" class="form-label">Vorname *</label>
                                        <input type="text" class="form-control" id="vorname" name="vorname" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nachname" class="form-label">Nachname *</label>
                                        <input type="text" class="form-control" id="nachname" name="nachname" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">E-Mail *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="telefon" class="form-label">Telefon *</label>
                                        <input type="tel" class="form-control" id="telefon" name="telefon" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="plz" class="form-label">PLZ</label>
                                        <input type="text" class="form-control" id="plz" name="plz">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="ort" class="form-label">Ort</label>
                                        <input type="text" class="form-control" id="ort" name="ort">
                                    </div>
                                </div>

                                <!-- Bewerbungsunterlagen -->
                                <div class="row mb-4">
                                    <div class="col-12 mb-3">
                                        <h3 class="h6 fw-bold">Bewerbungsunterlagen</h3>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="lebenslauf" class="form-label">Lebenslauf (PDF) *</label>
                                        <input type="file" class="form-control" id="lebenslauf" name="lebenslauf"
                                            accept=".pdf" required>
                                        <div class="form-text">Maximale Dateigröße: 5 MB</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="anschreiben" class="form-label">Anschreiben (PDF)</label>
                                        <input type="file" class="form-control" id="anschreiben" name="anschreiben"
                                            accept=".pdf">
                                        <div class="form-text">Maximale Dateigröße: 5 MB</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="zeugnisse" class="form-label">Zeugnisse (PDF)</label>
                                        <input type="file" class="form-control" id="zeugnisse" name="zeugnisse"
                                            accept=".pdf">
                                        <div class="form-text">Maximale Dateigröße: 10 MB</div>
                                    </div>
                                </div>

                                <!-- Zusätzliche Informationen -->
                                <div class="row mb-4">
                                    <div class="col-12 mb-3">
                                        <h3 class="h6 fw-bold">Zusätzliche Informationen</h3>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="erfahrung" class="form-label">Berufserfahrung *</label>
                                        <select class="form-select" id="erfahrung" name="erfahrung" required>
                                            <option value="">Bitte auswählen</option>
                                            <option value="0-1">Weniger als 1 Jahr</option>
                                            <option value="1-2">1-2 Jahre</option>
                                            <option value="2-5">2-5 Jahre</option>
                                            <option value="5-10">5-10 Jahre</option>
                                            <option value="10+">Mehr als 10 Jahre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="fruehesteEintritt" class="form-label">Frühester Eintrittstermin
                                            *</label>
                                        <input type="date" class="form-control" id="fruehesteEintritt"
                                            name="fruehesteEintritt" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="gehaltsvorstellung" class="form-label">Gehaltsvorstellung
                                            (brutto/Monat)</label>
                                        <input type="text" class="form-control" id="gehaltsvorstellung"
                                            name="gehaltsvorstellung" placeholder="z.B. 2.500 €">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="nachricht" class="form-label">Nachricht an die Praxis</label>
                                        <textarea class="form-control" id="nachricht" name="nachricht" rows="4"
                                            placeholder="Hier können Sie weitere Informationen hinzufügen..."></textarea>
                                    </div>
                                </div>

                                <!-- Datenschutz und Absenden -->
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="datenschutz"
                                                name="datenschutz" required>
                                            <label class="form-check-label" for="datenschutz">
                                                Ich habe die <a href="/datenschutz"
                                                    target="_blank">Datenschutzbestimmungen</a> gelesen und stimme der
                                                Verarbeitung meiner Daten zu. *
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-lg px-5">
                                            <i class="fas fa-paper-plane me-2"></i> Bewerbung absenden
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Rechte Spalte: Seitenleiste -->
                <div class="col-lg-4">
                    <!-- Praxisinformationen -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white py-3 border-0">
                            <h3 class="h5 m-0 fw-bold">
                                <i class="fas fa-info-circle me-2 text-primary"></i>Praxisinformationen
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <img src="{{ asset('frontend/assets/images/praxis-logo-placeholder.png') }}"
                                    alt="Praxislogo" class="me-3"
                                    style="width: 60px; height: 60px; object-fit: contain;">
                                <h4 class="h6 mb-0 fw-bold">Zahnärzte am Stadtplatz</h4>
                            </div>

                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i> Friedrichstraße 120<br>
                                    <span class="ms-4">10115 Berlin-Mitte</span>
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-globe me-2 text-primary"></i> <a
                                        href="https://www.zahnaerzte-stadtplatz.de" target="_blank"
                                        class="text-decoration-none">www.zahnaerzte-stadtplatz.de</a>
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-phone-alt me-2 text-primary"></i> 030 123456789
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-envelope me-2 text-primary"></i> <a
                                        href="mailto:info@zahnaerzte-stadtplatz.de"
                                        class="text-decoration-none">info@zahnaerzte-stadtplatz.de</a>
                                </li>
                                <li>
                                    <i class="fas fa-users me-2 text-primary"></i> 17 Mitarbeiter
                                </li>
                            </ul>

                            <div class="mt-4">
                                <a href="/zahnarzt/zahnaerzte-am-stadtplatz-berlin"
                                    class="btn btn-outline-primary w-100">Praxis-Profil ansehen</a>
                            </div>
                        </div>
                    </div>

                    <!-- Ähnliche Jobs -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white py-3 border-0">
                            <h3 class="h5 m-0 fw-bold">
                                <i class="fas fa-briefcase me-2 text-primary"></i>Ähnliche Jobs
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <a href="#" class="text-decoration-none">
                                        <span class="d-block fw-bold text-primary mb-1">ZFA für Prophylaxe (m/w/d)</span>
                                        <span class="d-block small text-muted mb-1">
                                            <i class="fas fa-building me-1"></i> Zahnklinik Mitte
                                            <span class="mx-1">|</span>
                                            <i class="fas fa-map-marker-alt me-1"></i> Berlin
                                        </span>
                                        <span class="badge bg-success">Vollzeit</span>
                                    </a>
                                </li>
                                <li class="list-group-item p-3">
                                    <a href="#" class="text-decoration-none">
                                        <span class="d-block fw-bold text-primary mb-1">Zahnmedizinische/r
                                            Fachangestellte/r</span>
                                        <span class="d-block small text-muted mb-1">
                                            <i class="fas fa-building me-1"></i> Praxis Dr. Weber
                                            <span class="mx-1">|</span>
                                            <i class="fas fa-map-marker-alt me-1"></i> Berlin-Charlottenburg
                                        </span>
                                        <span class="badge bg-info text-white">Teilzeit</span>
                                    </a>
                                </li>
                                <li class="list-group-item p-3">
                                    <a href="#" class="text-decoration-none">
                                        <span class="d-block fw-bold text-primary mb-1">ZMP in Vollzeit gesucht</span>
                                        <span class="d-block small text-muted mb-1">
                                            <i class="fas fa-building me-1"></i> Zahnarztpraxis im Kiez
                                            <span class="mx-1">|</span>
                                            <i class="fas fa-map-marker-alt me-1"></i> Berlin-Kreuzberg
                                        </span>
                                        <span class="badge bg-success">Vollzeit</span>
                                    </a>
                                </li>
                                <li class="list-group-item p-3">
                                    <a href="#" class="text-decoration-none">
                                        <span class="d-block fw-bold text-primary mb-1">ZFA für Rezeption (m/w/d)</span>
                                        <span class="d-block small text-muted mb-1">
                                            <i class="fas fa-building me-1"></i> Zahnärzte Gruppe Berlin
                                            <span class="mx-1">|</span>
                                            <i class="fas fa-map-marker-alt me-1"></i> Berlin-Mitte
                                        </span>
                                        <span class="badge bg-success">Vollzeit</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-3 text-center border-top">
                                <a href="/stellenangebote?position=zfa&ort=Berlin" class="btn btn-sm btn-outline-primary">
                                    Alle ähnlichen Jobs anzeigen
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Job-Alert -->
                    <div class="card shadow-sm border-0 bg-light">
                        <div class="card-body p-4">
                            <h3 class="h5 fw-bold mb-3">
                                <i class="fas fa-bell me-2 text-primary"></i>Job-Alert einrichten
                            </h3>
                            <p class="small text-muted mb-3">Erhalten Sie die neuesten Jobs passend zu Ihrem Profil direkt
                                per E-Mail.</p>

                            <form>
                                <div class="mb-3">
                                    <label for="alert-email" class="form-label small">E-Mail-Adresse</label>
                                    <input type="email" class="form-control" id="alert-email"
                                        placeholder="Ihre E-Mail-Adresse">
                                </div>
                                <div class="mb-3">
                                    <label for="alert-position" class="form-label small">Position</label>
                                    <select class="form-select" id="alert-position">
                                        <option value="zfa">ZFA</option>
                                        <option value="zmf">ZMF</option>
                                        <option value="zmp">ZMP</option>
                                        <option value="dh">DH</option>
                                        <option value="zahnarzt">Zahnarzt/Zahnärztin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alert-ort" class="form-label small">Ort / PLZ</label>
                                    <input type="text" class="form-control" id="alert-ort"
                                        placeholder="z.B. Berlin oder 10115">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-bell me-1"></i> Job-Alert aktivieren
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Stellenangebot teilen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}" target="_blank"
                            class="btn btn-outline-primary">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ request()->url() }}&text=Stellenangebot: Zahnmedizinische/r Fachangestellte/r (ZFA) in Berlin"
                            target="_blank" class="btn btn-outline-primary">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->url() }}" target="_blank"
                            class="btn btn-outline-primary">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/?text=Stellenangebot: Zahnmedizinische/r Fachangestellte/r (ZFA) in Berlin - {{ request()->url() }}"
                            target="_blank" class="btn btn-outline-primary">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="mailto:?subject=Stellenangebot: Zahnmedizinische/r Fachangestellte/r (ZFA) in Berlin&body=Hier ist ein interessantes Stellenangebot: {{ request()->url() }}"
                            class="btn btn-outline-primary">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>

                    <div class="mb-3">
                        <label for="share-link" class="form-label">Link zum Stellenangebot</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="share-link" value="{{ request()->url() }}"
                                readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="copyShareLink()">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Detail-Seiten Styling */
        #bewerben {
            scroll-margin-top: 100px;
            /* Für Anker-Links */
        }

        .sticky-lg-top {
            z-index: 1000;
        }

        .job-description {
            line-height: 1.6;
        }

        .job-description ul {
            padding-left: 1.5rem;
        }

        .job-description ul li {
            margin-bottom: 0.5rem;
        }

        /* Hover-Effekt für ähnliche Jobs */
        .list-group-item:hover {
            background-color: #f8fdfe;
        }

        @media print {

            .navbar,
            footer,
            .breadcrumb,
            #bewerben,
            .col-lg-4,
            .btn {
                display: none !important;
            }

            .col-lg-8 {
                width: 100% !important;
            }
        }
    </style>

    <script>
        function copyShareLink() {
            var copyText = document.getElementById("share-link");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);

            var button = copyText.nextElementSibling;
            var originalHtml = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i>';
            button.classList.remove('btn-outline-secondary');
            button.classList.add('btn-success');

            setTimeout(function() {
                button.innerHTML = originalHtml;
                button.classList.remove('btn-success');
                button.classList.add('btn-outline-secondary');
            }, 2000);
        }
    </script>
@endsection
