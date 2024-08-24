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
}
