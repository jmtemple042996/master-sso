<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    </head>
    <body class="font-sans antialiased">
               <script>
  // Initialize the agent once at web application startup.
  // Alternatively initialize as early on the page as possible.
  const fpPromise = import('https://fpjscdn.net/v3/DU51ucfH2u2Pbdp56RQc')
    .then(FingerprintJS => FingerprintJS.load())

  // Analyze the visitor when necessary.
  fpPromise
    .then(fp => fp.get())
    .then(result => console.log(result.requestId, result.visitorId))
</script>
    </body>
</html>
