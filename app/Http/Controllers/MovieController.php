<?php

namespace App\Http\Controllers;

use App\Http\Requests\movieRequest\{addMovieRequest, updateMovieRequest};
use App\Models\Movie;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $movieService;
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }
    //----------------------------------------------------------------------------------------
    /**
     * get all movies
     * @param string $genre to filter the movies by genre(optional)
     * @param string $director to filter the movies by director(optional)
     * @param string $sort to sort the movies desc or asc, and desc by default
     */
    public function index(Request $request)
    {
        // Get the order from the request, default to 'desc'
        $sort = $request->get('sort', 'desc');
        $genre = $request->get('genre');
        $director = $request->get('director');

        // Use the service to filter movies by genre or director if provided
        if ($genre) {
            $movies = $this->movieService->filterByGenre($genre);
        } else if ($director) {
            $movies = $this->movieService->filterByDirector($director);
        }

        //then sort the filtered movies
        $sortedMovies = $this->movieService->sortByReleaseYear($sort);
        $listOfMovies = $sortedMovies->intersect($movies);

        // Return the filtered and sorted movies
        return response()->json(['message' => 'The list of movies:', 'status' => 200, 'data' => $listOfMovies]);
    }
    //----------------------------------------------------------------------------------------
    /**
     * Store a new movie
     * Making the validation process in a custom request "addMovieRequest"
     * @param addMovieRequest $request: The request object containing the movie data. It is validated using the custom addMovieRequest class to ensure the required fields are properly formatted.
     */
    public function store(addMovieRequest $request)
    {
        $movieRequest = [
            'title' => $request->title,
            'director' => $request->director,
            'genre' => $request->genre,
            'release_year' => $request->release_year,
            'description' => $request->description,
        ];
        $movie = $this->movieService->createMovie($movieRequest);
        return response()->json(['message' => 'The movie created successfully', 'status' => 201, 'data' => $movie]);
    }
    //----------------------------------------------------------------------------------------
    /**
     * get a specific movie
     * @param Movie $movie: The instance of the Movie model that is being retrieved.
     */
    public function show(Movie $movie)
    {
        $movie->findOrFail($movie->id);
        return response()->json(['message' => 'The movie created successfully', 'status' => 200, 'data' => $movie]);
    }
    //----------------------------------------------------------------------------------------
    /**
     * Update a specific movie
     * Making the validation process in a custom request "updateMovieRequest"
     * @param  updateMovieRequest $request: The request object containing the data to update the movie. It is validated using the custom updateMovieRequest class.
     * @param Movie $movie: The instance of the Movie model that is being updated.
     */
    public function update(updateMovieRequest $request, Movie $movie)
    {
        $updatedMovie = $this->movieService->updateMovie($movie, $request->validated());
        return response()->json(['message' => 'The movie updated successfully', 'status' => 200, 'data' => $updatedMovie]);
    }
    //----------------------------------------------------------------------------------------
    /**
     * delete a specific movie
     * @param Movie $movie: An instance of the Movie model that represents the movie to be deleted $name
     */
    public function destroy(Movie $movie)
    {
        $this->movieService->deleteMovie($movie);
        return response()->json(['message' => 'The movie deleted successfully', 'status' => 204, 'data' => null]);
    }
    //Note: Not Found Exception has been proccessed in Handler file.
}
