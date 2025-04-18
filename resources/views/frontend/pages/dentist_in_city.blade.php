@extends('frontend.layouts.master')
@section('content')

<section class="pt-4">
  <div class="container-fluid">
    <div class="row flex-nowrap" style="height: calc(100vh - 100px); overflow: hidden;">

      <!-- Linke Spalte: Filter -->
      <div id="filterSection" class="col-md-2 bg-white p-4 overflow-auto shadow-sm rounded-start" style="max-height: 100%; border-right: 1px solid rgba(0,0,0,0.05);">
        <h5 class="mb-4 fw-bold text-primary">Filtereinstellungen</h5>
        <form>
          <div class="mb-4">
            <label class="form-label fw-medium small text-secondary">Welche Leistung suchen Sie?</label>
            <div class="input-group">
              <span class="input-group-text bg-white border-end-0">
                <i class="fas fa-tooth text-primary"></i>
              </span>
              <input type="text" class="form-control border-start-0 ps-0" placeholder="z.B. Kontrolle">
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label fw-medium small text-secondary">...in welcher Stadt?</label>
            <div class="input-group">
              <span class="input-group-text bg-white border-end-0">
                <i class="fas fa-map-marker-alt text-primary"></i>
              </span>
              <input type="text" class="form-control border-start-0 ps-0" placeholder="z.B. Frankfurt"
                value="">
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label fw-medium small text-secondary">Umkreissuche</label>
            <div class="mb-2 d-flex justify-content-between align-items-center">
              <span class="badge rounded-pill bg-light text-dark">5 km</span>
              <span class="badge rounded-pill bg-primary px-2">20.5 km</span>
              <span class="badge rounded-pill bg-light text-dark">100 km</span>
            </div>
            <input type="range" class="form-range" min="5" max="100" step="5" value=""
              oninput="this.previousElementSibling.querySelector('.bg-primary').textContent = this.value + ' km'">
          </div>

          <div class="mb-4">
            <label class="form-label fw-medium small text-secondary">Akzeptierte Versicherungsart</label>
            <div class="d-flex flex-column gap-2 mt-2">
              <div class="form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" id="selbstzahler">
                <label class="form-check-label" for="selbstzahler">Selbstzahler</label>
              </div>
              <div class="form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" id="privat">
                <label class="form-check-label" for="privat">Privat</label>
              </div>
              <div class="form-check custom-checkbox">
                <input class="form-check-input" type="checkbox" id="kasse">
                <label class="form-check-label" for="kasse">Kasse</label>
              </div>
            </div>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary px-4 py-2 fw-medium">
              <i class="fas fa-search me-2"></i>Anwenden
            </button>
            <button type="reset" class="btn btn-outline-secondary btn-sm">Filter zurücksetzen</button>
          </div>
        </form>
      </div>

      <!-- Mittlere Spalte: Ergebnisse -->
      <div id="resultsSection" class="col-md-5 p-4 overflow-auto bg-white" style="max-height: 100%;">

          <h1 class="mb-3 fw-bold fs-2 text-primary">Zahnarzt in Berlin</h1>
          <p class="lead text-muted mb-4">In Berlin finden Sie mit Dentalax schnell eine vertrauenswürdige Zahnarztpraxis – geprüft, nah und zuverlässig.</p>

          {{-- keep in else condition --}}
          {{-- <div class="d-flex align-items-center mb-4">
            <h4 class="mb-0 fw-bold">Suchergebnisse für</h4>
            <span class="ms-3 badge bg-primary"> gefunden</span>
          </div> --}}


          {{-- keepmin condition --}}
          <!-- Hervorhebung von Premium-Einträgen für bessere Sichtbarkeit -->
          <style>
            .premium-praxis-card {
              border-left: 4px solid #40bfd8 !important;
              background-color: #f8fdfe !important;
              position: relative;
              overflow: hidden;
            }

            .highlight-feature {
              color: #2a8294;
              font-weight: 500;
            }
          </style>

          <div class="results-wrapper">
            <!-- Simuliere einige Premium-Ergebnisse für die ersten 3 Listenelemente -->
              <div class="card mb-4 shadow-sm border-0 result-card {{ 'premium-praxis-card' if is_premium else '' }}"
                   data-lat="{{ praxis.lat }}" data-lng="{{ praxis.lng }}" data-id="{{ loop.index }}">
                {% if is_premium %}

                {% endif %}
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title fw-bold mb-0">{{ praxis.name|e }}</h5>
                    {% if praxis.beansprucht and praxis.beansprucht.lower() == "ja" %}
                      <span class="badge bg-success">Verifiziert</span>
                    {% endif %}
                  </div>

                  <p class="card-text mb-2 d-flex align-items-center text-secondary">
                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                    {{ praxis.straße|e }}, {{ praxis.plz }} {{ praxis.stadt|e }}
                  </p>

                  <div class="d-flex align-items-center mb-3 flex-wrap">
                    <span class="badge rounded-pill bg-light text-dark me-2 mb-1">
                      <i class="fas fa-route me-1 text-primary"></i>
                      {{ praxis.entfernung }} km
                    </span>

                    {% if is_premium %}
                      <span class="badge rounded-pill bg-info text-white me-2 mb-1">PraxisPro</span>

                      <!-- Zusätzliche Features für Premium-Einträge -->
                      <span class="badge rounded-pill bg-light text-dark mb-1">
                        <i class="fas fa-star text-warning me-1"></i>
                        Top-Bewertung
                      </span>
                    {% elif praxis.paket and praxis.paket|lower == "praxisplus" %}
                      <span class="badge rounded-pill bg-primary text-white mb-1">PraxisPlus</span>
                    {% endif %}
                  </div>

                  {% if is_premium %}
                  <div class="d-flex flex-wrap mb-3 gap-3">
                    <div class="highlight-feature small">
                      <i class="fas fa-check-circle me-1"></i>Digitale Röntgentechnik
                    </div>
                    <div class="highlight-feature small">
                      <i class="fas fa-check-circle me-1"></i>Barrierefreier Zugang
                    </div>
                    <div class="highlight-feature small">
                      <i class="fas fa-check-circle me-1"></i>Flexible Termine
                    </div>
                  </div>
                  {% endif %}

                  <div class="d-flex mt-3 flex-wrap gap-2">
                    {% if praxis.telefon %}
                      <a class="btn btn-sm btn-outline-primary" href="tel:{{ praxis.telefon }}">
                        <i class="fas fa-phone-alt me-1"></i>{{ praxis.telefon }}
                      </a>
                    {% endif %}

                    {% if praxis.webseite %}
                      <a class="btn btn-sm btn-outline-secondary" href="{{ praxis.webseite|e }}" target="_blank">
                        <i class="fas fa-globe me-1"></i>Website
                      </a>
                    {% endif %}

                    {% if praxis.slug %}
                      <a class="btn btn-sm btn-outline-info" href="/zahnarzt/{{ praxis.slug }}" target="_blank">
                        <i class="fas fa-info-circle me-1"></i>Details
                      </a>
                    {% endif %}

                    <button class="btn btn-sm btn-outline-dark ms-auto show-on-map-btn"
                            onclick="highlightMarker({{ praxis.lat }}, {{ praxis.lng }}, {{ loop.index }})">
                      <i class="fas fa-map-pin me-1"></i>Auf Karte
                    </button>
                  </div>
                </div>
              </div>
            {% endfor %}
          </div>

          {% if gesamt_seiten > 1 %}
            <nav aria-label="Seitennavigation" class="mt-5">
              <ul class="pagination justify-content-center">
                <!-- Erste Seite -->
                {% if seite > 1 %}
                  <li class="page-item">
                    <a class="page-link rounded-start" href="{{ url_for('suche', ort=ort, behandlung=behandlung, umkreis=umkreis, seite=1) }}" aria-label="Erste Seite">
                      <i class="fas fa-angle-double-left"></i>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="{{ url_for('suche', ort=ort, behandlung=behandlung, umkreis=umkreis, seite=seite - 1) }}">
                      <i class="fas fa-angle-left"></i>
                    </a>
                  </li>
                {% endif %}

                <!-- Mittelbereich mit max. 5 Seiten -->
                {% set start = max(seite - 2, 1) %}
                {% set end = min(start + 4, gesamt_seiten) %}
                {% if end - start < 4 %}
                  {% set start = max(end - 4, 1) %}
                {% endif %}

                {% for s in range(start, end + 1) %}
                  <li class="page-item {% if s == seite %}active{% endif %}">
                    <a class="page-link" href="{{ url_for('suche', ort=ort, behandlung=behandlung, umkreis=umkreis, seite=s) }}">{{ s }}</a>
                  </li>
                {% endfor %}

                <!-- Weiter & Letzte -->
                {% if seite < gesamt_seiten %}
                  <li class="page-item">
                    <a class="page-link" href="{{ url_for('suche', ort=ort, behandlung=behandlung, umkreis=umkreis, seite=seite + 1) }}">
                      <i class="fas fa-angle-right"></i>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link rounded-end" href="{{ url_for('suche', ort=ort, behandlung=behandlung, umkreis=umkreis, seite=gesamt_seiten) }}" aria-label="Letzte Seite">
                      <i class="fas fa-angle-double-right"></i>
                    </a>
                  </li>
                {% endif %}
              </ul>
            </nav>
          {% endif %}

          {% if seo_route %}
            <div class="mt-5 pt-3 border-top">
              <h2 class="h4 text-primary mb-3">Zahnärztliche Versorgung in {{ ort }}</h2>
              <p class="text-secondary">{{ seo_footer }}</p>
            </div>
          {% endif %}

        {% else %}
          <div class="alert alert-light border rounded-3 p-4 text-center mt-4 shadow-sm">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h5 class="fw-bold">Keine Praxen gefunden</h5>
            <p class="text-muted mb-0">Leider konnten wir keine Zahnärzte im Umkreis von <strong>{{ ort }}</strong> finden. Bitte versuchen Sie es mit einem anderen Ort oder erweitern Sie den Suchradius.</p>
          </div>
        {% endif %}
      </div>

      <!-- Rechte Spalte: Karte -->
      <div id="mapSection" class="col-md-5 p-0" style="position: sticky; top: 80px; height: calc(100vh - 120px);">
        <div class="position-relative h-100">
          <div id="map" style="width: 100%; height: 100%;"></div>

          <!-- Map Controls Overlay -->
          <div class="position-absolute top-0 end-0 m-3 d-flex flex-column gap-2" style="z-index: 1000;">
            <button class="btn btn-light shadow-sm" id="mapZoomIn" title="Hineinzoomen">
              <i class="fas fa-plus"></i>
            </button>
            <button class="btn btn-light shadow-sm" id="mapZoomOut" title="Herauszoomen">
              <i class="fas fa-minus"></i>
            </button>
            <button class="btn btn-light shadow-sm" id="mapReset" title="Kartenansicht zurücksetzen">
              <i class="fas fa-expand"></i>
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Stiländerungen -->
<style>
  /* Custom Scrollbar */
  ::-webkit-scrollbar {
    width: 8px;
    height: 8px;
  }

  ::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
  }

  ::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 4px;
  }

  ::-webkit-scrollbar-thumb:hover {
    background: #40bfd8;
  }

  /* Filter Styles */
  .form-control:focus, .input-group-text {
    box-shadow: none;
    border-color: #e2e8f0;
  }

  .form-range::-webkit-slider-thumb {
    background: #40bfd8;
  }

  .form-range::-moz-range-thumb {
    background: #40bfd8;
  }

  .form-check-input:checked {
    background-color: #40bfd8;
    border-color: #40bfd8;
  }

  /* Result Cards */
  .result-card {
    transition: all 0.2s ease-in-out;
    border-left: 4px solid transparent;
  }

  .result-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    border-left: 4px solid #40bfd8;
  }

  .result-card.active {
    border-left: 4px solid #40bfd8;
    background-color: #f0fafc;
  }

  /* Pagination */
  .pagination .page-link {
    border: none;
    color: #2a8294;
    margin: 0 2px;
  }

  .pagination .page-item.active .page-link {
    background-color: #40bfd8;
    color: white;
  }

  .pagination .page-link:hover {
    background-color: #e9f7fa;
    color: #40bfd8;
  }

  /* Map Controls */
  #mapZoomIn, #mapZoomOut, #mapReset {
    width: 36px;
    height: 36px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
  }

  /* Mobile Styles */
  @media (max-width: 768px) {
    .mobile-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: 60px;
      background-color: white;
      border-top: 1px solid #eaeaea;
      display: flex;
      justify-content: space-around;
      align-items: center;
      z-index: 1050;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
    }

    .mobile-nav button {
      background: none;
      border: none;
      padding: 10px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 0.8rem;
      color: #6c757d;
    }

    .mobile-nav button i {
      font-size: 1.2rem;
      margin-bottom: 4px;
    }

    .mobile-nav button.active {
      color: #40bfd8;
    }

    #filterSection, #resultsSection, #mapSection {
      display: none;
      height: calc(100vh - 120px) !important;
      width: 100%;
    }

    .section-visible {
      display: block !important;
    }
  }
</style>

<!-- Google Maps Script -->
{% if ergebnisse %}
<script>
  let map;
  let markers = [];
  let infoWindow;
  let bounds;

  function initMap() {
    bounds = new google.maps.LatLngBounds();
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 12,
      center: {
        lat: {{ ergebnisse[0].lat if ergebnisse[0].lat else 50.1109 }},
        lng: {{ ergebnisse[0].lng if ergebnisse[0].lng else 8.6821 }}
      },
      styles: [
        { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] },
        { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] },
        { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] },
        { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] },
        { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] },
        { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] },
        { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] },
        { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] },
        { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] },
        { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] },
        { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] },
        { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] },
        { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] },
        { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }
      ],
      mapTypeControl: false,
      streetViewControl: false,
      fullscreenControl: false,
    });

    infoWindow = new google.maps.InfoWindow();

    {% for praxis in ergebnisse %}
      {% if praxis.lat and praxis.lng %}
        (function() {
          {% set is_premium = (loop.index == 1 or loop.index == 3 or loop.index == 5) %}
          const marker = new google.maps.Marker({
            position: { lat: {{ praxis.lat }}, lng: {{ praxis.lng }} },
            map: map,
            title: "{{ praxis.name|e }}",
            animation: google.maps.Animation.DROP,
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              fillColor: '{{ "#40bfd8" if is_premium else "#999" }}',
              fillOpacity: 1,
              strokeColor: '#ffffff',
              strokeWeight: 2,
              scale: {{ "10" if is_premium else "8" }}
            }
          });

          const content = `
            <div style="max-width: 280px; padding: 10px;">
              <h5 style="font-weight: bold; margin-bottom: 8px; color: #2a8294">{{ praxis.name|e }}</h5>
              <p style="margin-bottom: 8px;">{{ praxis.straße|e }}, {{ praxis.plz }} {{ praxis.stadt|e }}</p>
              <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                {% if praxis.telefon %}
                  <a href="tel:{{ praxis.telefon }}" style="text-decoration: none; color: #40bfd8;">
                    <i class="fas fa-phone-alt" style="margin-right: 4px;"></i>Anrufen
                  </a>
                {% endif %}
                {% if praxis.webseite %}
                  <a href="{{ praxis.webseite|e }}" target="_blank" style="text-decoration: none; color: #40bfd8;">
                    <i class="fas fa-globe" style="margin-right: 4px;"></i>Website
                  </a>
                {% endif %}
                {% if praxis.slug %}
                  <a href="/zahnarzt/{{ praxis.slug }}" style="text-decoration: none; color: #40bfd8;">
                    <i class="fas fa-info-circle" style="margin-right: 4px;"></i>Details
                  </a>
                {% endif %}
              </div>
              {% if is_premium %}
              <div style="margin-top: 10px; background-color: #f0fafc; padding: 8px; border-radius: 4px; border-left: 3px solid #40bfd8;">
                <span style="font-weight: bold; color: #2a8294;">Premium-Praxis</span>
              </div>
              {% endif %}
            </div>
          `;

          marker.addListener("click", () => {
            infoWindow.setContent(content);
            infoWindow.open(map, marker);

            // Highlight corresponding card
            highlightCard({{ loop.index }});
          });

          markers.push(marker);
          bounds.extend(marker.getPosition());
        })();
      {% endif %}
    {% endfor %}

    map.fitBounds(bounds);

    // Map controls
    document.getElementById('mapZoomIn').addEventListener('click', () => {
      map.setZoom(map.getZoom() + 1);
    });

    document.getElementById('mapZoomOut').addEventListener('click', () => {
      map.setZoom(map.getZoom() - 1);
    });

    document.getElementById('mapReset').addEventListener('click', () => {
      map.fitBounds(bounds);
    });
  }

  function highlightMarker(lat, lng, index) {
    if (markers[index - 1]) {
      // Pan to the marker
      map.panTo({ lat: lat, lng: lng });
      map.setZoom(14);

      // Open info window
      infoWindow.close();
      google.maps.event.trigger(markers[index - 1], 'click');

      // Add bounce animation
      markers.forEach(m => m.setAnimation(null));
      markers[index - 1].setAnimation(google.maps.Animation.BOUNCE);
      setTimeout(() => {
        markers[index - 1].setAnimation(null);
      }, 1500);

      // In mobile view, switch to map
      if (window.innerWidth <= 768) {
        switchMobileSection('mapSection', document.querySelectorAll(".mobile-nav button")[2]);
      }
    }
  }

  function highlightCard(index) {
    const cards = document.querySelectorAll('.result-card');
    cards.forEach(card => card.classList.remove('active'));

    // Find card with matching data-id
    const targetCard = document.querySelector(`.result-card[data-id="${index}"]`);
    if (targetCard) {
      targetCard.classList.add('active');

      // Scroll card into view if not visible
      targetCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }
</script>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5-mhirvhY2E-IF63IcQMQcykRbuZabYo&callback=initMap">
</script>
{% endif %}

<!-- Mobile Bottom Navigation -->
<div class="mobile-nav d-md-none">
  <button onclick="switchMobileSection('filterSection', this)" title="Filter">
    <i class="fas fa-sliders-h"></i>
    <span>Filter</span>
  </button>
  <button onclick="switchMobileSection('resultsSection', this)" class="active" title="Ergebnisse">
    <i class="fas fa-list"></i>
    <span>Ergebnisse</span>
  </button>
  <button onclick="switchMobileSection('mapSection', this)" title="Karte">
    <i class="fas fa-map-marked-alt"></i>
    <span>Karte</span>
  </button>
</div>

<script>
  function switchMobileSection(sectionId, btn) {
    const allSections = ["filterSection", "resultsSection", "mapSection"];
    const allButtons = document.querySelectorAll(".mobile-nav button");

    allSections.forEach(id => {
      const el = document.getElementById(id);
      if (el) el.classList.remove("section-visible");
    });

    allButtons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    const target = document.getElementById(sectionId);
    if (target) target.classList.add("section-visible");

    // Trigger resize for map
    if (sectionId === 'mapSection' && typeof google !== 'undefined' && google.maps && map) {
      google.maps.event.trigger(map, 'resize');
    }
  }

  window.addEventListener("DOMContentLoaded", () => {
    if (window.innerWidth <= 768) {
      switchMobileSection("resultsSection", document.querySelectorAll(".mobile-nav button")[1]);
    }
  });

  // Add event listeners for range input for live updating
  const rangeInput = document.querySelector('input[type="range"]');
  if (rangeInput) {
    rangeInput.addEventListener('input', function() {
      const badge = this.previousElementSibling.querySelector('.bg-primary');
      if (badge) {
        badge.textContent = this.value + ' km';
      }
    });
  }
</script>
{% endblock %}

@endsection
