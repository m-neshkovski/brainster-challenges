<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TeamRequest extends FormRequest
{
    public function authorize()
    {
        return (Auth::user()->usertype->name == 'admin') ? true : false;;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'year_founded' => 'required',
        ];
    }
}
