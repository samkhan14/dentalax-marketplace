@extends('frontend.layouts.master')
@section('content')
<section class="py-5 text-center bg-light">
    <div class="container">
      <div class="card shadow-sm p-5 mx-auto" style="max-width: 600px;">
        <div class="mb-4">
          <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
        </div>
        <h1 class="mb-3 text-success">Zahlung erfolgreich</h1>
        <p class="lead">Vielen Dank für Ihre Buchung!</p>

        <div class="card shadow-sm p-3 mb-4 bg-white">
          <h5>Paketdetails:</h5>
          <p class="mb-0">
            <span class="badge rounded-pill bg-primary" style="background-color: #40bfd8 !important">Package Name</span>
            <span class="ms-2">via Stripe</span>
          </p>
        </div>

        <p class="mb-3">Ihre Zahlung wurde erfolgreich verarbeitet und Ihr Konto wurde aktiviert.</p>

        <div class="alert alert-info mt-4" role="alert">
          <i class="fas fa-envelope me-2"></i>
          Sie erhalten in Kürze eine E-Mail mit Ihrer Rechnung und Details zu Ihrem Paket.
        </div>

        <div class="mt-4 d-flex gap-3 justify-content-center">
          <a href="{{ route('dentist.wizard')}}" class="btn btn-primary btn-lg" style="background-color: #40bfd8; border-color: #40bfd8">
            <i class="fas fa-edit me-2"></i>Praxisdaten jetzt eingeben
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection
