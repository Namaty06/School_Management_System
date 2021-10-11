<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentValidation extends FormRequest
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
           
                'code' => 'required|string|max:25|min:6',
                'name' => 'required|string|max:255',
                'birthday' => 'required|date',
                'phone' => 'required|max:11|string|min:9',
                'grade_id'=>'required|exists:grades,id'
          
        ];
    }
}
