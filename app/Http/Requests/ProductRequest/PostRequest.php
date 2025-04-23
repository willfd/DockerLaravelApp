<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Create a custom response for validation failures
        $response = response()->json(
            [
                '@type' => 'Error',
                'code' => 400,
                'reason' => 'Bad Request',
                'message' => $validator->errors(),
            ],
            400
        );
        throw new ValidationException($validator, $response);
    }
}
