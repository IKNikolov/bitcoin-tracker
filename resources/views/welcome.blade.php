<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bitcoin tracker</title>

    </head>
    <body>
        <div id="app">
            <v-app app>

                <app />
            </v-app>
         </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
