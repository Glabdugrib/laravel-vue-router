<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   
   <div id="root"></div>

   <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>