@extends('frontend.layouts.master')
@section('content')
    <style>
        /* Fortschrittsanzeige und Navigationskreise */
        .progress-step-container {
            margin-bottom: 2rem;
        }

        .step-circles {
            display: flex;
            justify-content: space-between;
            position: relative;
            z-index: 1;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #fff;
            background-color: #6c757d;
            margin-bottom: 10px;
        }

        .step-circle.active {
            background-color: #40bfd8;
        }

        .step-label {
            font-size: 0.8rem;
            text-align: center;
            color: #6c757d;
            max-width: 100px;
            margin: 0 auto;
        }

        /* Kachelkarten für Terminbuchungsoptionen */
        .booking-option-card {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            height: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            position: relative;
            background-color: #fff;
        }

        .booking-option-card:hover {
            border-color: #40bfd8;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .booking-option-card.selected {
            border-color: #40bfd8;
            background-color: #f0fafc;
            box-shadow: 0 5px 15px rgba(64, 191, 216, 0.2);
        }

        .booking-option-card input[type="radio"]:checked+.option-content {
            border-color: #0d6efd;
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .booking-option-card .option-icon {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: #40bfd8;
        }

        .booking-option-card h5 {
            margin-bottom: 10px;
            color: #2a8294;
        }

        .booking-option-card p {
            color: #6c757d;
            flex-grow: 1;
            font-size: 0.9rem;
        }

        /* API-Endpunkte Stil */
        .api-endpoint-box {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 10px;
        }

        .api-endpoint-box code {
            display: block;
            color: #2a8294;
            font-size: 0.9rem;
        }

        .copy-btn {
            cursor: pointer;
            color: #40bfd8;
            transition: color 0.2s;
        }

        .copy-btn:hover {
            color: #2a8294;
        }

        /* Konfigurationsbereich ein-/ausblenden */
        .config-section {
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Paket-Badge */
        .package-badge {
            padding: 8px 16px;
            border-radius: 30px;
            font-weight: bold;
            color: #fff;
        }

        .badge-basic {
            background-color: #6c757d;
        }

        .badge-pro {
            background-color: #40bfd8;
        }

        .badge-plus {
            background-color: #2a8294;
        }
    </style>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white py-3">
                        <h3 class="mb-0">Praxisdaten vervollständigen</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p>Herzlich willkommen! Sie haben erfolgreich ein Praxis-Paket auf Dentalax erworben. Um Ihr
                                Profil zu vervollständigen, benötigen wir noch einige Informationen zu Ihrer Praxis.</p>
                            <p>Bitte füllen Sie das folgende Formular aus, damit Patienten Ihre Praxis finden können.</p>
                        </div>

                        <form id="praxis-form" method="post" action="" enctype="multipart/form-data">
                            <!-- Navigation und Fortschrittsanzeige -->
                            <div class="progress-step-container">
                                <div class="progress mb-4">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <ul class="nav nav-pills mb-4 step-circles" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link step-circle active" id="step1-tab" data-bs-toggle="pill"
                                            data-bs-target="#step1" type="button" role="tab" aria-controls="step1"
                                            aria-selected="true">1</button>
                                        <div class="step-label">Stammdaten</div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link step-circle" id="step2-tab" data-bs-toggle="pill"
                                            data-bs-target="#step2" type="button" role="tab" aria-controls="step2"
                                            aria-selected="false">2</button>
                                        <div class="step-label">Adresse</div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link step-circle" id="step3-tab" data-bs-toggle="pill"
                                            data-bs-target="#step3" type="button" role="tab" aria-controls="step3"
                                            aria-selected="false">3</button>
                                        <div class="step-label">Öffnungszeiten</div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link step-circle" id="step4-tab" data-bs-toggle="pill"
                                            data-bs-target="#step4" type="button" role="tab" aria-controls="step4"
                                            aria-selected="false">4</button>
                                        <div class="step-label">Leistungen</div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link step-circle" id="step5-tab" data-bs-toggle="pill"
                                            data-bs-target="#step5" type="button" role="tab" aria-controls="step5"
                                            aria-selected="false">5</button>
                                        <div class="step-label">Team</div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link step-circle" id="step6-tab" data-bs-toggle="pill"
                                            data-bs-target="#step6" type="button" role="tab" aria-controls="step6"
                                            aria-selected="false">6</button>
                                        <div class="step-label">Terminbuchung</div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link step-circle" id="step7-tab" data-bs-toggle="pill"
                                            data-bs-target="#step7" type="button" role="tab" aria-controls="step7"
                                            aria-selected="false">7</button>
                                        <div class="step-label">Bestätigung</div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab-Inhalte -->
                            <div class="tab-content" id="myTabContent">
                                <!-- Schritt 1: Stammdaten -->
                                <div class="tab-pane fade show active" id="step1" role="tabpanel"
                                    aria-labelledby="step1-tab">
                                    <div class="mb-4">
                                        <h4>Praxis-Stammdaten</h4>
                                        <p class="text-muted">Geben Sie die grundlegenden Informationen Ihrer Praxis ein.
                                        </p>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="praxisname" class="form-label">Praxisname</label>
                                            <input type="text" class="form-control" id="praxisname" name="praxisname"
                                                value="" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="vorname" class="form-label">Ihr Vorname</label>
                                            <input type="text" class="form-control" id="vorname" name="vorname"
                                                value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="nachname" class="form-label">Ihr Nachname</label>
                                            <input type="text" class="form-control" id="nachname" name="nachname"
                                                value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefon" class="form-label">Telefonnummer der Praxis</label>
                                            <input type="tel" class="form-control" id="telefon" name="telefon"
                                                value="" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">E-Mail-Adresse der Praxis</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="webseite" class="form-label">Webseite (optional)</label>
                                            <input type="url" class="form-control" id="webseite" name="webseite"
                                                value="" placeholder="https://www.ihre-praxis.de">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="beschreibung" class="form-label">Praxisbeschreibung</label>
                                            <textarea class="form-control" id="beschreibung" name="beschreibung" rows="3"></textarea>
                                            <div class="form-text">Eine kurze Beschreibung Ihrer Praxis und Ihre besonderen
                                                Schwerpunkte.</div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <div></div>
                                        <button type="button" class="btn btn-primary next-step"
                                            data-target="step2-tab">Weiter</button>
                                    </div>
                                </div>

                                <!-- Schritt 2: Adresse -->
                                <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                                    <div class="mb-4">
                                        <h4>Adresse</h4>
                                        <p class="text-muted">Geben Sie die Anschrift Ihrer Praxis ein.</p>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-8 mb-3">
                                            <label for="strasse" class="form-label">Straße und Hausnummer</label>
                                            <input type="text" class="form-control" id="strasse" name="strasse"
                                                value="" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="plz" class="form-label">Postleitzahl</label>
                                            <input type="text" class="form-control" id="plz" name="plz"
                                                value="" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="stadt" class="form-label">Stadt</label>
                                            <input type="text" class="form-control" id="stadt" name="stadt"
                                                value="" required>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-primary prev-step"
                                            data-target="step1-tab">Zurück</button>
                                        <button type="button" class="btn btn-primary next-step"
                                            data-target="step3-tab">Weiter</button>
                                    </div>
                                </div>

                                <!-- Schritt 3: Öffnungszeiten -->
                                <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h4>Öffnungszeiten</h4>
                                        <p class="text-muted">Legen Sie die Öffnungszeiten Ihrer Praxis fest.</p>
                                    </div>

                                    <div class="opening-hours-container">
                                        <div class="mb-3 opening-hours-row">
                                            <div class="row g-2 align-items-center">
                                                <div class="col-md-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input me-2 closed-day"
                                                            name="montag_geschlossen" value="1">
                                                        Montag
                                                    </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row time-input-group" style="display: block;">
                                                        <div class="col-md-5">
                                                            <label class="form-label small" for="_von">Von</label>
                                                            <input type="time" class="form-control" id="_von"
                                                                name="_von" value="">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label class="form-label small" for="_bis">Bis</label>
                                                            <input type="time" class="form-control" id="_bis"
                                                                name="_bis" value="">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label small">&nbsp;</label>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary form-control add-time-slot"
                                                                data-day="" title="Weitere Zeitslots hinzufügen">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="additional-time-slots" id="_additional_slots">
                                                        <!-- Hier werden dynamisch weitere Zeitslots eingefügt -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" class="btn btn-outline-primary prev-step"
                                                data-target="step2-tab">Zurück</button>
                                            <button type="button" class="btn btn-primary next-step"
                                                data-target="step4-tab">Weiter</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Schritt 4: Leistungen -->
                                <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4-tab">
                                    <div class="mb-4">
                                        <h4>Leistungen</h4>
                                        <p class="text-muted">Geben Sie die Leistungen an, die Ihre Praxis anbietet.</p>
                                    </div>

                                    <div id="leistungen-container">
                                        <div class="leistung-item card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Titel</label>
                                                        <input type="text" class="form-control"
                                                            name="leistung_titel[]"
                                                            placeholder="z.B. Professionelle Zahnreinigung">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">Icon</label>
                                                        <select class="form-select" name="leistung_icon[]">
                                                            <option value="fas fa-tooth">Zahn</option>
                                                            <option value="fas fa-teeth">Zähne</option>
                                                            <option value="fas fa-procedures">Behandlung</option>
                                                            <option value="fas fa-x-ray">Röntgen</option>
                                                            <option value="fas fa-syringe">Spritze</option>
                                                            <option value="fas fa-user-md">Arzt</option>
                                                            <option value="fas fa-microscope">Mikroskop</option>
                                                            <option value="fas fa-pills">Medikament</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-end mb-3">
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-leistung">Entfernen</button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Beschreibung</label>
                                                        <textarea class="form-control" name="leistung_beschreibung[]" rows="2"
                                                            placeholder="Kurze Beschreibung der Leistung..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="leistung-item card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Titel</label>
                                                        <input type="text" class="form-control"
                                                            name="leistung_titel[]"
                                                            placeholder="z.B. Professionelle Zahnreinigung">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">Icon</label>
                                                        <select class="form-select" name="leistung_icon[]">
                                                            <option value="fas fa-tooth">Zahn</option>
                                                            <option value="fas fa-teeth">Zähne</option>
                                                            <option value="fas fa-procedures">Behandlung</option>
                                                            <option value="fas fa-x-ray">Röntgen</option>
                                                            <option value="fas fa-syringe">Spritze</option>
                                                            <option value="fas fa-user-md">Arzt</option>
                                                            <option value="fas fa-microscope">Mikroskop</option>
                                                            <option value="fas fa-pills">Medikament</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-end mb-3">
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-leistung">Entfernen</button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Beschreibung</label>
                                                        <textarea class="form-control" name="leistung_beschreibung[]" rows="2"
                                                            placeholder="Kurze Beschreibung der Leistung..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="add-leistung" class="btn btn-outline-primary mt-3">
                                        <i class="fas fa-plus-circle me-1"></i>Leistung hinzufügen
                                    </button>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-primary prev-step"
                                            data-target="step3-tab">Zurück</button>
                                        <button type="button" class="btn btn-primary next-step"
                                            data-target="step5-tab">Weiter</button>
                                    </div>
                                </div>

                                <!-- Schritt 5: Team -->
                                <div class="tab-pane fade" id="step5" role="tabpanel" aria-labelledby="step5-tab">
                                    <div class="mb-4">
                                        <h4>Team</h4>
                                        <p class="text-muted">Stellen Sie Ihr Praxisteam vor.</p>
                                    </div>

                                    <div id="team-container">
                                        <div class="team-item card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="team_name[]"
                                                            placeholder="Dr. Max Mustermann">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">Position</label>
                                                        <input type="text" class="form-control" name="team_position[]"
                                                            placeholder="Zahnarzt">
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-end mb-3">
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-team">Entfernen</button>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Beschreibung</label>
                                                        <textarea class="form-control" name="team_beschreibung[]" rows="2"
                                                            placeholder="Kurze Beschreibung der Person und ihres Bereichs..."></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Foto (optional)</label>
                                                        <input type="file" class="form-control" name="team_foto[]"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Teammitglied-Template -->
                                        <div class="team-item card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="team_name[]"
                                                            placeholder="Dr. Max Mustermann">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">Position</label>
                                                        <input type="text" class="form-control" name="team_position[]"
                                                            placeholder="Zahnarzt">
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-end mb-3">
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-team">Entfernen</button>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Beschreibung</label>
                                                        <textarea class="form-control" name="team_beschreibung[]" rows="2"
                                                            placeholder="Kurze Beschreibung der Person und ihres Bereichs..."></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Foto (optional)</label>
                                                        <input type="file" class="form-control" name="team_foto[]"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" id="add-team" class="btn btn-outline-primary mt-3">
                                        <i class="fas fa-plus-circle me-1"></i>Teammitglied hinzufügen
                                    </button>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-primary prev-step"
                                            data-target="step4-tab">Zurück</button>
                                        <button type="button" class="btn btn-primary next-step"
                                            data-target="step6-tab">Weiter</button>
                                    </div>
                                </div>

                                <!-- Schritt 6: Terminbuchung -->
                                <div class="tab-pane fade" id="step6" role="tabpanel" aria-labelledby="step6-tab">
                                    <div class="mb-4">
                                        <h4>Terminbuchung</h4>
                                        <p class="text-muted">Legen Sie fest, wie Patienten Termine in Ihrer Praxis buchen
                                            können.</p>
                                    </div>

                                    <div class="booking-options-container mb-5">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label class="booking-option-card">
                                                    <input type="radio" name="terminbuchung_modus" value="dashboard"
                                                        class="visually-hidden">
                                                    <div class="option-content">
                                                        <div class="option-icon">
                                                            <i class="fas fa-calendar-check"></i>
                                                        </div>
                                                        <h5>Dentalax-Dashboard</h5>
                                                        <p>Verwalten Sie Termine direkt über unser integriertes System.</p>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <label class="booking-option-card">
                                                    <input type="radio" name="terminbuchung_modus" value="redirect"
                                                        class="visually-hidden">
                                                    <div class="option-content">
                                                        <div class="option-icon">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </div>
                                                        <h5>Externes Buchungssystem</h5>
                                                        <p>Nutzen Sie bereits Doctolib, Jameda oder ein anderes System?</p>
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label class="booking-option-card">
                                                    <input type="radio" name="terminbuchung_modus" value="api"
                                                        class="visually-hidden">
                                                    <div class="option-content">
                                                        <div class="option-icon">
                                                            <i class="fas fa-code"></i>
                                                        </div>
                                                        <h5>API-Integration</h5>
                                                        <p>Verbinden Sie Ihre eigene Software über unsere API.</p>
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label class="booking-option-card">
                                                    <input type="radio" name="terminbuchung_modus" value="formular"
                                                        class="visually-hidden">
                                                    <div class="option-content">
                                                        <div class="option-icon">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                        <h5>Kontaktformular</h5>
                                                        <p>Ein einfaches Formular für Terminanfragen.</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Konfigurationsbereich für Externes Buchungssystem -->
                                    <div id="redirect_config" class="config-section mb-4" style="display: none;">
                                        <div class="card border-light">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0"><i class="fas fa-external-link-alt me-2"></i>Externes
                                                    Buchungssystem konfigurieren</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="terminbuchung_url" class="form-label">URL Ihres
                                                        Buchungssystems</label>
                                                    <input type="url" class="form-control" id="terminbuchung_url"
                                                        name="terminbuchung_url" value=""
                                                        placeholder="https://www.doctolib.de/arztpraxis/ihre-praxis">
                                                    <div class="form-text">Vollständige URL zu Ihrem externen
                                                        Terminbuchungssystem (z.B. Doctolib, Jameda, etc.)</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="extern_anbieter" class="form-label">Anbieter
                                                        (optional)</label>
                                                    <select class="form-select" id="extern_anbieter"
                                                        name="extern_anbieter">
                                                        <option value="">Bitte wählen...</option>
                                                        <option value="doctolib" selected>Doctolib</option>
                                                        <option value="jameda">Jameda</option>
                                                        <option value="samedi">Samedi</option>
                                                        <option value="terminland">Terminland</option>
                                                        <option value="andere">Anderer Anbieter</option>
                                                    </select>
                                                    <div class="form-text">Die Auswahl des Anbieters hilft uns, die
                                                        Integration zu optimieren.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Konfigurationsbereich für API-Integration -->
                                    <div id="api_config" class="config-section mb-4" style="display: none;">
                                        <div class="card border-light">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0"><i class="fas fa-plug me-2"></i>API-Integration
                                                    konfigurieren</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="api_anbieter" class="form-label">Ihre
                                                        Praxissoftware</label>
                                                    <select class="form-select" id="api_anbieter" name="api_anbieter">
                                                        <option value="">Bitte wählen...</option>
                                                        <option value="medatixx">Medatixx</option>
                                                        <option value="doctolib">Doctolib</option>
                                                        <option value="cgm">CGM (CompuGroup Medical)</option>
                                                        <option value="medistar">Medistar</option>
                                                        <option value="turbomed">Turbomed</option>
                                                        <option value="andere">Andere Software</option>
                                                    </select>
                                                    <div class="form-text">Wählen Sie Ihre Praxisverwaltungssoftware für
                                                        eine optimale Integration.</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="api_key" class="form-label">Dentalax
                                                        API-Schlüssel</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="api_key"
                                                            name="api_key" value=""
                                                            placeholder="Ihr API-Schlüssel wird automatisch generiert">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            id="generate_api_key">
                                                            <i class="fas fa-sync-alt"></i> Neu generieren
                                                        </button>
                                                    </div>
                                                    <div class="form-text">Dieser Schlüssel wird für die Authentifizierung
                                                        Ihrer API-Anfragen verwendet.</div>
                                                </div>

                                                <div class="mb-4">
                                                    <h6 class="mb-2">Verfügbare Endpunkte</h6>
                                                    <div class="api-endpoint-box">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <strong>Termine abrufen</strong>
                                                            <i class="fas fa-copy copy-btn"
                                                                data-endpoint="GET /api/v1/praxis/{praxis_id}/termine"></i>
                                                        </div>
                                                        <code>GET /api/v1/praxis/{praxis_id}/termine</code>
                                                    </div>

                                                    <div class="api-endpoint-box">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <strong>Termin erstellen</strong>
                                                            <i class="fas fa-copy copy-btn"
                                                                data-endpoint="POST /api/v1/praxis/{praxis_id}/termine"></i>
                                                        </div>
                                                        <code>POST /api/v1/praxis/{praxis_id}/termine</code>
                                                    </div>
                                                </div>

                                                <div class="alert alert-info">
                                                    <i class="fas fa-info-circle me-2"></i>
                                                    <strong>Hinweis:</strong> Eine vollständige API-Dokumentation finden Sie
                                                    in Ihrem Praxis-Dashboard nach der Einrichtung.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Konfigurationsbereich für Kontaktformular -->
                                    <div id="formular_config" class="config-section mb-4" style="display: none;">
                                        <div class="card border-light">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0"><i class="fas fa-envelope me-2"></i>Kontaktformular
                                                    konfigurieren</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="formular_email" class="form-label">E-Mail für
                                                        Terminanfragen</label>
                                                    <input type="email" class="form-control" id="formular_email"
                                                        name="formular_email" value=""
                                                        placeholder="termine@ihre-praxis.de">
                                                    <div class="form-text">An diese E-Mail-Adresse werden alle
                                                        Terminanfragen gesendet.</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label d-block">Benötigte Informationen</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="formular_telefon" name="formular_felder[]"
                                                            value="telefon" checked disabled>
                                                        <label class="form-check-label"
                                                            for="formular_telefon">Telefon</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="formular_email_patient" name="formular_felder[]"
                                                            value="email" checked disabled>
                                                        <label class="form-check-label"
                                                            for="formular_email_patient">E-Mail</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="formular_grund" name="formular_felder[]" value="grund"
                                                            checked>
                                                        <label class="form-check-label"
                                                            for="formular_grund">Termingrund</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="formular_versicherung" name="formular_felder[]"
                                                            value="versicherung">
                                                        <label class="form-check-label"
                                                            for="formular_versicherung">Versicherung</label>
                                                    </div>
                                                    <div class="form-text">Telefon und E-Mail sind Pflichtfelder für die
                                                        Kontaktaufnahme.</div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formular_text" class="form-label">Zusätzlicher Hinweistext
                                                        (optional)</label>
                                                    <textarea class="form-control" id="formular_text" name="formular_text" rows="3"
                                                        placeholder="z.B. 'Bitte beachten Sie, dass wir nur Terminanfragen während unserer Öffnungszeiten bearbeiten können.'"></textarea>
                                                    <div class="form-text">Dieser Text wird im Terminanfrage-Formular
                                                        angezeigt.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Konfigurationsbereich für Dentalax-Dashboard -->
                                    <div id="dashboard_config" class="config-section" style="display: none;">
                                        <div class="card border-light">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0"><i
                                                        class="fas fa-calendar-check me-2"></i>Dentalax-Dashboard
                                                    konfigurieren</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="alert alert-success">
                                                    <i class="fas fa-check-circle me-2"></i>
                                                    <strong>Perfekt!</strong> Das Dentalax-Dashboard ist bereits für Sie
                                                    eingerichtet. Sie können es nach Abschluss der Praxiseinrichtung
                                                    verwenden.
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Standardeinstellungen</label>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="termin_dauer"
                                                                class="form-label small text-muted">Standard-Termindauer</label>
                                                            <select class="form-select" id="termin_dauer"
                                                                name="termin_dauer">
                                                                <option value="15">15 Minuten</option>
                                                                <option value="20">20 Minuten</option>
                                                                <option value="30">30 Minuten</option>
                                                                <option value="45">45 Minuten</option>
                                                                <option value="60">60 Minuten</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="vorlaufzeit"
                                                                class="form-label small text-muted">Vorlaufzeit für
                                                                Buchungen</label>
                                                            <select class="form-select" id="vorlaufzeit"
                                                                name="vorlaufzeit">
                                                                <option value="0">Keine (sofortige Buchung)</option>
                                                                <option value="1">1 Tag</option>
                                                                <option value="2">2 Tage</option>
                                                                <option value="3">3 Tage</option>
                                                                <option value="7">1 Woche</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-text mb-3">
                                                    Die detaillierten Einstellungen für Terminarten, Zeitfenster und weitere
                                                    Optionen können Sie später in Ihrem Dashboard anpassen.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-primary prev-step"
                                            data-target="step5-tab">Zurück</button>
                                        <button type="button" class="btn btn-primary next-step"
                                            data-target="step7-tab">Weiter</button>
                                    </div>
                                </div>

                                <!-- Schritt 7: Bestätigung -->
                                <div class="tab-pane fade" id="step7" role="tabpanel" aria-labelledby="step7-tab">
                                    <div class="mb-4">
                                        <h4>Bestätigung</h4>
                                        <p class="text-muted">Überprüfen Sie Ihre Eingaben und schließen Sie die
                                            Praxiseinrichtung ab.</p>
                                    </div>

                                    <div class="card mb-4">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0">Praxis-Paket</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="package-badge">
                                                    test
                                                </div>
                                                <div class="ms-3">
                                                    <p class="mb-0">test1</p>
                                                    <p class="mb-0">test2</p>
                                                    <p class="mb-0">else test3</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alert alert-info mb-4">
                                        <div class="d-flex">
                                            <div class="me-3">
                                                <i class="fas fa-info-circle fa-2x"></i>
                                            </div>
                                            <div>
                                                <h5 class="alert-heading">Fast geschafft!</h5>
                                                <p class="mb-0">Nach dem Absenden können Sie Ihre Praxisseite jederzeit
                                                    in Ihrem Dashboard bearbeiten. Ihre Praxis wird sofort in den
                                                    Suchergebnissen angezeigt.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="agb_confirm"
                                            name="agb_confirm" required>
                                        <label class="form-check-label" for="agb_confirm">
                                            Ich bestätige die Richtigkeit meiner Angaben und akzeptiere die <a
                                                href="/agb" target="_blank">AGB</a> und <a href="/datenschutz"
                                                target="_blank">Datenschutzbestimmungen</a> von Dentalax.
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4">
                                        <button type="button" class="btn btn-outline-primary prev-step"
                                            data-target="step6-tab">Zurück</button>
                                        <button type="submit" class="btn btn-success">Praxiseinrichtung
                                            abschließen</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize form navigation
            const form = document.getElementById('praxis-form');

            // Update progress bar and step circles
            function updateProgress(currentStep) {
                const totalSteps = 7;
                const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;

                // Update progress bar
                const progressBar = document.querySelector('.progress-bar');
                progressBar.style.width = `${progressPercentage}%`;
                progressBar.setAttribute('aria-valuenow', progressPercentage);

                // Update step circles
                document.querySelectorAll('.step-circle').forEach((circle, index) => {
                    const stepNumber = index + 1;

                    if (stepNumber < currentStep) {
                        // Completed step
                        circle.classList.add('completed');
                        circle.innerHTML = '<i class="fas fa-check"></i>';
                    } else if (stepNumber === currentStep) {
                        // Current step
                        circle.classList.add('active');
                        circle.classList.remove('completed');
                        circle.innerHTML = stepNumber;
                    } else {
                        // Future step
                        circle.classList.remove('active', 'completed');
                        circle.innerHTML = stepNumber;
                    }
                });
            }

            // Switch to specific tab
            function switchToTab(tabId) {
                const tabButton = document.getElementById(tabId);
                if (!tabButton) return;

                const tabInstance = new bootstrap.Tab(tabButton);
                tabInstance.show();

                // Update UI after a small delay to ensure tab is shown
                setTimeout(() => {
                    const stepNumber = parseInt(tabId.replace('step', '').replace('-tab', ''));
                    updateProgress(stepNumber);
                }, 150);
            }

            // Next/previous button handlers
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = button.getAttribute('data-target');
                    switchToTab(targetId);
                });
            });

            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = button.getAttribute('data-target');
                    switchToTab(targetId);
                });
            });

            // Tab change event
            document.querySelectorAll('[data-bs-toggle="pill"]').forEach(tab => {
                tab.addEventListener('shown.bs.tab', (event) => {
                    const stepId = event.target.getAttribute('data-bs-target').replace('#', '');
                    const stepNumber = parseInt(stepId.replace('step', ''));
                    updateProgress(stepNumber);
                });
            });

            // Closed days handling
            document.querySelectorAll('.closed-day').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const timeInputGroup = this.closest('.opening-hours-row').querySelector(
                        '.time-input-group');
                    if (this.checked) {
                        timeInputGroup.style.display = 'none';
                    } else {
                        timeInputGroup.style.display = 'flex';
                    }
                });
            });

            // Add time slots
            document.querySelectorAll('.add-time-slot').forEach(button => {
                button.addEventListener('click', function() {
                    const day = this.dataset.day;
                    const slotsContainer = document.getElementById(`${day}_additional_slots`);

                    // Clone the first time slot group
                    const timeSlotGroup = this.closest('.time-input-group').cloneNode(true);

                    // Clear the values
                    timeSlotGroup.querySelectorAll('input').forEach(input => {
                        input.value = '';
                    });

                    // Add remove button
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'btn btn-outline-danger btn-sm remove-time-slot';
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                    timeSlotGroup.querySelector('.col-md-2').appendChild(removeBtn);

                    slotsContainer.appendChild(timeSlotGroup);
                });
            });

            // Add new Leistung
            document.getElementById('add-leistung')?.addEventListener('click', function() {
                const container = document.getElementById('leistungen-container');
                const firstItem = container.querySelector('.leistung-item');
                const newItem = firstItem.cloneNode(true);

                // Clear inputs
                newItem.querySelectorAll('input, textarea, select').forEach(input => {
                    input.value = '';
                });

                container.appendChild(newItem);
            });

            // Add new Team member
            document.getElementById('add-team')?.addEventListener('click', function() {
                const container = document.getElementById('team-container');
                const firstItem = container.querySelector('.team-item');
                const newItem = firstItem.cloneNode(true);

                // Clear inputs
                newItem.querySelectorAll('input, textarea').forEach(input => {
                    input.value = '';
                });

                // Clear file input
                newItem.querySelector('input[type="file"]').value = '';

                container.appendChild(newItem);
            });

            // Remove items
            document.addEventListener('click', function(e) {
                // For services
                if (e.target.classList.contains('remove-leistung') ||
                    e.target.closest('.remove-leistung')) {
                    const container = document.getElementById('leistungen-container');
                    if (container.querySelectorAll('.leistung-item').length > 1) {
                        e.target.closest('.leistung-item').remove();
                    }
                }

                // For team members
                if (e.target.classList.contains('remove-team') ||
                    e.target.closest('.remove-team')) {
                    const container = document.getElementById('team-container');
                    if (container.querySelectorAll('.team-item').length > 1) {
                        e.target.closest('.team-item').remove();
                    }
                }

                // For time slots
                if (e.target.classList.contains('remove-time-slot') ||
                    e.target.closest('.remove-time-slot')) {
                    e.target.closest('.time-input-group').remove();
                }
            });

            // Booking option selection
            document.querySelectorAll('.booking-option-card input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Remove all selected classes first
                    document.querySelectorAll('.booking-option-card').forEach(card => {
                        card.classList.remove('selected');
                    });

                    // Add selected class to the chosen one
                    if (this.checked) {
                        this.closest('.booking-option-card').classList.add('selected');
                    }

                    // Show the corresponding config section
                    updateConfigVisibility();
                });
            });

            // Initialize with first option selected if none is selected
            if (!document.querySelector('.booking-option-card input[type="radio"]:checked')) {
                document.querySelector('.booking-option-card input[type="radio"]').checked = true;
                document.querySelector('.booking-option-card').classList.add('selected');
                updateConfigVisibility();
            }

            // Initialize with step 1
            updateProgress(1);
        });

        // Function to update config visibility based on selected booking option
        function updateConfigVisibility() {
            // Hide all config sections first
            document.querySelectorAll('.config-section').forEach(section => {
                section.style.display = 'none';
            });

            // Show the selected config section
            const selectedOption = document.querySelector('input[name="terminbuchung_modus"]:checked');
            if (selectedOption) {
                const configSection = document.getElementById(`${selectedOption.value}_config`);
                if (configSection) {
                    configSection.style.display = 'block';
                }
            }
        }
    </script>
@endsection
