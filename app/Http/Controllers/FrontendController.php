<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Plan;
use App\Models\DentistProfile;

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

        $cities = City::orderBy('name')->get();
        return view('frontend.pages.all_cities', compact('cities'));
    }

    public function dentistCityDetailPage(City $city)
    {
        $this->data['title'] = "Zahnarzt in " . $city->name . " | Dentalax – Zahnarztsuche in ganz Deutschland";

        // Eager load both city and user relationships
        $dentists = DentistProfile::with(['city', 'user'])
            ->where('city_id', $city->id)
            // ->where('status', 'active')
            ->get();
        return view('frontend.pages.dentist_city_detail_page', compact('city', 'dentists'));
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

        $plans = Plan::where('is_active', '1')->get();
        // dd($plans);
        return view('frontend.pages.packages', compact('plans'));
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
