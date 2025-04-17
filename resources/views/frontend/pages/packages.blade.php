@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Section -->
    <section class="position-relative overflow-hidden"
        style="padding: 6rem 0 4rem; background: linear-gradient(135deg, rgba(231, 249, 252, 0.9) 0%, rgba(255, 255, 255, 0.95) 100%);">
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjMwIiByPSIyMCIgZmlsbD0icmdiYSg2MywgMTkxLCAyMTYsIDAuMDgpIi8+PGNpcmNsZSBjeD0iMjAiIGN5PSI2MCIgcj0iMTUiIGZpbGw9InJnYmEoNjMsIDE5MSwgMjE2LCAwLjA2KSIvPjxjaXJjbGUgY3g9IjcwIiBjeT0iODUiIHI9IjEwIiBmaWxsPSJyZ2JhKDYzLCAxOTEsIDIxNiwgMC4xKSIvPjwvc3ZnPg==') no-repeat; opacity: 0.7; z-index: 0;">
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Das passende Paket für Ihre Praxis
                    </h1>
                    <p class="lead fs-5 mb-4 text-secondary">Steigern Sie Ihre Online-Präsenz mit einer maßgeschneiderten
                        Lösung für Ihre Zahnarztpraxis</p>

                    <!-- USP-Balken -->
                    <div class="d-inline-flex flex-wrap justify-content-center gap-3 mb-4 py-1">
                        <div class="badge bg-white text-dark px-3 py-2 shadow-sm rounded-pill d-flex align-items-center">
                            <i class="fas fa-search text-primary me-2"></i>
                            <span>Sichtbarkeit erhöhen</span>
                        </div>
                        <div class="badge bg-white text-dark px-3 py-2 shadow-sm rounded-pill d-flex align-items-center">
                            <i class="fas fa-laptop text-primary me-2"></i>
                            <span>Moderne Landingpage</span>
                        </div>
                        <div class="badge bg-white text-dark px-3 py-2 shadow-sm rounded-pill d-flex align-items-center">
                            <i class="fas fa-briefcase text-primary me-2"></i>
                            <span>Stellenangebote schalten</span>
                        </div>
                    </div>

                    <!-- Toggle: monatlich / jährlich -->
                    <div class="d-flex justify-content-center mb-2">
                        <div class="bg-white shadow-sm rounded-pill px-4 py-2 d-inline-flex align-items-center"
                            style="gap: 1rem;">
                            <span class="fw-medium"
                                style="min-width: 70px; text-align: right; color: var(--dental-dark);">Monatlich</span>
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" id="zahlweiseSwitch">
                            </div>
                            <label class="fw-medium" for="zahlweiseSwitch" style="color: var(--dental-dark);">
                                Jährlich <span class="badge bg-success bg-opacity-10 text-success fw-normal small">10 %
                                    Ersparnis</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preispakete -->
    <section class="py-5">
        <div class="container py-3">
            <div class="row g-4 justify-content-center">
                <!-- Basis-Paket -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="card h-100 rounded-4 border-0 shadow-sm hover-card">
                        <div class="card-body p-4 p-xl-5">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="h4 fw-bold mb-0" style="color: var(--dental-dark);">Basis</h5>
                                <div class="badge rounded-pill text-bg-light">Kostenlos</div>
                            </div>

                            <div class="mb-4">
                                <span class="display-5 fw-bold" style="color: var(--dental-primary);">0 €</span>
                            </div>

                            <p class="text-secondary small mb-4">Der ideale Einstieg für Ihre Praxis</p>

                            <ul class="list-unstyled mb-4">
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Lokale Sichtbarkeit auf Google</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Teilnahme am Bewertungssystem</span>
                                </li>
                            </ul>

                            <form method="POST" action="/paket-bestaetigen">
                                <input type="hidden" name="paket" value="Basis">
                                <input type="hidden" name="praxisname" value="Max Mustermann Praxis">
                                <input type="hidden" name="email" value="praxis@example.de">
                                <input type="hidden" name="zahlweise" value="monatlich" class="hidden-zahlweise">
                                <button type="submit" class="btn btn-outline-primary rounded-pill w-100 fw-medium">
                                    Basis-Paket wählen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PraxisPro-Paket -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 rounded-4 border-2 border-primary shadow position-relative hover-card">
                        <div class="card-body p-4 p-xl-5">
                            <!-- Beliebt-Badge -->
                            <div class="position-absolute top-0 end-0 translate-middle-y me-4">
                                <div class="badge rounded-pill text-bg-primary px-3 py-2 shadow-sm">Beliebt</div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="h4 fw-bold mb-0" style="color: var(--dental-dark);">PraxisPro</h5>
                            </div>

                            <div class="mb-4">
                                <span class="display-5 fw-bold" style="color: var(--dental-primary);">
                                    <span class="monatlich-preis">59 €</span>
                                    <span class="jaehrlich-preis d-none">636 €</span>
                                </span>
                                <span class="text-muted fs-6 monatlich-preis">/Monat</span>
                                <span class="text-muted fs-6 jaehrlich-preis d-none">/Jahr</span>
                            </div>

                            <p class="text-secondary small mb-4">Perfekt für wachsende Praxen</p>

                            <ul class="list-unstyled mb-4">
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Eigene moderne Landingpage</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Sichtbarkeit auf Google und Dentalax</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Teilnahme am KI Chat Empfehlung</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Dashboard mit Tracking-Funktionen</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Neue Patienten gewinnen</span>
                                </li>
                            </ul>

                            <form method="POST" action="/paket-bestaetigen">
                                <input type="hidden" name="paket" value="PraxisPro">
                                <input type="hidden" name="praxisname" value="Max Mustermann Praxis">
                                <input type="hidden" name="email" value="praxis@example.de">
                                <input type="hidden" name="zahlweise" value="monatlich" class="hidden-zahlweise">
                                <button type="submit" class="btn btn-primary rounded-pill w-100 fw-medium">
                                    PraxisPro wählen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PraxisPlus-Paket -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 rounded-4 border-0 shadow-sm hover-card">
                        <div class="card-body p-4 p-xl-5">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="h4 fw-bold mb-0" style="color: var(--dental-dark);">PraxisPlus</h5>
                                <div class="badge rounded-pill bg-light text-dark">Premium</div>
                            </div>

                            <div class="mb-4">
                                <span class="display-5 fw-bold" style="color: var(--dental-primary);">
                                    <span class="monatlich-preis">89 €</span>
                                    <span class="jaehrlich-preis d-none">960 €</span>
                                </span>
                                <span class="text-muted fs-6 monatlich-preis">/Monat</span>
                                <span class="text-muted fs-6 jaehrlich-preis d-none">/Jahr</span>
                            </div>

                            <p class="text-secondary small mb-4">Für etablierte und wachsende Praxen</p>

                            <ul class="list-unstyled mb-4">
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Alle Vorteile von PraxisPro</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Eigene Jobanzeigen veröffentlichen</span>
                                </li>
                                <li class="d-flex align-items-center mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-2"
                                        style="width: 24px; height: 24px; background-color: rgba(63, 191, 216, 0.1);">
                                        <i class="fas fa-check text-primary small"></i>
                                    </div>
                                    <span>Zugang zu exklusiven Bewerbungen</span>
                                </li>
                            </ul>

                            <form method="POST" action="/paket-bestaetigen">
                                <input type="hidden" name="paket" value="PraxisPlus">
                                <input type="hidden" name="praxisname" value="Max Mustermann Praxis">
                                <input type="hidden" name="email" value="praxis@example.de">
                                <input type="hidden" name="zahlweise" value="monatlich" class="hidden-zahlweise">
                                <button type="submit" class="btn btn-primary rounded-pill w-100 fw-medium">
                                    PraxisPlus wählen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trust-Elemente -->
            <div class="row mt-5 pt-3">
                <div class="col-md-8 mx-auto">
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-4 text-center">
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                                style="width: 36px; height: 36px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-tooth text-primary"></i>
                            </div>
                            <span class="text-secondary">Über 50.000 Zahnärzte bereits gelistet</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-2">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0"
                                style="width: 36px; height: 36px; background-color: rgba(63, 191, 216, 0.1);">
                                <i class="fas fa-shield-alt text-primary"></i>
                            </div>
                            <span class="text-secondary">DSGVO-konform & Made in Germany</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Vergleich -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <h2 class="h3 mb-3" style="color: var(--dental-dark);">Paketvergleich im Detail</h2>
                    <p class="text-secondary mb-0">Hier sehen Sie alle Features und Vorteile unserer Pakete im Vergleich.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr style="background-color: rgba(63, 191, 216, 0.05);">
                                        <th class="py-3 px-4 border-0">Funktionen</th>
                                        <th class="py-3 text-center border-0">Basis</th>
                                        <th class="py-3 text-center border-0"
                                            style="background-color: rgba(63, 191, 216, 0.1);">PraxisPro</th>
                                        <th class="py-3 text-center border-0">PraxisPlus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3 px-4">Sichtbarkeit in der Suche</td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Bewertungssystem</td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Eigene Landingpage</td>
                                        <td class="text-center py-3"><i class="fas fa-minus text-secondary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Hervorgehobene Darstellung</td>
                                        <td class="text-center py-3"><i class="fas fa-minus text-secondary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Teilnahme am KI-Chat</td>
                                        <td class="text-center py-3"><i class="fas fa-minus text-secondary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Dashboard & Tracking</td>
                                        <td class="text-center py-3"><i class="fas fa-minus text-secondary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Neue Patienten gewinnen</td>
                                        <td class="text-center py-3"><i class="fas fa-minus text-secondary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-check text-primary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Jobanzeigen</td>
                                        <td class="text-center py-3"><i class="fas fa-minus text-secondary"></i></td>
                                        <td class="text-center py-3" style="background-color: rgba(63, 191, 216, 0.03);">
                                            <i class="fas fa-minus text-secondary"></i></td>
                                        <td class="text-center py-3"><i class="fas fa-check text-primary"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Sektion -->
    <section class="py-5">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="h3 mb-3" style="color: var(--dental-dark);">Häufig gestellte Fragen</h2>
                    <p class="text-secondary mb-0">Hier finden Sie Antworten auf die wichtigsten Fragen zu unseren Paketen.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                    Kann ich mein Paket später wechseln?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ja, Sie können jederzeit zu einem höherwertigen Paket wechseln. Bei einem Downgrade ist
                                    dies zum Ende der Vertragslaufzeit möglich. Kontaktieren Sie dafür einfach unseren
                                    Kundenservice.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                    Wie lange ist die Mindestvertragslaufzeit?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Bei monatlicher Zahlung beträgt die Mindestlaufzeit einen Monat mit einer
                                    Kündigungsfrist von 14 Tagen zum Monatsende. Bei jährlicher Zahlung beträgt die
                                    Mindestlaufzeit ein Jahr.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                    Wie schnell ist meine Praxis nach der Anmeldung online?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Die Basis-Informationen Ihrer Praxis sind sofort nach der Anmeldung online. Bei den
                                    Premium-Paketen wird Ihre individuelle Landingpage innerhalb von 2-3 Werktagen
                                    freigeschaltet, nachdem Sie Ihre Daten und Bilder hochgeladen haben.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle-Funktionalität
            const toggle = document.getElementById("zahlweiseSwitch");
            toggle.addEventListener("change", () => {
                const neueZahlweise = toggle.checked ? "jährlich" : "monatlich";
                document.querySelectorAll(".hidden-zahlweise").forEach(el => el.value = neueZahlweise);

                document.querySelectorAll(".monatlich-preis").forEach(el => el.classList.toggle("d-none",
                    toggle.checked));
                document.querySelectorAll(".jaehrlich-preis").forEach(el => el.classList.toggle("d-none", !
                    toggle.checked));
            });

            // Hover-Effekt für Karten
            document.querySelectorAll('.hover-card').forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px)';
                    card.style.boxShadow = '0 0.5rem 1.5rem rgba(0, 0, 0, 0.1)';
                    card.style.transition = 'all 0.3s ease';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = '';
                    card.style.boxShadow = '';
                });
            });

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
