<!-- resources/views/emails/verification.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Your Email</title>
</head>
<body>
    <p>Dear {{$name}},</p>
    <p>Click the following link to verify your account:</p>
    <p><a href="{{$link}}" target='_blank'>Verification Link</a></p>
</body>
</html>