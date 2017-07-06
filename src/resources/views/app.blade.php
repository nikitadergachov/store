<!DOCTYPE html>
<html lang="ru">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name=description content="Интернет магазин бытовой техники на laravel 5.2" />
        <meta name="keywords" content="Интернет, интернет-магазин, бытовая техника, магазин бытовой техники, интернет-магазин бытовой техники" />
        <meta name="author" content="Анисимова И Дергачев" />


        <title>Интернет магазин</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ asset('src/public/css/bootstrap.min.css') }}">
        <!-- Bootstrap core mdb.css -->
        <link rel="stylesheet" href="{{ asset('src/public/css/mdb.css') }}">
        <!-- Include app.less file -->
        <link rel="stylesheet" href="{{ asset('src/public/less/app.less') }}">
        <!-- Include app.scss file -->
        <link rel="stylesheet" href="{{ asset('src/public/sass/app.scss') }}">
        <!-- Include sweet alert file -->
        <link rel="stylesheet" href="{{ asset('src/public/css/sweetalert.css') }}">
        <!-- Include typeahead file -->
        <link rel="stylesheet" href="{{ asset('src/public/css/typeahead.css') }}">
        <!-- Include lity ligh-tbox file -->
        <link rel="stylesheet" href="{{ asset('src/public/css/lity.css') }}">
        
        <!-- Added the main.css file that combines app.scss and app.css togather -->
        <link rel="stylesheet" href="{{ asset('src/public/css/main.css') }}">
        
        <!-- Material Design Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" >



    </head>
<body>

    @include('partials.nav')

    @yield('content')

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('src/public/js/libs/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('src/public/js/libs/jquery.validate.js') }}"></script>
    <!-- Include main app.js file -->
    <script type="text/javascript" src="{{ asset('src/public/js/app.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('src/public/js/libs/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('src/public/js/libs/mdb.js') }}"></script>
    <!-- Include sweet-alert.js file -->
    <script type="text/javascript" src="{{ asset('src/public/js/libs/sweetalert.js') }}"></script>
    <!-- Include typeahead.js file -->
    <script type="application/javascript" src="{{ asset('src/public/js/libs/typeahead.js') }}"></script>
    <!-- Include lity light-box js file -->
    <script type="application/javascript" src="{{ asset('src/public/js/libs/lity.js') }}"></script>


    <script type="application/javascript" src="{{ asset('src/public/js/validatePayment.js') }}"></script>




    <script>
        // your publish key
        Stripe.setPublishableKey('YOUR STRIPE PUBLISHABLE KEY');
        //
        jQuery(function($) {
            $('#payment-form').submit(function(event) {
                var $form = $(this);
                // Disable the submit button to prevent repeated clicks
                $form.find($('.btn')).prop('disabled', true);
                Stripe.card.createToken($form, stripeResponseHandler);
                // Prevent the form from submitting with the default action
                return false;
            });
        });
        function stripeResponseHandler(status, response) {
            var $form = $('#payment-form');
            if (response.error) {
                // Show the errors on the form
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.payment-errors').removeClass("hidden");
                $form.find($('.btn')).prop('disabled', false);
            } else {
                // response contains id and card, which contains additional card details
                var token = response.id;
                // Insert the token into the form so it gets submitted to the server
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));
                // and submit
                $form.get(0).submit();
            }
        }
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter41030194 = new Ya.Metrika({
                        id:41030194,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/41030194" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <script>
        (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
            t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
        })(window, document, '_gscq','script','//widgets.getsitecontrol.com/61387/script.js');
    </script>
    <script>
        new WOW().init();
    </script>
    @include('partials.flash')

</body>
</html>
