<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', config('app.name'))</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
  @include('frontend.includes.styles')
</head>
<body>
  @include('frontend.includes.topbar')
  @include('frontend.includes.navbar')

  <main>
    @yield('content')
  </main>

  @include('frontend.includes.footer')
  @include('frontend.includes.scripts')

</body>
</html>
