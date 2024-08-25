<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use SebastianBergmann\Type\VoidType;

class MovieService
{
    /**
     *
     * @param $data an array containing the data required to create a new movie.
     * @return Movie: The function returns an instance of the newly created Movie model containing the saved movie’s details.
     */
    public function createMovie($data)
    {
        return Movie::create($data);
    }
    //----------------------------------------------------------------------------------------
    /**
     * @param Movie $movie: The instance of the Movie model that is being updated.
     * @param array $data: An associative array containing the movie data to be updated. Possible keys include:
     */
    public function updateMovie(Movie $movie, $data)
    {
        $movie->update($data);
        return $movie;
    }
    //----------------------------------------------------------------------------------------
    /**
     * @param Movie $movie: The instance of the Movie model that is being updated.
     */
    public function deleteMovie(Movie $movie)
    {
        $movie->delete();
    }
    //----------------------------------------------------------------------------------------
    /**
     * This function retrieves and sorts movies by their release year in either ascending or descending order.
     * @param string $sort (optional): The sort order, which can be either 'asc' for ascending or 'desc' for descending. If this parameter is empty or invalid, the function defaults to 'desc'.
     * @return Collection: A collection of Movie instances sorted by their release_year.
     */
    public function sortByReleaseYear($sort)
    {
        // Set default order to 'desc' if the provided sort is empty
        $sort = empty($sort) ? 'desc' : $sort;

        //the Invalid Argument exception has been proccessed in Handler file.

        // Retrieve and sort movies by release_year
        return Movie::orderBy('release_year', $sort)->get();
    }
    //----------------------------------------------------------------------------------------
    /**
     * This function retrieves movies that belong to a specified genre. It filters the movies based on the given genre and returns a collection of matching records.
     * @param string $genre: The genre to filter movies by. The function will only return movies that match this genre exactly.
     * @return Collection: A collection of Movie instances that belong to the specified genre.
     */
    public function filterByGenre($genre)
    {
        // Retrieve and filter movies by chosen genre
        return Movie::where('genre', $genre)->get();
    }
    //----------------------------------------------------------------------------------------
    /**
     * This function retrieves movies that belong to a specified director. It filters the movies based on the given director and returns a collection of matching records.
     * @param string $director: The director to filter movies by. The function will only return movies that match this director exactly.
     * @return Collection: A collection of Movie instances that belong to the specified director.
     */
    public function filterByDirector($director)
    {
        // Retrieve and filter movies by chosen genre
        return Movie::where('director', $director)->get();
    }
}
