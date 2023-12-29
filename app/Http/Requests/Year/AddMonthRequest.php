<?php

namespace App\Http\Requests\Year;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddMonthRequest extends FormRequest
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
            'index' => [
                'required',
                'string',
                'min:1',
                'max:12',
                Rule::unique('months')->where('year_id', $this->year_id)->whereNull('deleted_at')
            ],
        ];
    }
}
