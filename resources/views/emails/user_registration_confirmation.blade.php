<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { width: 80%; margin: auto; padding: 20px; }
        .header { background: #f4f4f4; padding: 10px; text-align: center; }
        .content { margin: 20px 0; }
        .footer { text-align: center; font-size: 0.8em; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Registration Confirmation</h1>
        </div>
        <div class="content">
            <p>Hello, {{ $name }}!</p>
            <p>Thank you for registering with us. Your account has been created successfully.</p>
            <p>Please confirm your email address by clicking the link below:</p>
            @php
                $baseUrl = url('/'); // or use env('APP_URL') for more control
            @endphp

            <a href="{{ $baseUrl }}/email/confirmation/{{ $email }}">Confirm Email</a>
        </div>
        <div class="footer">
            <p>Thank you for joining us!</p>
        </div>
    </div>
</body>
</html>
