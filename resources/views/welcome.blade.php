<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PipeIn</title>
        <link href="css/custom.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome-4.0.3/css/font-awesome.min.css">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
    </head>
    <body>

        <div id="app"></div>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        {{--<script src="js/bootstrap.min.js"></script>--}}


        <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
        <script type="text/javascript">
            $(function(){
//               alert("hello Worls");
            });

            var revapi;

            jQuery(document).ready(function() {
                "use strict";
                revapi = jQuery('.tp-banner').revolution(
                    {
                        delay: 15000,
                        startwidth: 1200,
                        startheight: 278,
                        hideThumbs: 10,
                        fullWidth: "on"
                    });

            });	//ready
        </script>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
