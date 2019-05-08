<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends JsonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "isbn" => "required|string",
            "country" => "required|string",
            "authors" => "required|string",
            "publisher" =>"required|string",
            "release_date" => "required|date",
            "number_of_pages" => "required|integer"
        ];
    }
}
