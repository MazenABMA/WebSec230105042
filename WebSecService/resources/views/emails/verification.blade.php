<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>
<body>
    <p>Dear {{ $name }},</p>

    <p>Click on the following link to verify your account:</p>

    <p>
        <a href="{{ $link }}" target="_blank">Verification Link</a>
    </p>

    <p>If you did not create an account, you can ignore this email.</p>
</body>
</html>
