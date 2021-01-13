<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
        $rules = [];
        switch($this->method())
        {
            case 'POST':
                {
                    $rules = [
                        'name' => 'required|max:100|min:1|string',
                        'code' => 'required',
                        'image' => 'required|mimes:jpg,jpeg,png,svg|max:5000',
                    ];
                }
                break;
            case 'PATCH':
                {
                    $rules = [
                        'name' => 'required|max:100|min:1|string',
                        'code' => 'required',
                        'image' => 'mimes:jpg,jpeg,png,svg|max:5000',
                    ];
                }
                break;
            default:
                break;
        }
        return $rules;

    }
}
