<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(session()->get('loggedin') !== NULL && session()->get('loggedin')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image_url' => 'required|url',
            'title' => 'required',
            'subtitle' => 'required',
            'desc' => 'required:max:200',
        ];
    }

    public function messages()
    {
        return [
            'image_url.required' => 'URL од слика е задолжително!',
            'image_url.url' => 'URL-то не е валидно!',
            'title.required' => 'Наслов е задолжителен!',
            'subtitle.required' => 'Поднаслов е задолжителен!',
            'desc.required' => 'Описот е задолжителен!',
            'desc.маџ' => 'Описот не смее да е подолг од 200 карактери!',
            
        ];
    }
}
