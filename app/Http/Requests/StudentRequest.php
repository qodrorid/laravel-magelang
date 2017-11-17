<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        
        switch($this->method()) {
            case "POST":
                return [
                    'name' => 'required',
                    'address' => 'required',
                    'email' => 'required|email|unique:students',
                    'age' => 'required|numeric'
                ]; 
                break;
            case "PUT":
                return [
                    'name' => 'required',
                    'address' => 'required',
                    'email' => 'required|email',
                    'age' => 'required|numeric'
                ];
                break;
        }
        
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi'

        ];
    }
}
