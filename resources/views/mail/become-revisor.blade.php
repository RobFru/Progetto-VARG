<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Varg.it</title>
    </head>
    <body>
        <div>
            <h1>An user asked to work with us</h1>
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Do you want to make them a revisor? Click here : </p>
            <P>Description: {{ $info }}</P>
            <a href="{{route('make.revisor', compact('user'))}}">Make a revisor</a>
        </div>
    </body>
</html>