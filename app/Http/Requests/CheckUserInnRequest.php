<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\CorrectInnValue;
use App\Rules\Length;
use Illuminate\Foundation\Http\FormRequest;

class CheckUserInnRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'inn' => [
                'bail',
                'required',
                'numeric',
                'integer',
                new Length,
                new CorrectInnValue
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'inn.required' => 'Необходимо указать ИНН.',
            'inn.numeric'  => 'ИНН должен содержать только цифры.',
            'inn.integer'  => 'ИНН должен быть целым числом.',
        ];
    }
}
