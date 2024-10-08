<?php

namespace App\Http\Requests\movieRequest;

use Illuminate\Foundation\Http\FormRequest;

class updateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:100',
            'release_year' => 'sometimes|required|digits:4|min:1820|integer',
            'description' => 'sometimes|string',
        ];
    }
}
