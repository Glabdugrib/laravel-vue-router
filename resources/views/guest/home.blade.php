<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Styles -->
   {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
   <link href="{{ asset('css/front.css') }}" rel="stylesheet">
</head>
<body>
   
   <div id="root">
      <router-view></router-view>
   </div>

   <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>