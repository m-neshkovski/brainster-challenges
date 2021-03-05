<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'vrabotiEmail' => 'required|email',
            'vrabotiPhone' => 'required|regex:/^[0-9+]+$/|min:9|max:12',
            'vrabotiCompany' => 'required|regex:/^[a-zA-Z -_]+$/|min:3',
        ];
    }

    public function messages()
    {
        return [
            'vrabotiEmail.required' => 'Полето Е-мејл е задолжително!',
            'vrabotiEmail.email' => 'Внесениот Е-мејл мора да е валиден!',
            'vrabotiPhone.required' => 'Полето Телефон е задолжително!',
            'vrabotiPhone.regex' => 'Полето Телефон може да прима само цифри!',
            'vrabotiPhone.min:9' => 'Полето Телефон мора да има најмалку 9 цифри!',
            'vrabotiPhone.min:12' => 'Полето Телефон може да има најмногу 12 цифри!',
            'vrabotiCompany.required' => 'Полето Компанија е задолжително!',
            'vrabotiCompany.regex' => 'Полето Компанија прима, бројки, букви. „-“ и „_“!',
            'vrabotiCompany.min:3' => 'Полето Компанија мора да има најмалку 3 карактери!',
        ];
    }
}
