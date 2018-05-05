<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
        $rules = [
            'firstname' => 'required|string|max:255', //bail
            'lastname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|min:10|max:10',
            'street' => 'required|string|max:255',
            'streetnumber' => 'required|string|max:255',
            'zipcode' => 'required|string|max:6',
            'place' => 'required|string|max:255',
            'intro' => 'nullable|string',
        ];
        if ($this->isMethod('post')) {
            $rules = array_merge($rules, ['email' => 'required|string|email|max:255|unique:users']);
            $rules = array_merge($rules, ['password' => 'required|string|min:6|confirmed']);
        } elseif ($this->isMethod('put')) {
            $rules = array_merge($rules, ['email' => 'required|string|email|max:255']);
        } 
        
        return $rules;
    }

    public function messages() //wordt al eerder in html afgevangen. 
    {
        return [
            'firstname.required' => 'De voornaam is vereist',
            'lastname.required'  => 'De achternaam is vereist',
        ];
    }
}
