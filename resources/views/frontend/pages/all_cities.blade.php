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

    <!-- Städte Grid - Verbesserte Darstellung -->
    <section class="mb-5">
        <div class="container">
            <div id="staedteGrid" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
                <!-- Hier werden die Städte per JavaScript eingefügt -->
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
            const staedte = [
                "Aachen", "Aalen", "Achern", "Ahlen", "Ahrensburg", "Albstadt", "Alzey", "Amberg", "Andernach",
                "Annaberg-Buchholz", "Ansbach", "Apolda", "Arnsberg", "Aschaffenburg", "Augsburg",
                "Bad Dürkheim", "Bad Homburg", "Bad Honnef", "Bad Kreuznach", "Bad Mergentheim", "Bad Nauheim",
                "Bad Neuenahr-Ahrweiler", "Bad Oeynhausen", "Bad Pyrmont", "Bad Reichenhall", "Bad Salzuflen",
                "Bad Segeberg", "Bad Tölz", "Baden-Baden", "Balingen", "Bamberg", "Bautzen", "Bayreuth",
                "Beckum", "Bensheim", "Bergheim", "Bergisch Gladbach", "Berlin", "Bernburg", "Biberach",
                "Bielefeld", "Bingen", "Bitburg", "Böblingen", "Bocholt", "Bochum", "Bonn", "Borken", "Bottrop",
                "Brandenburg", "Braunschweig", "Bremen", "Bremerhaven", "Bretten", "Bruchsal", "Brühl",
                "Buchholz", "Bühl", "Buxtehude",
                "Calw", "Castrop-Rauxel", "Celle", "Cham", "Chemnitz", "Cloppenburg", "Coburg", "Coesfeld",
                "Coswig", "Cottbus", "Crailsheim", "Cuxhaven",
                "Dachau", "Darmstadt", "Deggendorf", "Delbrück", "Delmenhorst", "Dessau-Roßlau", "Detmold",
                "Dinslaken", "Döbeln", "Dormagen", "Dorsten", "Dortmund", "Dresden", "Duisburg", "Düren",
                "Düsseldorf",
                "Eberswalde", "Ehingen", "Eisenach", "Eisenhüttenstadt", "Eitorf", "Ellwangen", "Elmshorn",
                "Emden", "Emmendingen", "Emsdetten", "Erding", "Erfurt", "Erftstadt", "Erkelenz", "Erkrath",
                "Erlangen", "Eschweiler", "Essen", "Esslingen", "Ettlingen", "Euskirchen",
                "Falkensee", "Fellbach", "Filderstadt", "Flensburg", "Frankenthal", "Frankfurt",
                "Frankfurt (Oder)", "Frechen", "Freiberg", "Freiburg", "Freising", "Freital", "Friedberg",
                "Friedrichshafen", "Fulda", "Fürstenfeldbruck", "Fürth",
                "Garbsen", "Geldern", "Gelnhausen", "Gelsenkirchen", "Gera", "Gerlingen", "Germering", "Gießen",
                "Gifhorn", "Gladbeck", "Glauchau", "Göppingen", "Görlitz", "Goslar", "Gotha", "Göttingen",
                "Greifswald", "Greiz", "Greven", "Grevenbroich", "Griesheim", "Grimma", "Gronau", "Gründau",
                "Güstrow", "Gütersloh", "Gummersbach",
                "Hagen", "Halberstadt", "Halle", "Haltern", "Hamburg", "Hameln", "Hamm", "Hanau", "Hannover",
                "Hattingen", "Heidelberg", "Heidenheim", "Heilbronn", "Heinsberg", "Helmstedt", "Hemer",
                "Hennef", "Hennigsdorf", "Herford", "Herne", "Herrenberg", "Herten", "Herzogenaurach", "Hilden",
                "Hildesheim", "Hof", "Hofheim", "Holzminden", "Homburg", "Horb", "Höxter", "Hoyerswerda",
                "Husum",
                "Ibbenbüren", "Idar-Oberstein", "Ilmenau", "Ingelheim", "Ingolstadt", "Iserlohn", "Itzehoe",
                "Jena", "Jülich",
                "Kaiserslautern", "Kamen", "Kamenz", "Karlsruhe", "Kassel", "Kaufbeuren", "Kehl", "Kempten",
                "Kerpen", "Kiel", "Kirchheim unter Teck", "Kitzingen", "Kleve", "Koblenz", "Köln",
                "Königswinter", "Konstanz", "Korbach", "Krefeld", "Kreuztal", "Kulmbach",
                "Laatzen", "Lahr", "Landau", "Landsberg am Lech", "Landshut", "Langen", "Langenfeld",
                "Langenhagen", "Lauf an der Pegnitz", "Leer", "Leichlingen", "Leipzig", "Lemgo", "Leonberg",
                "Leverkusen", "Limburg", "Lindau", "Lingen", "Lippstadt", "Löhne", "Lörrach", "Lübbecke",
                "Lübeck", "Luckenwalde", "Lüdenscheid", "Ludwigsburg", "Ludwigshafen", "Lüneburg", "Lünen",
                "Magdeburg", "Maintal", "Mainz", "Mannheim", "Marburg", "Marl", "Mechernich", "Meerbusch",
                "Meiningen", "Meißen", "Melle", "Memmingen", "Menden", "Meppen", "Merseburg", "Merzig",
                "Metzingen", "Minden", "Moers", "Mönchengladbach", "Montabaur", "Mosbach", "Mühlhausen",
                "Mülheim", "München", "Münster",
                "Nagold", "Naumburg", "Neckarsulm", "Neubrandenburg", "Neuburg an der Donau",
                "Neumarkt in der Oberpfalz", "Neumünster", "Neunkirchen", "Neuruppin", "Neuss",
                "Neustadt am Rübenberge", "Neustadt an der Weinstraße", "Neutraubling", "Neuwied", "Nienburg",
                "Norderstedt", "Nordhausen", "Nördlingen", "Nordhorn", "Northeim", "Nürnberg", "Nürtingen",
                "Oberhausen", "Oberkirch", "Obernburg am Main", "Offenbach", "Offenburg", "Öhringen",
                "Oldenburg", "Olpe", "Oranienburg", "Osnabrück", "Osterholz-Scharmbeck", "Ostfildern",
                "Ottobrunn", "Overath",
                "Paderborn", "Papenburg", "Passau", "Peine", "Pfaffenhofen an der Ilm", "Pforzheim",
                "Pinneberg", "Pirmasens", "Pirna", "Plauen", "Plettenberg", "Potsdam", "Püttlingen",
                "Quedlinburg", "Quickborn",
                "Radebeul", "Radevormwald", "Radolfzell", "Rastatt", "Ratingen", "Ravensburg", "Recklinghausen",
                "Regensburg", "Reinbek", "Remscheid", "Rendsburg", "Reutlingen", "Rheda-Wiedenbrück", "Rheine",
                "Rheinfelden", "Riesa", "Rietberg", "Rodgau", "Rosenheim", "Rostock", "Rotenburg an der Wümme",
                "Rottweil", "Rudolstadt", "Rüsselsheim",
                "Saalfeld", "Saarbrücken", "Saarlouis", "Salzgitter", "Salzwedel", "Sangerhausen",
                "Sankt Augustin", "Sankt Ingbert", "Schleswig", "Schmalkalden", "Schönebeck", "Schorndorf",
                "Schwabach", "Schwäbisch Gmünd", "Schwäbisch Hall", "Schwandorf", "Schwelm", "Schwerin",
                "Schwerte", "Schwetzingen", "Seevetal", "Senftenberg", "Siegburg", "Siegen", "Sindelfingen",
                "Singen", "Sinsheim", "Soest", "Solingen", "Soltau", "Sondershausen", "Sonneberg", "Speyer",
                "Spremberg", "Stade", "Stadtallendorf", "Starnberg", "Stendal", "Stolberg", "Stralsund",
                "Straubing", "Stuhr", "Stuttgart", "Suhl", "Sulzbach",
                "Tauberbischofsheim", "Teltow", "Torgau", "Traunstein", "Trier", "Troisdorf", "Tübingen",
                "Tuttlingen",
                "Überlingen", "Uelzen", "Ulm", "Unna",
                "Varel", "Vechta", "Velbert", "Verden", "Viersen", "Villingen-Schwenningen", "Völklingen",
                "Vreden",
                "Waghäusel", "Waiblingen", "Waldkirch", "Waldshut-Tiengen", "Walldorf", "Waltrop",
                "Wangen im Allgäu", "Warburg", "Waren", "Warendorf", "Weiden in der Oberpfalz", "Weil am Rhein",
                "Weilheim in Oberbayern", "Weimar", "Weinheim", "Weißenfels", "Weißwasser", "Werdau",
                "Wernigerode", "Wesel", "Wetzlar", "Wiesbaden", "Wilhelmshaven", "Willich", "Winnenden",
                "Wismar", "Witten", "Wittenberg", "Wittlich", "Wolfenbüttel", "Wolfsburg", "Worms", "Wülfrath",
                "Wunstorf", "Wuppertal", "Würselen", "Würzburg",
                "Xanten",
                "Zeitz", "Zittau", "Zweibrücken", "Zwickau"
            ];

            // Zeige Anzahl der Städte
            document.getElementById('stadtCount').textContent = staedte.length;

            function normalize(str) {
                return str.toLowerCase()
                    .replace(/\u00e4/g, 'ae')
                    .replace(/\u00f6/g, 'oe')
                    .replace(/\u00fc/g, 'ue')
                    .replace(/\u00df/g, 'ss');
            }

            function renderStaedte(filtered = staedte) {
                const container = document.getElementById('staedteGrid');
                container.innerHTML = '';

                // Aktualisiere die Anzahl angezeigter Städte
                document.getElementById('stadtCount').textContent = filtered.length;

                filtered.forEach(stadt => {
                    const slug = normalize(stadt).replace(/\s+/g, '-');

                    // Erstelle das Column-Element
                    const col = document.createElement('div');
                    col.className = 'col';

                    // Erstelle die Karte
                    const card = document.createElement('a');
                    card.href = `/zahnarzt-in-${slug}`;
                    card.dataset.stadt = normalize(stadt);
                    card.className =
                        "card h-100 text-center border-0 shadow-sm text-decoration-none rounded-3 overflow-hidden";
                    card.style.transition = "all 0.3s ease";

                    // Farb-Indikator am oberen Rand (verschiedene Blautöne)
                    const colorIndicator = document.createElement('div');
                    colorIndicator.className = "card-img-top";
                    colorIndicator.style.height = "5px";

                    // Verschiedene Blautöne basierend auf dem Anfangsbuchstaben der Stadt
                    const initialLetter = stadt.charAt(0).toLowerCase();
                    let color;

                    if (initialLetter <= 'g') {
                        color = "#3fbfd8"; // dental-primary
                    } else if (initialLetter <= 'n') {
                        color = "#7ad4e6"; // dental-secondary
                    } else {
                        color = "#2a8294"; // dental-dark
                    }

                    colorIndicator.style.backgroundColor = color;

                    // Karteninhalt
                    const cardBody = document.createElement('div');
                    cardBody.className = "card-body d-flex align-items-center justify-content-center p-3";

                    const stadtName = document.createElement('span');
                    stadtName.className = "fw-medium";
                    stadtName.style.color = color;
                    stadtName.innerText = stadt;

                    cardBody.appendChild(stadtName);
                    card.appendChild(colorIndicator);
                    card.appendChild(cardBody);
                    col.appendChild(card);

                    // Hover-Effekt
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

                    container.appendChild(col);
                });
            }

            document.getElementById('stadtSearch').addEventListener('input', function() {
                const query = normalize(this.value);
                const filtered = staedte.filter(s => normalize(s).includes(query));
                renderStaedte(filtered);
            });

            renderStaedte();
        });
    </script>
@endsection
