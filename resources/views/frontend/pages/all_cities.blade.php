@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Banner mit verbessertem Aussehen -->
    <section class="position-relative" style="margin-bottom: 4rem;">
        <div class="hero-image position-relative"
            style="height: 400px; background-image: url('/static/images/Zahnarzt%20nach%20Stadt%20finden.jpeg'); background-size: cover; background-position: center; border-radius: 0 0 50% 50% / 12%; overflow: hidden;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.75));">
            </div>
            <div class="container position-relative h-100 d-flex flex-column justify-content-center">
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="display-4 fw-bold mb-4" style="color: var(--dental-dark);">Zahnärzte nach Städten</h1>
                    <p class="fs-4 text-muted mb-4">Finden Sie den passenden Zahnarzt in Ihrer Stadt</p>
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <div class="input-group input-group-lg mb-0">
                                <input type="text" id="stadtSearch" class="form-control form-control-lg border-2 py-3"
                                    placeholder="Stadt suchen..."
                                    style="border-color: var(--dental-primary); box-shadow: none;">
                                <span class="input-group-text bg-primary text-white border-0 px-4">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Anzahl Ergebnisse und Info -->
    <section class="mb-5">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-md-7">
                    <h2 class="h3 mb-0"><span id="stadtCount"></span> Städte mit verfügbaren Zahnarztpraxen</h2>
                </div>
                <div class="col-md-5 text-md-end">
                    <p class="text-muted mb-0">Klicken Sie auf eine Stadt, um Zahnärzte zu finden</p>
                </div>
            </div>
            <hr class="mb-4">
        </div>
    </section>

    <!-- Städte Grid -->
    <section class="mb-5">
        <div class="container">
            <div id="staedteGrid" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
                @foreach ($cities as $city)
                    <div class="col">
                        <a href="{{ route('city.doctor.details', $city->slug) }}"
                            class="card h-100 text-center border-0 shadow-sm text-decoration-none rounded-3 overflow-hidden"
                            style="transition: all 0.3s ease"
                            data-stadt="{{ strtolower(str_replace(['ä', 'ö', 'ü', 'ß'], ['ae', 'oe', 'ue', 'ss'], $city->name)) }}">
                            <!-- Farb-Indikator -->
                            <div class="card-img-top"
                                style="height: 5px; background-color:
                        @php
$initial = strtolower(substr($city->name, 0, 1));
                            echo $initial <= 'g' ? '#3fbfd8' : ($initial <= 'n' ? '#7ad4e6' : '#2a8294'); @endphp">
                            </div>
                            <!-- Karteninhalt -->
                            <div class="card-body d-flex align-items-center justify-content-center p-3">
                                <span class="fw-medium"
                                    style="color:
                            @php
$initial = strtolower(substr($city->name, 0, 1));
                                echo $initial <= 'g' ? '#3fbfd8' : ($initial <= 'n' ? '#7ad4e6' : '#2a8294'); @endphp">
                                    {{ $city->name }}
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Zusätzliche Info-Sektion -->
    <section class="bg-light py-5 mb-5 rounded-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="h3 mb-4" style="color: var(--dental-dark);">Deutschlands größte Zahnarztsuche</h2>
                    <p class="mb-4">Dentalax bietet Ihnen Zugang zu über 50.000 Zahnarztpraxen in ganz Deutschland. Finden
                        Sie schnell und einfach den richtigen Zahnarzt in Ihrer Nähe.</p>
                    <div class="d-flex">
                        <div class="me-4 text-center">
                            <div class="fs-1 fw-bold mb-1" style="color: var(--dental-primary);">400+</div>
                            <div class="small text-muted">Städte</div>
                        </div>
                        <div class="me-4 text-center">
                            <div class="fs-1 fw-bold mb-1" style="color: var(--dental-primary);">50.000+</div>
                            <div class="small text-muted">Praxen</div>
                        </div>
                        <div class="text-center">
                            <div class="fs-1 fw-bold mb-1" style="color: var(--dental-primary);">16</div>
                            <div class="small text-muted">Bundesländer</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-4 rounded-4 bg-white shadow-sm">
                        <h3 class="h5 mb-3">Wie finde ich den passenden Zahnarzt?</h3>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-3">
                                <div class="me-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                        style="width: 30px; height: 30px;">1</div>
                                </div>
                                <div>
                                    <strong>Stadt auswählen</strong>
                                    <p class="text-muted mb-0 small">Wählen Sie Ihre Stadt aus der Liste aus</p>
                                </div>
                            </li>
                            <li class="d-flex mb-3">
                                <div class="me-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                        style="width: 30px; height: 30px;">2</div>
                                </div>
                                <div>
                                    <strong>Praxen vergleichen</strong>
                                    <p class="text-muted mb-0 small">Sehen Sie alle verfügbaren Zahnärzte in Ihrer Stadt</p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="me-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white"
                                        style="width: 30px; height: 30px;">3</div>
                                </div>
                                <div>
                                    <strong>Termin vereinbaren</strong>
                                    <p class="text-muted mb-0 small">Kontaktieren Sie die ausgewählte Praxis direkt</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function normalize(str) {
                return str.toLowerCase()
                    .replace(/\u00e4/g, 'ae')
                    .replace(/\u00f6/g, 'oe')
                    .replace(/\u00fc/g, 'ue')
                    .replace(/\u00df/g, 'ss');
            }

            // Get all city cards
            const cityCards = document.querySelectorAll('#staedteGrid .col a');

            // Search functionality
            document.getElementById('stadtSearch').addEventListener('input', function() {
                const query = normalize(this.value);

                cityCards.forEach(card => {
                    const cityName = card.dataset.stadt;
                    if (cityName.includes(query)) {
                        card.parentElement.style.display = 'block';
                    } else {
                        card.parentElement.style.display = 'none';
                    }
                });

                // Update city count
                const visibleCount = document.querySelectorAll('#staedteGrid .col').length;
                document.getElementById('stadtCount').textContent = visibleCount;
            });

            // Add hover effects
            cityCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('shadow');
                    this.style.transform = "translateY(-3px)";
                    this.style.backgroundColor = "var(--dental-light)";
                });

                card.addEventListener('mouseleave', function() {
                    this.classList.remove('shadow');
                    this.style.transform = "translateY(0)";
                    this.style.backgroundColor = "";
                });
            });
        });
    </script>
@endsection
