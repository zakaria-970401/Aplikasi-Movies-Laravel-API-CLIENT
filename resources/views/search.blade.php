@extends('layout.master')

@section('judul', 'Detail Movies')
    

@section('konten')
    
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
    @endsection