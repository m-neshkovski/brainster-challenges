<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email verification</title>
</head>
<body>
    <h1>Hi {{ $user->name }},</h1>

    please follow this <a href="/verification/{{ $user->id }}/{{ $hashed_email_token }}">link</a> to verify your email address.

    <h3>Best regards.</h3>
    
</body>
</html>