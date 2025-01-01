<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Page</title>
</head>
<body>
    <h1>Hello, {{ $formData['user']->name }}</h1>
    <p>{{ $formData['MailSubject'] }}</p>

    <p>Please Click Below Link To Reset Password</p>
    <a href="{{ route('resetPassword', $formData['token']) }}"><button type="button">Click Here</button></a>
</body>
</html>