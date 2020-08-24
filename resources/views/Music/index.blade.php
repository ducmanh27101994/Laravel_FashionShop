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
    <style>
        .owl-carousel .owl-item img {
            width: 100% !important;
        }
        #col-12{
            margin-left: 100px;
        }
    </style>
</head>

<body>

    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="circle-preloader">
            <img src="{{assert('music/img/core-img/compact-disc.png')}}" alt="">
        </div>
    </div>


    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{asset('music/img/bg-img/bg-1.jpg')}});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">Musica <span>Musica</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">K-Pop</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">Musica</h2>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{asset('music/img/bg-img/bg-2.jpg')}});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">V-Pop <span>Colorlib</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">Music</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">Colorlib</h2>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{asset('music/img/bg-img/bg-3.jpg')}});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">C-Pop <span>Festival</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">Best Music</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">Festival</h2>
            </div>

        </div>
        <!-- bg gradients -->
        <div class="bg-gradients"></div>

        <!-- Slide Down -->
        <div class="slide-down" id="scrollDown">
            <h6>Slide Down</h6>
            <div class="line"></div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Us Area Start ##### -->

    <!-- ##### About Us Area End ##### -->

    <!-- ##### Upcoming Shows Area Start ##### -->
    <div class="upcoming-shows-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>ALBUMS HOT</h2>
                        <h6>Sed porta cursus enim, vitae maximus felis luctus iaculis.</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="col-12" class="col-12">
                    <!-- Upcoming Shows Content -->

                    <div class="upcoming-shows-content">
                    @if(empty($albums))
                        <tr><td>No Data</td></tr>
                    @else
                        @foreach($albums as $album)
                        <!-- Single Upcoming Shows -->
                        <div class="single-upcoming-shows d-flex align-items-center flex-wrap">

                            <div class="shows-desc d-flex align-items-center">
                                <div class="shows-img">
                                    <img src="{{asset('storage/'.$album->image)}}" alt="">
                                </div>
                                <div class="shows-name">
                                    <h6>{{$album->album_name}}</h6>
                                </div>
                            </div>
                            <div class="shows-location">
                                <p>{{$album->category}}</p>
                            </div>

                            <div class="buy-tickets">
                                <a href="{{route('musics.albums',$album->id)}}" class="btn musica-btn">Show Albums</a>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Upcoming Shows Area End ##### -->

    <!-- ##### Music Player Area Start ##### -->
    <div class="music-player-area section-padding-100">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2 style="color: deeppink">HOT MUSIC</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="music-player-slides owl-carousel">
                    @if(empty($musics))
                        <tr><td>No Data</td></tr>
                    @else
                        @foreach($musics as $music)
                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img style="width: 300px;height: 200px" src="{{asset('storage/'.$music->image)}}" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>{{$music->music_name}}</h5>
                                    <p>{{$music->author}}</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio controls>
                                    <source src="{{asset('storage/'.$music->audio)}}">
                                </audio>
                                </div>
                            </div>
                        </div>

                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Music Player Area End ##### -->

    <!-- ##### Featured Album Area Start ##### -->
    <div class="featured-album-area section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-album-content d-flex flex-wrap">

                        <!-- Album Thumbnail -->
                        <div class="album-thumbnail h-100 bg-img" style="background-image: url({{asset('music/img/bg-img/bg-4.jpg')}});"></div>

                        <!-- Album Songs -->
                        <div class="album-songs h-100">

                            <!-- Album Info -->
                            <div class="album-info mb-50 d-flex flex-wrap align-items-center justify-content-between">
                                <div class="album-title">
                                    <h6>Featured album</h6>
                                    <h4>{{$lists[0]->album_name}}</h4>
                                </div>
                                <div class="album-buy-now">
                                    <a href="{{route('musics.albums',$lists[0]->id)}}" class="btn musica-btn">Show AlBums</a>
                                </div>
                            </div>

                            <div class="album-all-songs">

                                <!-- Music Playlist -->
                                <div class="music-playlist">
                                    <!-- Single Song -->

                                    @if(empty($lists))
                                        <tr><td>No Data</td></tr>
                                    @else
                                        @foreach($lists as $list)
                                    <div class="single-music active">
                                        <h6>{{$list->music_name}}</h6>
                                        <audio controls>
                                            <source src="{{asset('storage/'.$list->audio)}}">
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
                                    <h6>{{$lists[0]->music_name}}</h6>
                                </div>
                                <audio controls>
                                    <source src="{{asset('storage/'.$lists[0]->audio)}}">
                                </audio>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Album Area End ##### -->

    <!-- ##### Music Artists Area Start ##### -->
    <div class="musica-music-artists-area d-flex flex-wrap clearfix">
        <!-- Music Search -->
        <div class="music-search bg-img bg-overlay2 wow fadeInUp" data-wow-delay="300ms" style="background-image: url({{asset('music/img/bg-img/bg-9.jpg')}});">
            <!-- Content -->
            <div class="music-search-content">
                <h2>Music</h2>
                <h4>Search for the best music</h4>
            </div>
        </div>

        <!-- Artists Search -->
        <div class="artists-search bg-img bg-overlay2 wow fadeInUp" data-wow-delay="600ms" style="background-image: url({{asset('music/img/bg-img/bg-1.jpg')}});">
            <!-- Content -->
            <div class="music-search-content">
                <h2>Artists</h2>
                <h4>Search for the best artists</h4>
            </div>
        </div>
    </div>
    <!-- ##### Music Artists Area End ##### -->

    <!-- ##### Footer Area Start ##### -->

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
