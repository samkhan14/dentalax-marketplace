@extends('frontend.layouts.master')
@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow rounded-4">
                        <div class="card-body p-5">
                            <h2 class="mb-4 text-center">Zahlung abschließen</h2>

                            <!-- Paket-Infos -->
                            <div class="mb-4">
                                <h5 class="text-muted">Ihr gewähltes Paket:</h5>
                                <div class="border rounded p-3 bg-white">
                                    <strong>{{ $plan->name ?? 'Paket nicht gefunden' }}</strong><br>
                                    <span class="text-primary">
                                            {{ number_format($amount, 2, ',', '.') }} € / {{ $billing_type === 'yearly' ? 'Jahr' : 'Monat' }}
                                    </span><br>
                                    <small class="text-muted">
                                        (Netto: {{ number_format($net, 2, ',', '.') }} €, MwSt: {{ number_format($vat, 2, ',', '.') }} €)
                                    </small>
                                </div>
                            </div>

                            <!-- Praxisdaten -->
                            <div class="mb-4">
                                {{-- <h5 class="text-muted d-flex justify-content-between align-items-center">
                                    <span>Ihre Praxisdaten:</span>
                                    <a href="/register" class="btn btn-sm btn-outline-secondary">✏️ Bearbeiten</a>
                                </h5> --}}
                                <div class="border rounded p-3 bg-white">
                                    <strong>{{ $plan->name ?? 'Paket nicht gefunden' }}</strong><br>
                                    {{ $formData['vorname'] }} {{ $formData['nachname'] }}<br>
                                    {{ $formData['permanent_address']}}<br>
                                    {{ $formData['email']}}
                                </div>
                            </div>

                            <!-- Zahlungsart -->
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Zahlungsmethode</label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gateway" id="kreditkarte"
                                                value="stripe" checked>
                                            <label class="form-check-label" for="kreditkarte">
                                                💳 Kreditkarte
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gateway" id="paypal"
                                                value="paypal" disabled>
                                            <label class="form-check-label" for="paypal">
                                                🅿️ PayPal
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-5">
                                    <button id="submitBtn" type="button" class="btn btn-primary px-4 py-2 rounded-pill shadow" onclick="submitPayment()">
                                        <span id="btnText">Jetzt bezahlen</span>
                                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>

                            </form>

                            <p class="text-center mt-4 text-muted small">
                                Ihre Daten sind sicher. DSGVO-konform & Made in Germany.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function submitPayment() {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            // UI loading
            btn.disabled = true;
            btnText.classList.add('d-none');
            btnSpinner.classList.remove('d-none');

            const gateway = document.querySelector('input[name="gateway"]:checked').value;

            // Simulate short delay for UX
            setTimeout(() => {
                if (gateway === 'stripe') {
                    window.location.href = "{{ route('stripe.checkout') }}";
                } else if (gateway === 'paypal') {
                    window.location.href = "{{ route('paypal.checkout') }}";
                } else {
                    alert('Ungültige Zahlungsmethode ausgewählt.');
                    resetButton();
                }
            }, 500);
        }

        function resetButton() {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');

            btn.disabled = false;
            btnText.classList.remove('d-none');
            btnSpinner.classList.add('d-none');
        }
        </script>


@endsection
