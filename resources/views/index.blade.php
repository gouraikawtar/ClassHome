<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ClassHome</title>
    <script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/skel.min.js')}}"></script>
	<script src="{{asset('js/skel-layers.min.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
    <noscript>
        <link rel="stylesheet" href="{{asset('css/skel.css')}}" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    </noscript>
</head>
<body class="homepage">
    <div id="header">
        <div class="container">    
            <!-- Logo -->
            <h1><a href="#" id="logo">ClassHome</a></h1>
            <!-- Banner -->
            <div id="banner">
                <div class="container">
                    <section>
                        <header class="major">
                            <h2>Welcome to ClassHome</h2>
                            <span class="byline">Your virtual nearbly classroom</span>
                        </header>
                        <a href="{{ route('register') }}" class="button alt">Register now</a>
                        <a href="{{ route('login') }}" class="button alt">Login</a>
                    </section>			
                </div>
            </div>
        </div>
    </div>
    <!-- Featured -->
    <div class="wrapper style2">
        <section class="container">
            <header class="major">
                <h2>Our Purpose</h2>
                <span class="byline">Mauris vulputate dolor sit amet nibh</span>
            </header>
            <div class="row no-collapse-1">
                <section class="4u">
                    <h3>For students</h3>
                    <a href="#" class="image feature"><img src="{{asset('images/pic02.jpg')}}" alt=""></a>
                    <p>Guarantee to students the possibility of accessing their classroom resources whenever and wherever they are.</p>
                </section>
                <section class="4u">
                    <h3>For teachers</h3>
                    <a href="#" class="image feature"><img src="{{asset('images/pic03.jpg')}}" alt=""></a>
                    <p>Make it easy for teachers to keep in touch with their students anytime.</p>
                </section>
                <section class="4u">
                    <h3>For society</h3>
                    <a href="#" class="image feature"><img src="{{asset('images/pic04.jpg')}}" alt=""></a>
                    <p>Participate in the digitalization and virtualization of the national education system.</p>
                </section>
            </div>
        </section>
    </div>
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <section class="container">
            <header class="major">
                <h2>Our Features</h2>
                <span class="byline">Mauris vulputate dolor sit amet nibh</span>
            </header>
            <div class="row">
                <!-- Content -->
                <div class="6u">
                    <section>
                        <ul class="style">
                            <li>
                                <span class="fa fa-wrench"></span>
                                <h3>Assure communication</h3>
                                <span>Teachers and their students can always communicate by sharing posts and comments to express and sending emails.</span>
                            </li>
                            <li>
                                <span class="fa fa-cloud"></span>
                                <h3>Integer ultrices</h3>
                                <span>In posuere eleifend odio. Quisque semper augue mattis wisi. Maecenas ligula. Pellentesque viverra vulputate enim.</span>
                            </li>
                        </ul>
                    </section>
                </div>
                <div class="6u">
                    <section>
                        <ul class="style">
                            <li>
                                <span class="fa fa-cogs"></span>
                                <h3>Evaluate your students</h3>
                                <span>Grade your students contributions and keep them updated about their grades.</span>
                            </li>
                            <li>
                                <span class="fa fa-leaf"></span>
                                <h3>Aliquam luctus</h3>
                                <span>Pellentesque viverra vulputate enim. Aliquam erat volutpat. Maecenas condimentum enim tincidunt risus accumsan.</span>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <div id="footer">
        <div class="container">
            <!-- Copyright -->
            <div class="copyright">
                Copyright &copy; ClassHome 2020 - <script type="text/JavaScript"> document.write(new Date().getFullYear()) </script>
            </div>
        </div>
    </div>
</body>
</html>