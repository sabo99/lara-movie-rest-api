<?php

namespace App\Http\Requests;

use App\Traits\HasResponseJson;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Throwable;

class BaseFormRequest extends FormRequest
{
    use HasResponseJson;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Custom Message Failed Validation
     *
     * @param Validator $validator
     * @throws Throwable
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = collect($validator->errors()->messages())
            ->map(fn($item) => $item[0])
            ->toArray();

        throw new HttpResponseException(
            $this->responseJSON([
                'errors' => $errors
            ], 422)
        );
    }
}
