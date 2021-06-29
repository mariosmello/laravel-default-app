<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityStoreRequest extends FormRequest
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
            'state' => 'exists:states,slug',
            'name' => [
                'required',
                'max:100',
                Rule::unique('cities')->where(function ($query) {
                    /**
                     * @todo unico nome de cidade em um mesmo estado
                     */
                })
            ]
        ];
    }
}
