<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AddYearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'numeric', 'min:2000', 'max:2050',
                Rule::unique('years')->where('user_id', Auth::user()->id)->whereNull('deleted_at')
            ]
        ];
    }
}
