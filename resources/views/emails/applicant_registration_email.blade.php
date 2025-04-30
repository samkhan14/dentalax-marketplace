@php
    $appUrl = config('app.url');
@endphp

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Willkommen</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        .email-header {
            background-color: #3fbfd8;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .email-body {
            padding: 30px;
        }

        .email-body h2 {
            color: #333;
        }

        .email-body p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .email-footer {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #999;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #3fbfd8;
            color: white !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="email-container">
    <div class="email-header">
        <h1>Willkommen bei Dentalax</h1>
    </div>
    <div class="email-body">
        <h2>Hallo {{ $user->name }},</h2>
        <p>Vielen Dank für Ihre Registrierung bei Dentalax. Wir freuen uns, Sie als Teil unseres digitalen Gesundheitsportals begrüßen zu dürfen!</p>

        <p>Mit Ihrem neuen Konto können Sie auf verschiedene Funktionen zugreifen, Ihre Daten verwalten und vieles mehr.</p>

        <p>Loggen Sie sich jetzt ein, um Ihr Dashboard zu erkunden:</p>

        <a href="{{ $appUrl }}/login" class="btn">Jetzt Einloggen</a>
    </div>
    <div class="email-footer">
        &copy; {{ date('Y') }} Dentalax – Alle Rechte vorbehalten.
    </div>
</div>

</body>
</html>
