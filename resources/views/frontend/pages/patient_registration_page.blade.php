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
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Patientenkonto erstellen</h1>
                    <p class="lead fs-4 text-secondary mb-0">Registrieren Sie sich, um schneller Termine zu buchen und Ihre
                        Zahngesundheit im Blick zu behalten</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registrierungsformular -->
    <section class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
                        <div class="card-body p-4 p-md-5">
                            <!-- resources/views/patient/register.blade.php -->
                            <form id="patientRegistrationForm" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="vorname" name="vorname"
                                                placeholder="Vorname" required>
                                            <label for="vorname">Vorname</label>
                                            <div class="invalid-feedback" id="vorname-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nachname" name="nachname"
                                                placeholder="Nachname" required>
                                            <label for="nachname">Nachname</label>
                                            <div class="invalid-feedback" id="nachname-error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="E-Mail Adresse" required>
                                    <label for="email">E-Mail-Adresse</label>
                                    <div class="invalid-feedback" id="email-error"></div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="Telefonnummer" required>
                                    <label for="phone">Telefonnummer</label>
                                </div>

                                {{-- <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="dob" name="dob">
                                    <label for="dob">Geburtsdatum</label>
                                </div> --}}

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Passwort" required>
                                            <label for="password">Passwort</label>
                                            <div class="invalid-feedback" id="password-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Passwort bestätigen" required>
                                            <label for="password_confirmation">Passwort bestätigen</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="postal_code" name="postal_code"
                                                placeholder="PLZ">
                                            <label for="postal_code">PLZ </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Adresse" required>
                                            <label for="city">Adresse </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="datenschutz" name="datenschutz"
                                        required>
                                    <label class="form-check-label" for="datenschutz">
                                        Ich akzeptiere die <a href="/datenschutz"
                                            target="_blank">Datenschutzbestimmungen</a>
                                    </label>
                                    <div class="invalid-feedback" id="datenschutz-error"></div>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill" id="submitBtn"
                                        disabled>
                                        <span id="submitText"><i class="fas fa-user-plus me-2"></i> Registrieren</span>
                                        <span id="submitSpinner" class="spinner-border spinner-border-sm d-none"></span>
                                    </button>
                                </div>
                            </form>

                            <div id="formErrors" class="alert alert-danger d-none mt-3"></div>

                            <div id="formErrors" class="alert alert-danger d-none"></div>
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
                                    gespeichert. Wir geben Ihre Daten niemals ohne Ihre Zustimmung an Dritte weiter.</p>
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
                    <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark);">Ihre Vorteile als registrierter Patient
                    </h2>
                    <p class="lead text-secondary">Nutzen Sie alle Funktionen von Dentalax für eine bessere Zahngesundheit
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Vorteil 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-calendar-alt text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Online-Termine</h3>
                            <p class="text-secondary mb-0">Buchen Sie Zahnarzttermine online, ohne Wartezeiten am Telefon -
                                einfach und flexibel, rund um die Uhr.</p>
                        </div>
                    </div>
                </div>

                <!-- Vorteil 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-bell text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Erinnerungen</h3>
                            <p class="text-secondary mb-0">Erhalten Sie automatische Erinnerungen für anstehende Kontrollen
                                und vergessen Sie nie wieder einen wichtigen Termin.</p>
                        </div>
                    </div>
                </div>

                <!-- Vorteil 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                                style="width: 60px; height: 60px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-history text-primary fa-lg"></i>
                            </div>
                            <h3 class="h5 fw-bold mb-3" style="color: var(--dental-dark);">Behandlungshistorie</h3>
                            <p class="text-secondary mb-0">Behalten Sie den Überblick über Ihre Behandlungen und teilen Sie
                                Ihre Historie bei Bedarf mit neuen Zahnärzten.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('patientRegistrationForm');
            const submitBtn = document.getElementById('submitBtn');
            const privacyCheckbox = document.getElementById('datenschutz');
            const formErrors = document.getElementById('formErrors');
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');

            // Enable/disable submit button based on privacy checkbox
            privacyCheckbox.addEventListener('change', function() {
                submitBtn.disabled = !this.checked;
            });

            // Real-time password match validation
            passwordConfirmInput.addEventListener('input', function() {
                if (passwordInput.value !== passwordConfirmInput.value) {
                    passwordConfirmInput.classList.add('is-invalid');
                    document.getElementById('password-error').textContent =
                        'Passwörter stimmen nicht überein';
                } else {
                    passwordConfirmInput.classList.remove('is-invalid');
                    document.getElementById('password-error').textContent = '';
                }
            });

            // Form submission handler
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Show loading state
                document.getElementById('submitText').classList.add('d-none');
                document.getElementById('submitSpinner').classList.remove('d-none');
                submitBtn.disabled = true;

                // Clear previous errors
                formErrors.classList.add('d-none');
                document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                // Submit via AJAX
                fetch("{{ route('patient.registration.store') }}", {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: new FormData(form)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success(data.message, 'Success');
                            setTimeout(function() {
                                window.location.href = data.redirect;
                            }, 2000); // Redirect after 2 seconds (optional)
                        } else {
                            throw data;
                        }
                    })
                    .catch(error => {
                        // Reset button state
                        document.getElementById('submitText').classList.remove('d-none');
                        document.getElementById('submitSpinner').classList.add('d-none');
                        submitBtn.disabled = !privacyCheckbox.checked;

                        // Handle validation errors
                        if (error.errors) {
                            Object.entries(error.errors).forEach(([field, messages]) => {
                                const input = form.querySelector(`[name="${field}"]`);
                                const errorElement = document.getElementById(`${field}-error`);

                                if (input && errorElement) {
                                    input.classList.add('is-invalid');
                                    errorElement.textContent = messages[0];
                                }
                            });
                        }

                        // Show general errors
                        if (error.message) {
                            formErrors.textContent = error.message;
                            formErrors.classList.remove('d-none');
                        }
                    });
            });
        });

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
