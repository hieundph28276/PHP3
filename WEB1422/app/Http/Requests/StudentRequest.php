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
      // lấy ra phương thức hoạt động 
      $currentAction = $this->route()->getActionMethod();
      switch($this->method()) :
        case 'POST' :
            switch($currentAction) :
                case 'add' :
                    $rules = [
                        "email"=>"required|email|unique:students",
                        "name"=>"required"
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