<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Email</title>
</head>
<body>
    <p>Hi {{ $entry->FIRST_NAME }} {{ $entry->LAST_NAME}}, </p>

    <p>You have registered for a CSUDH Online Advising account using the email address: {{ $entry->EMAIL }}</p>
    <p>Please click on the link below to verify your email address. You will not be able to continue the 
    registration process until your email address is verified.</p>
    <p><a href="{{url('verify', $entry->VERIFICATION_TOKEN)}}">Verify Email</a></p>
    <em>Can't click on the link? Copy paste this link in your browser: {{url('verify', $entry->VERIFICATION_TOKEN)}}</em>

</body>
</html>