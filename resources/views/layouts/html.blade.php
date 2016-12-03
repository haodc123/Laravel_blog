<!DOCTYPE html>
<html>
    <head>
        <title>Laravel @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
		
        @include('shared.nav')
		@section('app_name', 'Laravel_blog')
        <section id="content" class="container-fluid">
            @yield('content')
        </section>
        <script type="text/javascript" src='/js/3rd-party.js'></script>
    </body>
</html>