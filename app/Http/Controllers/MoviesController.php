<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {
        $now_playing = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwY2UyY2ViNTU4NzViYjA3ZDQ1NTg2YjZjYWFhMzc0YiIsInN1YiI6IjVmMTExMTZlZWEzOTQ5MDAzODM0ODliZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ek-yXJWIyVkJsq3oz3KW4L-DeaAgVE-Ehuk705F5fFw')->get('https://api.themoviedb.org/3/movie/now_playing')->json()['results'];

        $listgenre = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwY2UyY2ViNTU4NzViYjA3ZDQ1NTg2YjZjYWFhMzc0YiIsInN1YiI6IjVmMTExMTZlZWEzOTQ5MDAzODM0ODliZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ek-yXJWIyVkJsq3oz3KW4L-DeaAgVE-Ehuk705F5fFw')->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

        $genre = collect($listgenre)->mapWithKeys(function ($paramgenre) {
            return [$paramgenre['id'] => $paramgenre['name']];
        });

        $movie_popular = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwY2UyY2ViNTU4NzViYjA3ZDQ1NTg2YjZjYWFhMzc0YiIsInN1YiI6IjVmMTExMTZlZWEzOTQ5MDAzODM0ODliZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ek-yXJWIyVkJsq3oz3KW4L-DeaAgVE-Ehuk705F5fFw')->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];

        $upcoming = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwY2UyY2ViNTU4NzViYjA3ZDQ1NTg2YjZjYWFhMzc0YiIsInN1YiI6IjVmMTExMTZlZWEzOTQ5MDAzODM0ODliZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ek-yXJWIyVkJsq3oz3KW4L-DeaAgVE-Ehuk705F5fFw')->get('https://api.themoviedb.org/3/movie/upcoming')->json()['results'];


        // dump($movie_popular);

        return view('index', compact('now_playing', 'genre', 'movie_popular', 'upcoming'));
    }


    public function show($id)
    {
        $show = Http::withToken('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIwY2UyY2ViNTU4NzViYjA3ZDQ1NTg2YjZjYWFhMzc0YiIsInN1YiI6IjVmMTExMTZlZWEzOTQ5MDAzODM0ODliZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ek-yXJWIyVkJsq3oz3KW4L-DeaAgVE-Ehuk705F5fFw')->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,cast,videos,images')->json();

        return view('detail', compact('show'));
    }

    public function search(Request $request)
    {

        $query = $request->query;


        $show = Http::get('https://api.themoviedb.org/3/search/movie', [
            'api_key' => '0ce2ceb55875bb07d45586b6caaa374b',
            'query' => $request->query,

        ])->json();

        dd($query);
        // return view('search', compact('show'));
    }
}
