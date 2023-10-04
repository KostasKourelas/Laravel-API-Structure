<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MovieCollection;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MovieCollection(Movie::paginate());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
       return new MovieResource(Movie::create($request->all()));
    }

    /**
     * Display the specified resource.
     * 
     */
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(['message' => 'Movie deleted successfully']);
    }
}
