@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Section -->
    <section class="position-relative overflow-hidden"
        style="padding: 8rem 0 6rem; background: linear-gradient(160deg, #2a8294 0%, #40bfd8 100%);">
        <!-- Abstrakte Design-Elemente im Hintergrund -->
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjgwIiByPSI2MCIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iNDAiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wOCkiLz48L3N2Zz4=') no-repeat; opacity: 0.8; z-index: 0;">
        </div>

        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center text-white">
                    <h1 class="display-3 fw-bold mb-4">Über uns</h1>
                    <p class="lead fs-3 mb-0">Wir revolutionieren die digitale Zahnmedizin</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision und Mission -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Unsere Vision</h2>
                    <p class="lead mb-0">Wir gestalten die Zukunft der Zahnarztbranche digital, innovativ und
                        patientenorientiert. Dentalax verbindet Patienten und Zahnärzte durch moderne Technologie und
                        schafft ein Ökosystem, das das Gesundheitswesen nachhaltig verbessert.</p>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4"
                                style="width: 80px; height: 80px; background-color: rgba(64, 191, 216, 0.15);">
                                <i class="fas fa-lightbulb fa-2x text-primary"></i>
                            </div>
                            <h3 class="h4 mb-3">Innovation</h3>
                            <p class="text-muted mb-0">Wir entwickeln kontinuierlich neue Lösungen, die den digitalen Wandel
                                in der Zahnmedizin vorantreiben und die Behandlungsqualität verbessern.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4"
                                style="width: 80px; height: 80px; background-color: rgba(64, 191, 216, 0.15);">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                            <h3 class="h4 mb-3">Verbindung</h3>
                            <p class="text-muted mb-0">Wir schaffen Brücken zwischen Patienten und Zahnärzten und
                                ermöglichen eine effiziente Kommunikation und Zusammenarbeit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-card">
                        <div class="card-body p-4 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4"
                                style="width: 80px; height: 80px; background-color: rgba(64, 191, 216, 0.15);">
                                <i class="fas fa-shield-alt fa-2x text-primary"></i>
                            </div>
                            <h3 class="h4 mb-3">Vertrauen</h3>
                            <p class="text-muted mb-0">Wir legen größten Wert auf Datenschutz, Transparenz und
                                Zuverlässigkeit – für das Vertrauen von Patienten und Zahnärzten.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Unsere Geschichte -->
    <section class="py-5" style="background-color: #f8fcfd;">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="{{ asset('frontend/assets/images/about/team.jpg') }}" alt="Dentalax Team"
                        class="img-fluid rounded-4 shadow">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h6 class="text-primary fw-bold text-uppercase mb-3">Unsere Geschichte</h6>
                    <h2 class="display-5 fw-bold mb-4">Wie alles begann</h2>
                    <p class="lead text-secondary mb-4">Dentalax wurde 2017 mit einer klaren Mission gegründet: Die
                        Digitalisierung der Zahnmedizin zu beschleunigen und gleichzeitig die Herausforderungen moderner
                        Zahnarztpraxen zu lösen.</p>

                    <p class="mb-4">Was als kleine Plattform für die digitale Präsenz von Zahnarztpraxen begann, hat sich
                        zu einer umfassenden Lösung entwickelt, die heute von über 50.000 Zahnärzten in ganz Deutschland
                        genutzt wird. Unser interdisziplinäres Team aus Entwicklern, Designern und Dental-Experten arbeitet
                        täglich daran, innovative Lösungen zu entwickeln, die sowohl Patienten als auch Zahnärzten
                        zugutekommen.</p>

                    <div class="d-flex align-items-center mt-4">
                        <div class="me-4">
                            <img src="{{ asset('frontend/assets/images/about/founder.jpg') }}" alt="Gründer"
                                class="rounded-circle" width="60" height="60">
                        </div>
                        <div>
                            <p class="fw-bold mb-1">Dr. Thomas Müller</p>
                            <p class="text-muted mb-0">Gründer & CEO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Unser Versprechen -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Unser Versprechen</h2>
                    <p class="lead mb-0">Wir revolutionieren die Zahnarztbranche durch digitale Innovation und setzen neue
                        Maßstäbe für die Zukunft der Dentalmedizin.</p>
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0 me-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px; background-color: rgba(64, 191, 216, 0.15);">
                                    <i class="fas fa-laptop-medical fa-lg text-primary"></i>
                                </div>
                                <h4 class="card-title mb-0 fw-bold">Digitale Exzellenz</h4>
                            </div>
                            <p class="card-text">Wir bieten modernste technologische Lösungen, die den digitalen Wandel in
                                der Zahnarztbranche vorantreiben und gleichzeitig benutzerfreundlich und effizient sind.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0 me-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px; background-color: rgba(64, 191, 216, 0.15);">
                                    <i class="fas fa-search-location fa-lg text-primary"></i>
                                </div>
                                <h4 class="card-title mb-0 fw-bold">Maximale Sichtbarkeit</h4>
                            </div>
                            <p class="card-text">Unsere Plattform sorgt dafür, dass Zahnarztpraxen im Internet optimal
                                gefunden werden und ihre digitale Präsenz ohne technisches Know-how maximieren können.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0 me-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px; background-color: rgba(64, 191, 216, 0.15);">
                                    <i class="fas fa-briefcase fa-lg text-primary"></i>
                                </div>
                                <h4 class="card-title mb-0 fw-bold">Personal­rekrutierung</h4>
                            </div>
                            <p class="card-text">Wir lösen die Herausforderung des Fachkräftemangels durch gezielte
                                Stellenangebote und innovative Recruiting-Lösungen speziell für die Dentalbranche.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Statement -->
    <section class="py-5 position-relative" style="background: linear-gradient(to right, #2a8294, #40bfd8);">
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjgwIiByPSI2MCIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iNDAiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wOCkiLz48L3N2Zz4=') no-repeat; opacity: 0.8; z-index: 0;">
        </div>

        <div class="container position-relative py-5" style="z-index: 1;">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center text-white">
                    <h2 class="display-4 fw-bold mb-4">Unsere Mission</h2>
                    <p class="lead fs-4 mb-4">Wir setzen digitale Meilensteine in der Zahnmedizin und revolutionieren die
                        Art, wie Zahnarztpraxen ihren Online-Auftritt gestalten, mit Patienten kommunizieren und
                        qualifiziertes Personal finden.</p>
                    <a href="{{ route('packages')}}" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow mt-3">
                        <i class="fas fa-rocket me-2"></i> Werden Sie Teil der Revolution
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Unser Team -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Unser Team</h2>
                    <p class="lead mb-0">Ein interdisziplinäres Team aus Spezialisten mit einer gemeinsamen Vision: Die
                        Digitalisierung der Zahnmedizin voranzutreiben und neue Standards zu setzen.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-4">
                            <div class="rounded-circle mx-auto mb-4 overflow-hidden" style="width: 140px; height: 140px;">
                                <img src="{{ asset('frontend/assets/images/about/team1.jpg') }}" alt="Team Mitglied"
                                    class="img-fluid w-100 h-100 object-fit-cover">
                            </div>
                            <h5 class="fw-bold mb-1">Dr. Thomas Müller</h5>
                            <p class="text-primary mb-3">Gründer & CEO</p>
                            <p class="text-muted mb-3">Zahnarzt mit 15 Jahren Erfahrung und Vision für die digitale
                                Transformation der Dentalbranche.</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-4">
                            <div class="rounded-circle mx-auto mb-4 overflow-hidden" style="width: 140px; height: 140px;">
                                <img src="{{ asset('frontend/assets/images/about/team2.jpg') }}" alt="Team Mitglied"
                                    class="img-fluid w-100 h-100 object-fit-cover">
                            </div>
                            <h5 class="fw-bold mb-1">Julia Weber</h5>
                            <p class="text-primary mb-3">CTO</p>
                            <p class="text-muted mb-3">Entwicklerin und Architektin unserer Plattform mit Leidenschaft für
                                benutzerfreundliche Technologien.</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-4">
                            <div class="rounded-circle mx-auto mb-4 overflow-hidden" style="width: 140px; height: 140px;">
                                <img src="{{ asset('frontend/assets/images/about/team3.jpg') }}" alt="Team Mitglied"
                                    class="img-fluid w-100 h-100 object-fit-cover">
                            </div>
                            <h5 class="fw-bold mb-1">Martin Klein</h5>
                            <p class="text-primary mb-3">Marketing Director</p>
                            <p class="text-muted mb-3">Experte für digitales Marketing mit Fokus auf SEO und
                                Wachstumsstrategien im Healthcare-Sektor.</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-4">
                            <div class="rounded-circle mx-auto mb-4 overflow-hidden" style="width: 140px; height: 140px;">
                                <img src="{{ asset('frontend/assets/images/about/team4.jpg') }}" alt="Team Mitglied"
                                    class="img-fluid w-100 h-100 object-fit-cover">
                            </div>
                            <h5 class="fw-bold mb-1">Sarah Becker</h5>
                            <p class="text-primary mb-3">Customer Success</p>
                            <p class="text-muted mb-3">Verantwortlich für Kundenzufriedenheit und Optimierung der
                                Nutzererfahrung unserer Partnerzahnärzte.</p>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-circle mx-1">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Warum Dentalax -->
    <section class="py-5" style="background-color: #f8fcfd;">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Warum Dentalax?</h2>
                    <p class="lead mb-0">Wir bieten mehr als nur ein Verzeichnis – wir sind eine umfassende Plattform, die
                        Zahnarztpraxen bei allen digitalen Herausforderungen unterstützt.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 50px; height: 50px; background-color: #40bfd8;">
                                <i class="fas fa-check text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold mb-2">Führende Technologie</h4>
                            <p class="text-muted mb-0">Unsere Plattform nutzt modernste Technologien für optimale
                                Performance und Benutzerfreundlichkeit.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 50px; height: 50px; background-color: #40bfd8;">
                                <i class="fas fa-check text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold mb-2">Branchenexpertise</h4>
                            <p class="text-muted mb-0">Unser Team verfügt über umfassende Erfahrung und Fachwissen in der
                                Dentalbranche.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 50px; height: 50px; background-color: #40bfd8;">
                                <i class="fas fa-check text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold mb-2">Maßgeschneiderte Lösungen</h4>
                            <p class="text-muted mb-0">Unsere Pakete sind speziell auf die Bedürfnisse moderner
                                Zahnarztpraxen zugeschnitten.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 50px; height: 50px; background-color: #40bfd8;">
                                <i class="fas fa-check text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold mb-2">Kontinuierliche Innovation</h4>
                            <p class="text-muted mb-0">Wir entwickeln unsere Plattform ständig weiter, um immer einen
                                Schritt voraus zu sein.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 50px; height: 50px; background-color: #40bfd8;">
                                <i class="fas fa-check text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold mb-2">Persönlicher Support</h4>
                            <p class="text-muted mb-0">Unser engagiertes Support-Team steht Ihnen bei allen Fragen und
                                Anliegen zur Seite.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 50px; height: 50px; background-color: #40bfd8;">
                                <i class="fas fa-check text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="h5 fw-bold mb-2">Messbarer Erfolg</h4>
                            <p class="text-muted mb-0">Transparente Analysen und Berichte zeigen Ihnen den Erfolg Ihrer
                                digitalen Präsenz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="position-relative py-5" style="background-color: #2a8294;">
        <div class="position-absolute top-0 end-0 w-100 h-100"
            style="background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Y2lyY2xlIGN4PSI4MCIgY3k9IjgwIiByPSI2MCIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iNDAiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wOCkiLz48L3N2Zz4='); opacity: 0.8;">
        </div>
        <div class="container position-relative py-5">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="display-5 fw-bold text-white mb-3">Bereit, die Zukunft der Zahnmedizin mitzugestalten?</h2>
                    <p class="lead text-white opacity-80 mb-0">Werden Sie Teil der digitalen Revolution in der
                        Dentalbranche und bringen Sie Ihre Praxis auf das nächste Level.</p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <a href="{{ route('packages')}}" class="btn btn-light btn-lg rounded-pill px-5 py-3 shadow">
                        <i class="fas fa-rocket me-2"></i> Jetzt starten
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>
@endsection
