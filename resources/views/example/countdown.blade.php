<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="{{asset('assets/css/coming-soon.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/countdown.js')}}"></script>

    <!-- Font Awesome CSS -->
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function() {
            "use strict";
            // Scroll
            $('.backtotop a').bind('click',function(event){
                var $anchor = $(this);
                $('html, body').stop().animate({ scrollTop: $($anchor.attr('href')).offset().top }, 500,'easeInOutExpo');
                event.preventDefault();
            });

            $("#countdown").countdown({
                date: "12 june 2019 12:00:00", // Enter date here
                format: "on"
            });
        });
    </script>
</head>

<body id="backtotop">

<div class="fullwidth clearfix">
    <div id="topcontainer" class="bodycontainer clearfix">

        <p><span class="fa fa-bullhorn"></span></p>
        <h1><span>We are coming soon</span></h1>
        <p>Website under construction</p>

    </div>
</div>

<div class="arrow-separator arrow-white"></div>

<div class="fullwidth colour1 clearfix">
    <div id="countdown" class="bodycontainer clearfix">

        <div id="countdowncont" class="clearfix">
            <ul id="countscript">
                <li>
                    <span class="days">00</span>
                    <p>Days</p>
                </li>
                <li>
                    <span class="hours">00</span>
                    <p>Hours</p>
                </li>
                <li class="clearbox">
                    <span class="minutes">00</span>
                    <p>Minutes</p>
                </li>
                <li>
                    <span class="seconds">00</span>
                    <p>Seconds</p>
                </li>
            </ul>
        </div>

    </div>
</div>

<div class="arrow-separator arrow-theme"></div>

<div class="fullwidth colour2 clearfix">
    <div id="maincont" class="bodycontainer clearfix">
        <h2>Sign up to newsletter to know when we launch</h2>
        <p>If you would want to receive news please subscribe to our newsletter:</p>
        <div id="signupform" class="sb-search clearfix">
            <form method="post" id="contact" class="clearfix">
                <input class="sb-search-input" placeholder="Enter your email" type="text" value="">
                <input class="sb-search-submit" value="" type="submit">
                <button class="formbutton" type="submit"><span class="fa fa-search"></span></button>
            </form>
        </div>

    </div>
</div>

<div class="arrow-separator arrow-themelight"></div>

<div class="fullwidth colour3 clearfix">
    <div id="quotecont" class="bodycontainer clearfix">

        <div id="commentslider">
            <div class="item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis enim nulla. Suspendisse posuere arcu ac eros iaculis egestas commodo risus tempus. Fusce placerat nulla nisi. Proin congue erat non orci adipiscing nec porttitor lacus egestas."</p>
            </div>
            <div class="item">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis enim nulla. Suspendisse posuere arcu ac eros iaculis egestas commodo risus tempus. Fusce placerat nulla nisi. Proin congue erat non orci adipiscing nec porttitor lacus egestas."</p>
            </div>
        </div>

    </div>
</div>

<div class="arrow-separator arrow-grey"></div>

<div class="fullwidth clearfix">
    <div id="footercont" class="bodycontainer clearfix">

        <p class="backtotop"><a title="" href="#backtotop"><i class="fa fa-angle-double-up"></i></a></p>
        <div id="socialmedia" class="clearfix">
            <ul>
                <li><a title="" href="#" rel="external"><i class="fa fa-facebook"></i></a></li>
                <li><a title="" href="#" rel="external"><i class="fa fa-twitter"></i></a></li>
                <li><a title="" href="#" rel="external"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <p>Footer content <a href="">with links</a> Here</p>
    </div>
</div>

</body>
</html>