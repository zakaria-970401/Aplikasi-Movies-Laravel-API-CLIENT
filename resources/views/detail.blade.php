<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Halaman Utama</title>
        <!-- Bootstrap -->
        <link href="/assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Animate.css -->
        <link href="/assets/animate.css/animate.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome iconic font -->
        <link href="/assets/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
        <!-- Magnific Popup -->
        <link href="/assets/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- Slick carousel -->
        <link href="/assets/slick/slick.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <!-- Theme styles -->
        <link href="/assets/css/dot-icons.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/theme.css" rel="stylesheet" type="text/css">
    </head>


    <body class="body">
        <header class="header header-horizontal header-view-pannel">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
                    <a class="navbar-brand" href="#">
                        <img src="/assets/images/logo.jpg" alt="">
                    </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </header>

        
        
<section class="after-head d-flex section-text-white position-relative">
    <div class="top-block top-inner container">
        <div class="top-block-content">
            <h1 class="section-title">Detail Movies</h1>
            <div class="page-breadcrumbs">
                <a class="content-link" href="/">Home</a>
                <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                <a class="content-link" href="#">Movies</a>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="sidebar-container">
        <div class="content">
            <section class="section-long">
                <div class="section-line">
                    <div class="movie-info-entity">
                        <div class="entity-poster" data-role="hover-wrap">
                            <div class="embed-responsive embed-responsive-poster">
                                <img class="embed-responsive-item" src="{{ 'https://image.tmdb.org/t/p/w500/'.$show['poster_path']}}" alt="" />
                            </div>
                            <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                <div class="entity-play">
                                    <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v={{ $show['videos']['results'][0]['key'] }}" data-magnific-popup="iframe">
                                        <span class="icon-content"><i class="fas fa-play"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="entity-content">
                            <h1 class="entity-title text-white">{{ $show['original_title'] }}</h1>
                            <div class="entity-category">
                                <h5 class="text-warning"> 
                                    Genre : {{ $show['genres'][0]['name'] }}
                                </h5>
                            </div>
                            <div class="entity-info">
                                <div class="info-lines">
                                    <div class="info info-short">
                                        <span class=" text-warning"> Rate : <i class="fas fa-star"> </i></span>
                                        <span class="info-text text-warning">{{$show['vote_average'] * 10 .''.'%'}}</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="entity-list">
                                <li>
                                    <span class="entity-list-title text-warning">Release:</span>
                                    <span class="text-warning">{{ Carbon\Carbon::parse($show['release_date'])->format('d M, Y')}}</span>
                                </li>
                                <li>
                                    <br>
                                    <h4 class="text-white text-center">SINOPSIS:</h4><br>
                                    <h5 class="text-warning">{{$show['overview']}}</h5>
                                </li>
                            </ul><br>
                            <a href="https://www.youtube.com/watch?v={{ $show['videos']['results'][0]['key'] }}" class="btn btn-warning btn-block"><i class="fas fa-play-circle"> PLAY TRAILER</a></i>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="section-head">
                    <h2 class="section-title text-white">CAST</h2>
                </div>
                <div class="container">
                    <div class="top-block-footer">
                        <div class="row">
                            @foreach ($show['credits']['cast'] as $cast)
                                    @if($loop->index < 8)                                  
                                    <div class="col-md-3">
                                        <br>
                                        <article class="poster-entity" data-role="hover-wrap">
                                            <div class="embed-responsive embed-responsive-poster">
                                                <img class="embed-responsive-item" src=" {{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" alt="" />
                                            </div>
                                            <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                                            <div class="d-over bg-highlight-bottom">
                                                <h4 class="entity-title">
                                                    <a class="content-link" href="#"></a>
                                                </h4>
                                                <div class="entity-info">
                                                    <div class="info-lines">
                                                        <div class="info info-short">
                                                            <h4 class="info-text">{{$cast['name']}}</h4>
                                                            <span class="info-text">As</span><br>
                                                            <h4 class="info-text text-warning">{{$cast['character']}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            
                        </section>
                        <div class="section-head">
                            <h2 class="section-title text-white">CREW</h2>
                        </div>
                        <div class="grid row">
                            @foreach ($show['credits']['crew'] as $crew)
                            @if($loop->index < 9)
                            <div class="col-sm-4">
                                <div class="gallery-card-entity">
                                    <div class="entity-preview" data-role="hover-wrap">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <img class="embed-responsive-item" src= "{{ 'https://image.tmdb.org/t/p/original/'.$crew['profile_path'] }}" alt="" />
                                        </div>
                                        <div class="bg-theme-lighted d-over collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                            <div class="entity-view-popup">
                                                <a class="action-icon-theme action-icon-bordered rounded-circle" href="{{ 'https://image.tmdb.org/t/p/w500/'.$crew['profile_path'] }}" data-magnific-popup="image">
                                                    <span class="icon-content"><i class="fas fa-eye"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entity-content">
                                        <h3 class="entity-title text-warning"><strong>{{$crew['name']}}</strong></h3>
                                        <h3 class="entity-title text-warning">{{$crew['job']}}</h3>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
         
        <!-- jQuery library -->
        <script src="/assets/js/jquery-3.3.1.js"></script>
        <!-- Bootstrap -->
        <script src="/assets/bootstrap/js/bootstrap.js"></script>
        <!-- Paralax.js -->
        <script src="/assets/parallax.js/parallax.js"></script>
        <!-- Waypoints -->
        <script src="/assets/waypoints/jquery.waypoints.min.js"></script>
        <!-- Slick carousel -->
        <script src="/assets/slick/slick.min.js"></script>
        <!-- Magnific Popup -->
        <script src="/assets/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- Inits product scripts -->
        <script src="/assets/js/script.js"></script>
    </body>
</html>