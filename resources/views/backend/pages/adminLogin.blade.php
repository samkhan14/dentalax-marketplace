
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In | {{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('backend/assets/img/favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/assets/img/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/img/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{ asset('backend/assets/img/favicon/site.webmanifest')}}">
<link rel="mask-icon" href="{{ asset('backend/assets/img/favicon/safari-pinned-tab.svg')}}" color="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="{{ asset('backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('backend/assets/vendor/notyf/notyf.min.css')}}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('backend/assets/css/volt.css')}}" rel="stylesheet">
</head>

<body>
    <main>

        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background-lg="{{ asset('backend/assets/img/illustrations/signin.svg')}}">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Sign in to Dentalx CRM</h1>
                            </div>
                            <form method="POST" action="{{ route('admin.login.in') }}" class="mt-4">
                                @csrf
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email">Your Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                        </span>
                                        <input type="email" name="email" class="form-control" placeholder="example@company.com" id="email" autofocus required>
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password">Your Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                            </span>
                                            <input type="password" placeholder="Passwort" name="password" class="form-control" id="password" required>
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    {{-- <div class="d-flex justify-content-between align-items-top mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="remember">
                                            <label class="form-check-label mb-0" for="remember">
                                              Remember me
                                            </label>
                                        </div>
                                        <div><a href="./forgot-password.html" class="small text-right">Lost password?</a></div>
                                    </div> --}}
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">Sign in</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

   <!-- Core -->
<script src="{{ asset('backend/assets/vendor/@popperjs/core/dist/umd/popper.min.js')}}"></script>
<script src="{{ asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Vendor JS -->
<script src="{{ asset('backend/assets/vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>

<!-- Slider -->
<script src="{{ asset('backend/assets/vendor/nouislider/distribute/nouislider.min.js')}}"></script>

<!-- Smooth scroll -->
<script src="{{ asset('backend/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>

<!-- Charts -->
<script src="{{ asset('backend/assets/vendor/chartist/dist/chartist.min.js')}}"></script>
<script src="{{ asset('backend/assets/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>

<!-- Datepicker -->
<script src="{{ asset('backend/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

<!-- Sweet Alerts 2 -->
<script src="{{ asset('backend/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{ asset('backend/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

<!-- Notyf -->
<script src="{{ asset('backend/assets/vendor/notyf/notyf.min.js')}}"></script>

<!-- Simplebar -->
<script src="{{ asset('backend/assets/vendor/simplebar/dist/simplebar.min.js')}}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src=" {{ asset('backend/assets/assets/js/volt.js')}}"></script>


</body>

</html>
