<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

abstract class JsonRequest extends FormRequest
{
    abstract public function rules ();

    public function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'status_code' => 400,
            'data' => $errors
        ], Response::HTTP_BAD_REQUEST));
    }
}
