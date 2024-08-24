<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
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
    public function sortByReleaseYear($sort)
    {
        // Set default order to 'desc' if the provided sort is empty
        $sort = empty($sort) ? 'desc' : $sort;

        //the Invalid Argument exception has been proccessed in Handler file.

        // Retrieve and sort movies by release_year
        return Movie::orderBy('release_year', $sort)->get();
    }
    public function filterByGenre($genre)
    {
        // Retrieve and filter movies by chosen genre
        return Movie::where('genre', $genre)->get();
    }
    public function filterByDirector($director)
    {
        // Retrieve and filter movies by chosen genre
        return Movie::where('director', $director)->get();
    }
    public function pagination()
    {
        
    }
}
