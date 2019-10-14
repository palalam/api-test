<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function all()
    {
        return response() -> json(Movie::select('id','title')->get(), 200);
    }

    public function search(Request $request)
    {
        $search_text = $request->search_text;
        $results = Movie::where('title', 'like', '%'.$search_text.'%') ->
        orWhere('actors', 'like', '%'.$search_text.'%') -> get();
        return response() -> json($results, 200);
    }
    public function show(Movie $movie)
    {
        return $movie;
    }

    public function store(Request $request)
    {
        $movie  = Movie::create(
            [   'title' => $request->title,
                'year' => $request->year,
                'format' => $request->film_format,
                'actors' => $request->actors,
                'author_user_id' => Auth::guard('api')->id()
            ]
        );

        return response() -> json($movie, 201);
    }
    public function update(Request $request, Movie $movie)
    {
        if($movie->author_user_id == Auth::guard('api')->id())
        {
            $movie -> update($request->all());
            return response() -> json($movie, 200);
        }
        else
            return response() -> json(['data' => 'You not author this movie!'], 400);
    }
    public function delete(Movie $movie)
    {
        if($movie->author_user_id == Auth::guard('api')->id())
        {
            $movie -> delete();
            return response() -> json(null, 204);
        }
        else
            return response() -> json(['data' => 'You not author this movie!'], 400);

    }
}
