<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherValidation extends FormRequest
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
          
            'cin' => 'required|string|max:25',
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone' => 'required|max:11|string',
            'salarie'=>'required|numeric',
            'subject'=>'required|in:Maths,Algebra,Physics&Chemistry,History&Geography,Biology,Physical Education,French'
        ];
    }
}
