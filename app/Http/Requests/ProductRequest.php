<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [];

        if ($this->route()->getActionMethod() == 'store') {
            $rules = $this->store();
        } elseif ($this->route()->getActionMethod() == 'update') {
            $rules = $this->update();
        }
        return $rules;
    }

    public function store(): array
    {
        $rules = [];
        $rules['title'] = ['required'];
        $rules['desciption'] = ['required'];

        return $rules;
    }

    public function update(): array
    {
        $rules = [];
        $rules['title'] = ['required'];
        $rules['desciption'] = ['required'];

        return $rules;
    }

}
