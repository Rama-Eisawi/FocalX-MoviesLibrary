<?php

namespace App\Services;

use App\Models\Movie;
use SebastianBergmann\Type\VoidType;

class MovieService
{
    public function createMovie($data)
    {
        return Movie::create($data);
    }
    public function updateMovie(Movie $movie, $data)
    {
        $movie->update($data);
        return $movie;
    }
    public function deleteMovie(Movie $movie)
    {
        $movie->delete();
    }
    public function sortMoviesByReleaseYear($sort)
    {
        // Set default order to 'asc' if the provided order is empty
        $sort = empty($sort) ? 'asc' : $sort;

        //the Invalid Argument exception has been proccessed in Handler file.

        // Retrieve and sort movies by release_year
        return Movie::orderBy('release_year', $sort)->get();
    }
}
