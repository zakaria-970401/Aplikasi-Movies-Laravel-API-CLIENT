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
                                <li class="nav-item active">
                                    <a class="nav-link" href="#nowincinema">Now In Cinema</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#moviespopular">Movies Popular</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="#comingsoon">Coming Soon</a>
                                </li>
                            </li>
                        </ul>
                        <form action="/movies/result" method="GET" class="form-inline my-2 my-lg-0">
                            @csrf
                            <div class="form-group">
                                <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="query" id="query">    
                                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </header>

        <div class="container">
        <section class="section-text-white position-relative" id="nowincinema">
            <div class="d-background"></div>
            <div class="d-background bg-theme-blacked"></div>
            <div class="mt-auto container position-relative">
                <div class="top-block-head text-uppercase">
                    <h2 class="display-4">Now
                        <span class="text-theme">in cinema</span>
                    </h2>
                    <hr style="background-color: honeydew">
        </div>
        <div class="top-block-footer">
            <div class="row">
                @foreach ($now_playing as $now) 
                <div class="col-md-3">
                    <article class="poster-entity" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <img class="embed-responsive-item" src=" {{ 'https://image.tmdb.org/t/p/w500/'.$now['poster_path']}}" alt="" />
                        </div>
                        <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                        <div class="d-over bg-highlight-bottom">
                            
                            <h4 class="entity-title">
                                <a class="content-link" href="/movies/{{$now['id']}}">{{$now['title']}}</a>
                            </h4>
                            <div class="entity-category">
                                @foreach ($now['genre_ids'] as $aliran)
                                <a>
                                    {{ $genre->get($aliran) }} @if (!$loop->last), @endif
                                    
                                    @endforeach 
                                </div>
                                <div class="entity-info">
                                    <div class="info-lines">
                                        <div class="info info-short">
                                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                                <span class="info-text">{{$now['vote_average'] * 10 .'%' }}</span>
                                            </div>
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                                                <span class="info-text">{{Carbon\Carbon::parse($now['release_date'])->format('d-M-Y')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <br>
                            <br>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                </section>
                <section class="section-long">
                    <div class="container" id="moviespopular">
                        <div class="section-head">
                    <h2 class="section-title text-white">MOVIES POPULAR</h2>                    
                </div>
                <hr style="background-color: honeydew">
                @foreach ($movie_popular as $popular)
                <article class="movie-line-entity">
                    <div class="entity-poster" data-role="hover-wrap">
                        <br>
                        <div class="embed-responsive embed-responsive-poster">
                            <a href="/movies/{{$popular['id']}}">
                            <img class="embed-responsive-item" src="{{ 'https://image.tmdb.org/t/p/w500/'.$popular['poster_path'] }}" alt="" /></a>
                        </div>
                        <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                            <div class="entity-play">
                            <a href="#" class="action-icon-theme" data-magnific-popup="iframe" >
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="entity-content">
                        <h4 class="entity-title">
                            <a class="content-link text-white" href="/movies/{{$popular['id']}}">{{$popular['title']}}</a>
                        </h4>
                        <div class="entity-category">
                            <a class="text-white">@foreach ($popular['genre_ids'] as $aliran)
                                {{ $genre->get($aliran) }} @if (!$loop->last), @endif           
                                @endforeach 
                            </a>
                        </div>
                        <div class="entity-info">
                            <div class="info-lines">
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                    <span class="info-text text-white">{{$popular['vote_average'] * 10 .'%'}}</span>
                                </div>
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                                    <span class="info-text text-white">
                                       {{ Carbon\Carbon::parse($popular['release_date'])->format('d-M-Y') }} 
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="text-short entity-text text-white">
                            {{$popular['overview']}}
                        </p>
                    </div>
                    
                    @endforeach
                </article>
               
                
        </section>
        <section class="section-long">
            <div class="container">
                <div class="section-head" id="comingsoon">
                    <h2 class="section-title text-uppercase text-white">COMING SOON</h2>
                </div>
                <hr style="background-color: honeydew">
                <div class="grid row">
                    @foreach ($upcoming as $soon)
                    <div class="col-md-6">
                        <article class="article-tape-entity">
                        <a class="entity-preview" href="/movies/{{ $soon['id'] }}">
                                <span class="embed-responsive embed-responsive-16by9">
                                    <img class="embed-responsive-item" src="{{ 'https://image.tmdb.org/t/p/w500/'.$soon['poster_path'] }}" alt="" />
                                </span>
                                <span class="entity-date">
                                    <span class="tape-block tape-horizontal tape-single bg-theme text-white">
                                        <span class="tape-dots"></span>
                                        <span class="tape-content m-auto">
                                            {{ Carbon\Carbon::parse($soon['release_date'])->format('d-M-Y') }} 
                                        </span>
                                        <span class="tape-dots"></span>
                                    </span>
                                </span>
                                <span class="d-over bg-black-80 collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                    <span class="m-auto"><i class="fas fa-search"></i></span>
                                </span>
                            </a>
                            <div class="entity-content">
                                <h4 class="entity-title">
                                <a class="content-link text-white" href="/movies/{{ $soon['id']}}">{{$soon['title']}}</a>
                                </h4>
                                <div class="entity-category">
                                    <a class="text-white">
                                        @foreach ($soon['genre_ids'] as $aliran)
                                        {{ $genre->get($aliran) }} @if (!$loop->last), @endif           
                                        @endforeach 
                                    </a>
                                </div>
                                <p class="text-short entity-text text-white">{{$soon['overview']}}
                                </p>
                                <div class="entity-actions">
                                    <a class="text-uppercase" href="/movies/{{ $soon['id'] }}">Read More</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
        </section>
           
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
