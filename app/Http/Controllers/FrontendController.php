<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $data;


    public function index (){
        $this->data['title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] =   url('/');
        $this->data['og:url'] =  url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] =  url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.index');
    }

    public function forDentists (){
        $this->data['title'] = "Fuer Zahnarztsuche | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] =   url('/');
        $this->data['og:url'] =  url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] =  url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.for_dentists');
    }

    public function landingPageForDentist (){
        $this->data['title'] = "Fuer Zahnarztsuche | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax";
        $this->data['canonical'] =   url('/');
        $this->data['og:url'] =  url('/');
        $this->data['og:type'] = "website";
        $this->data['og:title'] = "Home | Dentalax – Zahnarztsuche in ganz Deutschland";
        $this->data['og:description'] = "Finden Sie jetzt den passenden Zahnarzt in Ihrer Nähe – einfach, schnell und zuverlässig mit Dentalax.";
        $this->data['og:image'] =  url('/') . "/frontend/assets/images/og-default.jpg";

        return view('frontend.pages.dentist_landing_page');
    }
}
