@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Section -->
    <section class="position-relative overflow-hidden"
        style="padding: 6rem 0 4rem; background: linear-gradient(130deg, rgba(231, 249, 252, 0.8) 0%, rgba(255, 255, 255, 0.9) 100%);">
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI3NSIgY3k9IjI1IiByPSIyMCIgZmlsbD0icmdiYSg2MywgMTkxLCAyMTYsIDAuMDgpIi8+PGNpcmNsZSBjeD0iMjUiIGN5PSI3NSIgcj0iMTUiIGZpbGw9InJnYmEoNjMsIDE5MSwgMjE2LCAwLjA2KSIvPjxjaXJjbGUgY3g9IjgwIiBjeT0iODAiIHI9IjEwIiBmaWxsPSJyZ2JhKDYzLCAxOTEsIDIxNiwgMC4xKSIvPjwvc3ZnPg==') no-repeat; opacity: 0.6; z-index: 0;">
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--dental-dark)">Kontaktieren Sie uns</h1>
                    <p class="lead fs-4 text-secondary mb-0">Wir freuen uns auf Ihre Nachricht und antworten
                        schnellstmöglich.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontakt-Abschnitt -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row g-5">
                <!-- Kontaktinformationen -->
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="bg-light p-4 p-lg-5 rounded-4 h-100 shadow-sm position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 w-100 h-100"
                            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjgwIiByPSI2MCIgZmlsbD0icmdiYSg2MywgMTkxLCAyMTYsIDAuMDUpIi8+PC9zdmc+') no-repeat; opacity: 0.8; z-index: 0;">
                        </div>

                        <div class="position-relative">
                            <h3 class="h4 fw-bold mb-4" style="color: var(--dental-dark)">Unsere Kontaktdaten</h3>

                            <div class="d-flex mb-4 align-items-start">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                    style="width: 40px; height: 40px; background-color: var(--dental-primary);">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div>
                                    <h5 class="h6 fw-bold mb-1">Adresse</h5>
                                    <p class="mb-0 text-secondary">Zahnstraße 123<br>10115 Berlin</p>
                                </div>
                            </div>

                            <div class="d-flex mb-4 align-items-start">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                    style="width: 40px; height: 40px; background-color: var(--dental-primary);">
                                    <i class="fas fa-phone text-white"></i>
                                </div>
                                <div>
                                    <h5 class="h6 fw-bold mb-1">Telefon</h5>
                                    <p class="mb-0 text-secondary">(030) 123 456 789</p>
                                </div>
                            </div>

                            <div class="d-flex mb-4 align-items-start">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                    style="width: 40px; height: 40px; background-color: var(--dental-primary);">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h5 class="h6 fw-bold mb-1">E-Mail</h5>
                                    <p class="mb-0 text-secondary">info@dentalax.de</p>
                                </div>
                            </div>

                            <div class="d-flex mb-4 align-items-start">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3"
                                    style="width: 40px; height: 40px; background-color: var(--dental-primary);">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <div>
                                    <h5 class="h6 fw-bold mb-1">Geschäftszeiten</h5>
                                    <p class="mb-0 text-secondary">Mo-Fr: 9:00 - 17:00 Uhr<br>Sa-So: Geschlossen</p>
                                </div>
                            </div>

                            <!-- Social Media Links -->
                            <h5 class="h6 fw-bold mb-3 mt-5">Folgen Sie uns</h5>
                            <div class="d-flex gap-3">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kontaktformular -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-lg-5">
                            <h3 class="h4 fw-bold mb-4" style="color: var(--dental-dark)">Schreiben Sie uns</h3>

                            <form action="/kontakt" method="POST" id="kontaktFormular">
                                <!-- Name und E-Mail -->
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="inputName" name="name"
                                                placeholder="Ihr Name" required>
                                            <label for="inputName">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="inputEmail" name="email"
                                                placeholder="Ihre E-Mail" required>
                                            <label for="inputEmail">E-Mail</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Telefon und Betreff -->
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" id="inputTelefon" name="telefon"
                                                placeholder="Ihre Telefonnummer">
                                            <label for="inputTelefon">Telefon (optional)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="inputBetreff" name="betreff">
                                                <option value="Allgemeine Anfrage">Allgemeine Anfrage</option>
                                                <option value="Praxisregistrierung">Praxisregistrierung</option>
                                                <option value="Presse & Medien">Presse & Medien</option>
                                                <option value="Technische Unterstützung">Technische Unterstützung</option>
                                                <option value="Sonstiges">Sonstiges</option>
                                            </select>
                                            <label for="inputBetreff">Betreff</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Nachricht -->
                                <div class="form-floating mb-4">
                                    <textarea class="form-control" placeholder="Ihre Nachricht" id="inputNachricht" name="nachricht"
                                        style="height: 150px" required></textarea>
                                    <label for="inputNachricht">Ihre Nachricht</label>
                                </div>

                                <!-- Datenschutz -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="datenschutzCheck"
                                        required>
                                    <label class="form-check-label" for="datenschutzCheck">
                                        Ich habe die <a href="/datenschutz"
                                            class="text-decoration-none">Datenschutzerklärung</a> gelesen und stimme der
                                        Verarbeitung meiner Daten zu.
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">
                                        <i class="fas fa-paper-plane me-2"></i> Nachricht senden
                                    </button>
                                </div>
                            </form>

                            <!-- Erfolgs/Fehler-Meldung (versteckt, wird per JS angezeigt) -->
                            <div class="alert alert-success mt-4" id="formErfolg" style="display: none;">
                                Vielen Dank für Ihre Nachricht! Wir werden uns schnellstmöglich bei Ihnen melden.
                            </div>
                            <div class="alert alert-danger mt-4" id="formFehler" style="display: none;">
                                Beim Senden der Nachricht ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark)">So finden Sie uns</h2>
                    <p class="lead text-secondary">Wir sind zentral in Berlin gelegen und gut mit öffentlichen
                        Verkehrsmitteln erreichbar.</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ratio ratio-21x9 shadow-sm rounded-4 overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9713.625298217807!2d13.37858924451547!3d52.525418240906825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a851c655908001%3A0x880d4844943a2059!2sBerlin%20Mitte%2C%20Berlin%2C%20Deutschland!5e0!3m2!1sde!2sde!4v1680447862148!5m2!1sde!2sde"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="h3 fw-bold mb-3" style="color: var(--dental-dark)">Häufig gestellte Fragen</h2>
                    <p class="lead text-secondary">Hier finden Sie Antworten auf die häufigsten Fragen zu Dentalax.</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                    Wie kann ich meine Zahnarztpraxis bei Dentalax anmelden?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Die Anmeldung Ihrer Praxis ist einfach und schnell: Klicken Sie auf "Jetzt registrieren"
                                    in der Navigationsleiste oder besuchen Sie die Seite "Für Zahnärzte". Wählen Sie das für
                                    Sie passende Paket und folgen Sie den Anweisungen im Registrierungsprozess.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                    Welche Kosten entstehen für Patienten bei der Nutzung von Dentalax?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Dentalax ist für Patienten vollständig kostenlos. Die Zahnarztsuche, Praxisinformationen
                                    und die Terminvereinbarung können ohne Registrierung und ohne Kosten genutzt werden.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                    Wie werden meine Daten bei Dentalax geschützt?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Der Schutz Ihrer Daten hat für uns höchste Priorität. Wir arbeiten nach den strengen
                                    Vorgaben der DSGVO und verwenden modernste Verschlüsselungstechnologien. Alle
                                    Informationen werden auf sicheren Servern in Deutschland gespeichert. Details finden Sie
                                    in unserer Datenschutzerklärung.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                    Kann ich als Praxis meine bestehende Software mit Dentalax verbinden?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ja, Dentalax bietet Schnittstellen zu gängigen Praxisverwaltungssystemen. Bei Fragen zur
                                    Integration kontaktieren Sie bitte unseren technischen Support.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                    Wie kann ich eine Position in meiner Praxis ausschreiben?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Nach der Registrierung Ihrer Praxis können Sie im Praxis-Dashboard unter
                                    "Stellenangebote" neue Positionen ausschreiben. Die Anzeigen erscheinen automatisch auf
                                    Ihrer Praxisseite und im Dentalax-Jobportal.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript für das Kontaktformular -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kontaktForm = document.getElementById('kontaktFormular');
            const erfolgMeldung = document.getElementById('formErfolg');
            const fehlerMeldung = document.getElementById('formFehler');

            // Nur Demonstrationszwecke - im echten Einsatz würde das Formular per AJAX abgesendet
            if (kontaktForm) {
                kontaktForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Hier würde normalerweise eine AJAX-Anfrage an den Server geschickt werden

                    // Demo: Erfolgsmeldung nach kurzer Verzögerung anzeigen
                    setTimeout(function() {
                        erfolgMeldung.style.display = 'block';
                        kontaktForm.reset();

                        // Meldung nach 5 Sekunden ausblenden
                        setTimeout(function() {
                            erfolgMeldung.style.display = 'none';
                        }, 5000);
                    }, 1000);
                });
            }
        });
    </script>
@endsection
