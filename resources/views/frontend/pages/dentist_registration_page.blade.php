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
                        <i class="fas fa-clinic-medical text-primary fa-2x"></i>
                    </div>
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Praxis registrieren</h1>
                    <p class="lead fs-4 text-secondary mb-0">Melden Sie Ihre Zahnarztpraxis an und erreichen Sie mehr
                        Patienten</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registrierungsformular -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="alert alert-primary alert-dismissible fade show mb-4" role="alert">
                        message info
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
                        <div class="card-header p-4 bg-primary text-white">
                            <div class="d-flex align-items-center">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle me-3"
                                    style="width: 48px; height: 48px; background-color: rgba(255, 255, 255, 0.2);">
                                    <i class="fas fa-tooth fa-lg"></i>
                                </div>
                                <div>
                                    <h2 class="h4 fw-bold mb-1">{{ ucfirst($plan->name) ?? 'Basis' }}</h2>
                                    <p class="mb-0">Geben Sie Ihre Praxisdaten ein</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            <form method="POST" action="/register" class="needs-validation" novalidate>
                                <!-- Praxisdaten -->
                                <h3 class="h5 fw-bold mb-4" style="color: var(--dental-dark);">
                                    <i class="fas fa-building me-2 text-primary"></i> Praxisinformationen
                                </h3>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="praxisname" name="praxisname"
                                        placeholder="Praxisname" required value="">
                                    <label for="praxisname">Praxisname</label>
                                    <div class="invalid-feedback">Bitte geben Sie den Namen Ihrer Praxis ein.</div>
                                </div>

                                <!-- Inhaber/Ansprechpartner -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-user-md me-2 text-primary"></i> Ansprechpartner
                                </h3>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="vorname" name="vorname"
                                                placeholder="Vorname" required value="">
                                            <label for="vorname">Vorname</label>
                                            <div class="invalid-feedback">Bitte geben Sie Ihren Vornamen ein.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nachname" name="nachname"
                                                placeholder="Nachname" required value="">
                                            <label for="nachname">Nachname</label>
                                            <div class="invalid-feedback">Bitte geben Sie Ihren Nachnamen ein.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="name@example.com" required value="">
                                    <label for="email">E-Mail-Adresse</label>
                                    <div class="invalid-feedback">Bitte geben Sie eine gültige E-Mail-Adresse ein.</div>
                                </div>

                                <!-- Passwort -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-lock me-2 text-primary"></i> Zugangspasswort
                                </h3>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="passwort" name="passwort"
                                                placeholder="Passwort" required>
                                            <label for="passwort">Passwort</label>
                                            <div class="invalid-feedback">Bitte geben Sie ein sicheres Passwort ein.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="passwort_bestaetigen"
                                                name="passwort_bestaetigen" placeholder="Passwort bestätigen" required>
                                            <label for="passwort_bestaetigen">Passwort bestätigen</label>
                                            <div class="invalid-feedback">Die Passwörter stimmen nicht überein.</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Adresse -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i> Praxisadresse
                                </h3>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="strasse" name="strasse"
                                        placeholder="Straße & Hausnummer" required value="">
                                    <label for="strasse">Straße & Hausnummer</label>
                                    <div class="invalid-feedback">Bitte geben Sie Straße und Hausnummer ein.</div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="plz" name="plz"
                                                placeholder="PLZ" required value="">
                                            <label for="plz">Postleitzahl</label>
                                            <div class="invalid-feedback">Bitte geben Sie eine gültige Postleitzahl ein.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="stadt" name="stadt"
                                                placeholder="Stadt" required value="">
                                            <label for="stadt">Stadt</label>
                                            <div class="invalid-feedback">Bitte geben Sie Ihren Ort ein.</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kontaktdaten -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-phone me-2 text-primary"></i> Kontaktinformationen
                                </h3>

                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="telefon" name="telefon"
                                        placeholder="Telefonnummer" required value="">
                                    <label for="telefon">Telefonnummer</label>
                                    <div class="invalid-feedback">Bitte geben Sie eine gültige Telefonnummer ein.</div>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="url" class="form-control" id="webseite" name="webseite"
                                        placeholder="https://www.example.com" value="">
                                    <label for="webseite">Webseite (optional)</label>
                                </div>

                                <!-- Öffnungszeiten -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-clock me-2 text-primary"></i> Öffnungszeiten
                                </h3>

                                <div class="card mb-4 border-0 bg-light">
                                    <div class="card-body p-3">
                                        <div class="small text-secondary mb-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Sie können Ihre Öffnungszeiten nach der Registrierung in Ihrem Praxisprofil
                                            ergänzen.
                                        </div>
                                    </div>
                                </div>

                                <!-- Datenschutz & AGB -->
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="datenschutz" name="datenschutz"
                                        required>
                                    <label class="form-check-label" for="datenschutz">
                                        Ich habe die <a href="/datenschutz" target="_blank">Datenschutzerklärung</a> und
                                        <a href="/agb" target="_blank">AGB</a> gelesen und stimme diesen zu.
                                    </label>
                                    <div class="invalid-feedback">Sie müssen den Datenschutzbestimmungen und AGB zustimmen,
                                        um fortzufahren.</div>
                                </div>

                                <div class="mb-5 form-check">
                                    <input type="checkbox" class="form-check-input" id="marketing" name="marketing">
                                    <label class="form-check-label" for="marketing">
                                        Ich möchte Neuigkeiten und spezielle Angebote für Zahnärzte per E-Mail erhalten.
                                    </label>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                                        <i class="fas fa-paper-plane me-2"></i> Praxis jetzt registrieren
                                    </button>
                                    <p class="small text-center text-secondary mt-2">
                                        Nach der Registrierung erhalten Sie eine Bestätigungsmail.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="card border-0 shadow-sm rounded-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card-body p-4">
                                <h4 class="fw-bold h5 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-shield-alt me-2 text-primary"></i> Ihre Daten sind sicher
                                </h4>
                                <p class="mb-0 text-secondary">Wir nehmen den Schutz Ihrer persönlichen Daten sehr ernst.
                                    Ihre Informationen werden verschlüsselt übertragen und gemäß den DSGVO-Richtlinien
                                    gespeichert.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vorteile -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Ihre Vorteile mit Dentalax</h2>
                    <p class="lead text-secondary">Steigern Sie Ihre Online-Präsenz und gewinnen Sie neue Patienten</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Vorteil 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-search-location text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Mehr Sichtbarkeit</h3>
                            <p class="text-secondary mb-0">Werden Sie von Patienten in Ihrer Nähe gefunden und steigern Sie
                                Ihre lokale Präsenz.</p>
                        </div>
                    </div>
                </div>

                <!-- Vorteil 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-calendar-check text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Online-Termine</h3>
                            <p class="text-secondary mb-0">Lassen Sie Patienten direkt online Termine buchen und reduzieren
                                Sie Telefonanfragen.</p>
                        </div>
                    </div>
                </div>

                <!-- Vorteil 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-star text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Bewertungen</h3>
                            <p class="text-secondary mb-0">Sammeln Sie positive Bewertungen und bauen Sie einen
                                hervorragenden Online-Ruf auf.</p>
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

            // Formularvalidierung
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    // Überprüfen, ob Passwörter übereinstimmen
                    const passwort = document.getElementById('passwort');
                    const passwortBestaetigen = document.getElementById('passwort_bestaetigen');

                    if (passwort.value !== passwortBestaetigen.value) {
                        passwortBestaetigen.setCustomValidity(
                            'Die Passwörter stimmen nicht überein');
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        passwortBestaetigen.setCustomValidity('');
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
@endsection
