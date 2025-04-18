<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class FrontendController extends Controller
{
    public $data;


    public function index()
    {
        $this->data['title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.index');
    }

    public function allCities()
    {
        $this->data['title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        // $cities = City::orderBy('name')->get();
        return view('frontend.pages.all_cities');
    }

    public function forDentists()
    {
        $this->data['title'] = "Fuer Zahnarztsuche | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.for_dentists');
    }

    public function Packages()
    {
        $this->data['title'] = "Packages | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.packages');
    }

    public function jobOffers()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.job_offers');
    }

    public function jobDetails()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.job_details');
    }

    public function Counselor()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.counselor');
    }

    public function Contact()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.contact');
    }

    public function aboutUs()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.about_us');
    }

    public function patientLoginPage()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.patient_login_page');
    }

    public function dentistLoginPage()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.dentist_login_page');
    }

    public function mainRegistrationPage()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.main_registration_page');
    }

    public function patientRegistrationPage()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.patient_registration_page');
    }

    public function dentistRegistrationPage()
    {
        $this->data['title'] = "Stellenangebote | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.dentist_registration_page');
    }

    public function landingPageForDentist()
    {
        $this->data['title'] = "Fuer Zahnarztsuche | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] = url('/');
        $this->data['og:url'] = url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] = url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.dentist_landing_page');
    }
}
