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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST':
                switch ($currentAction) :
                    case 'add':
                        // dd(1233);
                        $rules = [
                            "email" => "required|email|unique:students",
                            "name" => "required",
                            "image" => "required|image|mimes:jpeg,jpg,png|max:5120"
                        ];
                        break;
                endswitch;
        endswitch;    
        return $rules;
    }
    public function messages()
    {
        return [
            'email.required'=>'Bắt buộc phải nhập email',
            'name.required'=>'Bắt buộc phải nhập tên',
            'email.unique'=>'emai không được trùng nhé'
        ];
    }

}
