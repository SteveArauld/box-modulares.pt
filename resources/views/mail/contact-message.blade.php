<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Nuevo mensaje de contacto') }}</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background:#f7f7f7; margin:0; padding:24px; color:#242424;">
    <div style="max-width:600px; margin:0 auto; background:#ffffff; border-radius:8px; overflow:hidden; border:1px solid #eee;">
        <div style="background:#242424; padding:20px 24px;">
            <h1 style="color:#fff; font-size:20px; margin:0;">{{ __('Nuevo mensaje de contacto') }}</h1>
        </div>
        <div style="padding:24px;">
            <p style="margin:4px 0;"><strong>{{ __('De:') }}</strong> {{ $name }} ({{ $email }})</p>
            <p style="margin:4px 0;"><strong>{{ __('Asunto:') }}</strong> {{ $contactSubject }}</p>
            <p style="margin-top:20px; white-space:pre-line;">{{ $messageBody }}</p>
        </div>
    </div>
</body>
</html>
