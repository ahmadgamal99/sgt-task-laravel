<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_companies');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required', 'string', 'max:255','unique:companies'],
            'email'     => ['required','string','email','unique:companies'],
            'website'   => ['nullable', 'string', 'max:255', 'url','unique:companies' ],
            'revenue'   => ['nullable', 'numeric', 'between:0,9999999999.99' ],
            'logo'      => ['required','mimes:jpeg,jpg,png,gif,svg' , 'max:10000','dimensions:min_width=100,min_height=100'] ,
        ];
    }
}
