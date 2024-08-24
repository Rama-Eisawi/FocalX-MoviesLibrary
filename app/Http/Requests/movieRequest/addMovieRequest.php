<?php

namespace App\Http\Requests\movieRequest;

use Illuminate\Foundation\Http\FormRequest;

class addMovieRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'release_year' => 'required|digits:4|min:1820|integer',
            'description' => 'nullable|string',
        ];
    }
}
