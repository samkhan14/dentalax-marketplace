<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Home | Dentalax' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ $title ?? 'Dentalax – Zahnarztsuche' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe' }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ url('/') . '/frontend/assets/images/og-default.jpg' }}">
    <meta property="og:url" content="{{ url('/') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/api_config.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/api_config.css') }}">

    <style>
        .text-white-50 {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .hover-white:hover {
            color: #ffffff !important;
            transition: color 0.2s ease;
        }
    </style>
</head>
    <body>
        @include('frontend.layouts.header')
        <!-- Main Content -->
        <main style="padding-top: 70px;">
            @yield('content')
        </main>
        <!-- Footer -->
        @include('frontend.layouts.footer')

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Custom JavaScript -->
        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

        <!-- Geolocation + Umkreis Slider Script -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const rangeInput = document.getElementById("umkreisRange");
                const rangeValue = document.getElementById("rangeValue");

                if (rangeInput && rangeValue) {
                    rangeValue.textContent = `${rangeInput.value} km`;
                    rangeInput.addEventListener("input", () => {
                        rangeValue.textContent = `${rangeInput.value} km`;
                    });
                }
            });
        </script>

        <script>
            // Geolocation Funktion
            function sucheInDerNahe() {
                const geoBtn = document.getElementById("geoBtn");
                const geoLoader = document.getElementById("geoLoader");

                geoBtn.disabled = true; // Deaktiviere den Button während der Standortermittlung
                geoLoader.style.display = "block"; // Spinner wird angezeigt

                // Geolocation Anfrage
                if (navigator.geolocation) {
                    console.log("Geolocation wird angefordert...");

                    navigator.geolocation.getCurrentPosition(success, error);
                } else {
                    alert("Geolocation wird von deinem Browser nicht unterstützt.");
                    geoBtn.disabled = false;
                    geoLoader.style.display = "none"; // Spinner wird ausgeblendet
                }

                // Erfolgsfall
                function success(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    const umkreis = 25; // Umkreis auf 25 km setzen

                    console.log("Standort erfolgreich ermittelt: ", lat, lng); // Debugging

                    // Weiterleitung zur /suche Route mit den Koordinaten
                    window.location.href = `/suche?lat=${lat}&lng=${lng}&umkreis=${umkreis}`;
                }

                // Fehlerfall (bei nicht ermittelbarem Standort)
                function error(err) {
                    console.log("Fehler bei Geolocation:", err); // Fehler-Log
                    geoBtn.disabled = false; // Button aktivieren
                    geoLoader.style.display = "none"; // Spinner ausblenden

                    if (err.code === 1) {
                        alert("Standortberechtigung verweigert. Bitte erlaube den Zugriff auf deinen Standort.");
                    } else if (err.code === 2) {
                        alert("Standort konnte nicht ermittelt werden.");
                    } else {
                        alert("Ein unbekannter Fehler ist aufgetreten.");
                    }
                }
            }
        </script>

        <script>
            // Beim Laden der Seite sicherstellen, dass der Spinner ausgeblendet ist
            window.addEventListener("DOMContentLoaded", function() {
                const geoLoader = document.getElementById("geoLoader");
                const geoBtn = document.getElementById("geoBtn");

                // Spinner verstecken, Button aktivieren
                if (geoLoader) geoLoader.style.display = "none"; // Spinner verstecken
                if (geoBtn) geoBtn.disabled = false; // Button wieder aktivieren
            });
        </script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                once: true
            });
        </script>

    </body>

</html>
