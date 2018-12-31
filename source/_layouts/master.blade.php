<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ mix('css/app.css', 'assets/build') }}">

        <title>A year review</title>
        <meta name="description" content="Review about the past year" />

        <meta property="og:site_name" content="A yearly review">
        <meta property="og:type" content="website" />
        <meta property="og:title" content="A yearly review" />
        <meta property="og:description" content="Review about the past year" />

        <link rel="home" href="{{ $page->baseUrl }}">
    </head>
    <body class="font-sans bg-grey-lightest">
        <main class="container mx-auto mt-16">
            @yield('body')
        </main>

        <script type="text/javascript">
            var _paq = _paq || [];

            _paq.push(["disableCookies"]);
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);

            (function() {
                var u="//analytics.elhebert.be/";
                _paq.push(['setTrackerUrl', u+'piwik.php']);
                _paq.push(['setSiteId', '2']);
                var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
            })();
        </script>
    </body>
</html>
