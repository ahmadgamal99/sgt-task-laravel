<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{

    public function authorize()
    {
        return abilities()->contains('update_employees');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('employee')->id;

        return [
            'first_name'  => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'phone'       => ['required','string','max:255','unique:employees,phone,' . $id],
            'email'       => ['required','string','email','unique:employees,email,' . $id],
            'occupation'  => ['required','string','max:255'],
            'company_id'  => ['required','exists:companies,id'],
        ];
    }
}
