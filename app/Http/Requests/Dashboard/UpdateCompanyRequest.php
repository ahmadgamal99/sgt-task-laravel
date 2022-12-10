<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{

    public function authorize()
    {
        return abilities()->contains('update_companies');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('company')->id;

        return [
            'name'      => ['required', 'string', 'max:255','unique:companies,name,' . $id],
            'email'     => ['required','string','email','unique:companies,email,' . $id],
            'website'   => ['nullable', 'string', 'max:255', 'url','unique:companies,website,' . $id ],
            'revenue'   => ['nullable', 'numeric', 'between:0,9999999999.99' ],
            'logo'      => ['nullable','mimes:jpeg,jpg,png,gif,svg' , 'max:10000'] ,
        ];
    }
}
