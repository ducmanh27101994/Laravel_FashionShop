<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Musica - Music Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('music/img/core-img/favicon.ico')}}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('music/style.css')}}">

</head>

<body>

    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="circle-preloader">
            <img src="{{asset('music/img/core-img/compact-disc.png')}}" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="musica-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="musicaNav">

                        <!-- Nav brand -->
{{--                        <a href="index.html" class="nav-brand"><img src="{{asset('music/img/core-img/logo.png')}}" alt=""></a>--}}

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->

                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{asset('music/img/bg-img/breadcumb.jpg')}});">
        <div class="bradcumbContent">
            <h2>{{$shows[0]->album_name}}</h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <div class="about-us-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- About Thumbnail -->
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail mb-100">
                        <img src="{{asset('storage/'.$shows[0]->image)}}" alt="">
                    </div>
                </div>
                <!-- About Content -->
                <div class="col-12 col-lg-6">
                    <div class="about--content mb-100">

{{--                        <p>Nulla pretium tincidunt felis, nec sollicitudin mauris lobortis in. Aliquam eu feugiat ligula, laoreet efficitur nulla. Morbi nec neque porta, elementum massa at, vehicula nunc. Nulla facilisi. Donec id purus eu lectus imperdiet varius. Curabitur consectetur nunc sem, vitae cursus enim tempor eget. Praesent pellentesque nisi urna, sit amet suscipit ligula posuere id. Aenean id tortor vel quam ornare gravida. Phasellus luctus feugiat nunc, quis vulputate ipsum convallis quis. Integer vel nulla erat. Donec erat metus, luctus quis maximus quis, volutpat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>--}}
                        <!-- Key Notes -->
                        <ul class="key-notes">
                            <li><div class="check"><img src="{{asset('music/img/core-img/check.png')}}" alt=""></div> Album: {{$shows[0]->album_name}}</li>
                            <li><div class="check"><img src="{{asset('music/img/core-img/check.png')}}" alt=""></div> Category: {{$shows[0]->category}}</li>
                            <li><div class="check"><img src="{{asset('music/img/core-img/check.png')}}" alt=""></div> Nation: {{$shows[0]->nation}}</li>
                            <li><div class="check"><img src="{{asset('music/img/core-img/check.png')}}" alt=""></div> Gender: {{$shows[0]->gender}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### About Us Area End ##### -->

    <div class="featured-album-area section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-album-content d-flex flex-wrap">

                        <!-- Album Thumbnail -->
                        <div class="album-thumbnail h-100 bg-img" style="background-image: url({{asset('storage/'.$shows[0]->image)}});"></div>

                        <!-- Album Songs -->
                        <div class="album-songs h-100">

                            <!-- Album Info -->
                            <div class="album-info mb-50 d-flex flex-wrap align-items-center justify-content-between">
                                <div class="album-title">
                                    <h6>Featured album</h6>
                                    <h4>{{$shows[0]->album_name}}</h4>
                                </div>
{{--                                <div class="album-buy-now">--}}
{{--                                    <a href="#" class="btn musica-btn">Show AlBums</a>--}}
{{--                                </div>--}}
                            </div>

                            <div class="album-all-songs">

                                <!-- Music Playlist -->
                                <div class="music-playlist">
                                    <!-- Single Song -->
                                    @if(empty($shows))
                                        <tr><td>No Data</td></tr>
                                    @else
                                    @foreach($shows as $show)
                                            <div class="single-music active">
                                                <h6>{{$show->music_name}}</h6>
                                                <audio controls>
                                                    <source src="{{asset('storage/'.$show->audio)}}">
                                                </audio>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>

                            <!-- Now Playing -->
                            <div class="now-playing d-flex flex-wrap align-items-center justify-content-between">
                                <div class="songs-name">
                                    <p>Playing</p>
                                    <h6>{{$shows[0]->music_name}}</h6>
                                </div>
                                <audio controls>
                                    <source src="{{asset('storage/'.$show->audio)}}">
                                </audio>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0">
        <div class="container-fluid">
            <div class="row">

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <a href="#"><img src="{{asset('music/img/core-img/logo2.png')}}" alt=""></a>
                        <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-4 col-xl-2">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>About</h4>
                        </div>
                        <nav>
                            <ul class="footer-nav">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">The team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-4 col-xl-2">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>Links</h4>
                        </div>
                        <nav>
                            <ul class="footer-nav">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">The team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-4 col-xl-2">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>Social</h4>
                        </div>
                        <nav>
                            <ul class="footer-nav">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Snapchat</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h4>Subscribe</h4>
                        </div>
                        <form action="#" method="post" class="subscribe-form">
                            <input type="email" name="subscribe-email" id="subscribeemail">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('music/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('music/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('music/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('music/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('music/js/active.js')}}"></script>
</body>

</html>
