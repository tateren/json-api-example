<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>json-api-example</title>
    </head>
    <body>
        <h2>endpoints</h2>
        <ul>
            @foreach($links as $link)
                <li><a href="{{$link}}">{{$link}}</a></li>
            @endforeach
        </ul>
    </body>
</html>
