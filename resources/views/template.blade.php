<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Sending E-mail</title>
    </head>
    <body>
        <h4>This message sent by {{ $data["fullname"] }}</h4>
        <br />
        <h1>{{ $data["subject"] }}</h1>
        <p>{!! nl2br($data['message']) !!}</p>
    </body>
</html>
