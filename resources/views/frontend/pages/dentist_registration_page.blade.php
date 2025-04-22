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
                            <form id="dentistRegistrationForm" method="POST"
                                action="{{ route('dentist.registration.store') }}" class="needs-validation" novalidate>
                                @csrf
                                <!-- Plan Info (hidden if no plan selected) -->
                                @if (session('selected_plan_id'))
                                    <div class="alert alert-info mb-4">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Sie registrieren sich für das Paket: <strong>{{ $plan->name }}</strong>
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <input type="hidden" name="billing_cycle"
                                            value="{{ session('selected_billing_type', 'monthly') }}">
                                    </div>
                                    @else
                                    <div class="alert alert-info mb-4">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Sie registrieren sich für das Paket: <strong>Basis</strong>
                                        <input type="hidden" name="plan_id" value="1">
                                        <input type="hidden" name="billing_cycle" value="monthly">
                                    </div>
                                @endif

                                <!-- Practice Info -->
                                <h3 class="h5 fw-bold mb-4" style="color: var(--dental-dark);">
                                    <i class="fas fa-building me-2 text-primary"></i> Praxisinformationen
                                </h3>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="practice_name" name="practice_name"
                                        required>
                                    <label for="practice_name">Praxisname</label>
                                    <div class="invalid-feedback">Bitte geben Sie den Namen Ihrer Praxis ein.</div>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="practice_description" name="practice_description" style="height: 100px"></textarea>
                                    <label for="practice_description">Kurze Praxisbeschreibung (optional)</label>
                                </div>

                                <!-- Dentist Info -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-user-md me-2 text-primary"></i> Ansprechpartner
                                </h3>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="vorname" name="vorname"
                                                required>
                                            <label for="vorname">Vorname</label>
                                            <div class="invalid-feedback">Bitte geben Sie Ihren Vornamen ein.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nachname" name="nachname"
                                                required>
                                            <label for="nachname">Nachname</label>
                                            <div class="invalid-feedback">Bitte geben Sie Ihren Nachnamen ein.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <label for="email">E-Mail-Adresse</label>
                                    <div class="invalid-feedback">Bitte geben Sie eine gültige E-Mail-Adresse ein.</div>
                                </div>

                                <!-- Password -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-lock me-2 text-primary"></i> Zugangspasswort
                                </h3>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                            <label for="password">Passwort</label>
                                            <div class="invalid-feedback">Mindestens 8 Zeichen mit Groß-/Kleinbuchstaben,
                                                Zahlen und Sonderzeichen</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" required>
                                            <label for="password_confirmation">Passwort bestätigen</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i> Praxisadresse
                                </h3>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="permanent_address"
                                        name="permanent_address" required>
                                    <label for="permanent_address">Straße & Hausnummer</label>
                                    <div class="invalid-feedback">Bitte geben Sie Straße und Hausnummer ein.</div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="postal_code"
                                                name="postal_code" required>
                                            <label for="postal_code">Postleitzahl (optional)</label>
                                            <div class="invalid-feedback">Bitte geben Sie eine gültige Postleitzahl ein.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="city_id" name="city_id" required>
                                                <option value="" selected disabled>Bitte wählen</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="city_id">Stadt</label>
                                            <div class="invalid-feedback">Bitte wählen Sie eine Stadt aus.</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact -->
                                <h3 class="h5 fw-bold mt-4 mb-3" style="color: var(--dental-dark);">
                                    <i class="fas fa-phone me-2 text-primary"></i> Kontaktinformationen
                                </h3>

                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                    <label for="phone">Telefonnummer</label>
                                    <div class="invalid-feedback">Bitte geben Sie eine gültige Telefonnummer ein.</div>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="url" class="form-control" id="website" name="website">
                                    <label for="website">Webseite (optional)</label>
                                </div>

                                <!-- Privacy -->
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="datenschutz" name="datenschutz"
                                        required>
                                    <label class="form-check-label" for="datenschutz">
                                        Ich habe die <a href="/datenschutz" target="_blank">Datenschutzerklärung</a>
                                        gelesen und stimme zu.
                                    </label>
                                    <div class="invalid-feedback">Sie müssen den Datenschutzbestimmungen zustimmen.</div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill" id="submitBtn">
                                        <i class="fas fa-paper-plane me-2"></i> Praxis jetzt registrieren
                                    </button>
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
            const form = document.getElementById('dentistRegistrationForm');
            const submitBtn = document.getElementById('submitBtn');
            const privacyCheckbox = document.getElementById('datenschutz');
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');

            // Create error element if it doesn't exist
            if (!document.getElementById('password_confirmation-error')) {
                const errorElement = document.createElement('div');
                errorElement.id = 'password_confirmation-error';
                errorElement.className = 'invalid-feedback';
                passwordConfirmInput.parentNode.appendChild(errorElement);
            }

            // Enable/disable submit button based on privacy checkbox
            if (privacyCheckbox) {
                privacyCheckbox.addEventListener('change', function() {
                    submitBtn.disabled = !this.checked;
                });
                submitBtn.disabled = !privacyCheckbox.checked;
            }

            // Real-time password validation
            function validatePassword() {
                const errorElement = document.getElementById('password_confirmation-error');

                if (passwordInput.value !== passwordConfirmInput.value) {
                    passwordConfirmInput.classList.add('is-invalid');
                    if (errorElement) {
                        errorElement.textContent = 'Die Passwörter stimmen nicht überein';
                    }
                    return false;
                } else {
                    passwordConfirmInput.classList.remove('is-invalid');
                    if (errorElement) {
                        errorElement.textContent = '';
                    }
                    return true;
                }
            }

            passwordInput.addEventListener('input', validatePassword);
            passwordConfirmInput.addEventListener('input', validatePassword);

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (!validatePassword()) {
                    return;
                }

                // Show loading state
                const originalBtnText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Wird verarbeitet...';

                // Clear previous errors
                document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                // Submit via AJAX
                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: new FormData(form)
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect;
                        }
                    })
                    .catch(error => {
                        // Reset button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;

                        // Handle validation errors
                        if (error.errors) {
                            Object.entries(error.errors).forEach(([field, messages]) => {
                                const input = form.querySelector(`[name="${field}"]`);
                                const errorElement = document.getElementById(
                                        `${field}-error`) ||
                                    input?.closest('.form-floating')?.querySelector(
                                        '.invalid-feedback');

                                if (input) {
                                    input.classList.add('is-invalid');
                                }
                                if (errorElement) {
                                    errorElement.textContent = messages[0];
                                }
                            });
                        }

                        // Show general errors
                        if (error.message) {
                            alert(error.message);
                        }
                    });
            });

            // Initialize AOS if available
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true
                });
            }
        });
    </script>
@endsection
