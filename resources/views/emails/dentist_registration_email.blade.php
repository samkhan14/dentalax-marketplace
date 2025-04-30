@php
    $appUrl = config('app.url');
@endphp

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Willkommen als Zahnarzt</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 600px; margin: auto; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        .header { background: #3fbfd8; color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; color: #333; }
        .content h2 { margin-top: 0; }
        .content p { font-size: 16px; line-height: 1.5; }
        .btn { display: inline-block; margin-top: 20px; background: #3fbfd8; color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: bold; }
        .footer { text-align: center; padding: 20px; background: #f0f0f0; font-size: 13px; color: #999; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Willkommen bei Dentalax</h1>
    </div>
    <div class="content">
        <h2>Hallo {{ $user->name }},</h2>
        <p>Ihr Zahnarztkonto wurde erfolgreich bei Dentalax erstellt. Sie können nun Ihre Praxisdaten verwalten, Ihre Landingpage anpassen und Stellenangebote veröffentlichen.</p>
        <p>Loggen Sie sich ein und starten Sie noch heute:</p>
        <a href="{{ $appUrl }}/login" class="btn">Zum Dashboard</a>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Dentalax – Alle Rechte vorbehalten.
    </div>
</div>
</body>
</html>
