 <!-- Header / Navigation -->
 <header class="header-modern">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('frontend/assets/images/Dentalax Logo Neu.png') }}" alt="Dentalax Logo"
                    style="height: 60px;" class="logo-animation">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" id="zahnaerzteDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-tooth me-1 d-none d-lg-inline-block"></i> Zahnärzte
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-animation"
                            aria-labelledby="zahnaerzteDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('for_dentists')}}">
                                    <i class="fas fa-info-circle me-2 text-primary"></i> Für Zahnärzte
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('packages')}}">
                                    <i class="fas fa-tags me-2 text-primary"></i> Pakete & Preise
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('dentist.Dashboard')}}">
                                    <i class="fas fa-tachometer-alt me-2 text-primary"></i> Praxis-Dashboard
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('job_offers')}}">
                            <i class="fas fa-briefcase me-1 d-none d-lg-inline-block"></i> Stellenangebote
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('counselor')}}">
                            <i class="fas fa-book-medical me-1 d-none d-lg-inline-block"></i> Ratgeber
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('contact')}}">
                            <i class="fas fa-envelope me-1 d-none d-lg-inline-block"></i> Kontakt
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('about_us')}}">
                            <i class="fas fa-info-circle me-1 d-none d-lg-inline-block"></i> Über uns
                        </a>
                    </li>
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle px-3" href="#" id="loginDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> Login
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-animation"
                            aria-labelledby="loginDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('patient.login.page')}}">
                                    <i class="fas fa-user me-2 text-primary"></i> Patienten-Login
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('dentist.login.page')}}">
                                    <i class="fas fa-tooth me-2 text-primary"></i> Zahnarzt-Login
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-primary rounded-pill px-4 nav-btn-animation" href="{{ route('registration.page')}}">
                            <i class="fas fa-user-plus me-1"></i> Registrieren
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
