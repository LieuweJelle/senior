<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgenda extends FormRequest
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
            'user_id' => 'required|integer',
            'd' => 'required|integer',
            'm' => 'required|integer',
            'y' => 'required|integer',
            'start' => 'required|integer',
            'stop' => 'required|integer',
        ];
    }
}
