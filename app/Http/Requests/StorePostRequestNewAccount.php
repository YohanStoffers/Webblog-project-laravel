<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequestNewAccount extends FormRequest
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
            'username'=> ['min:3','max:25','Unique:users,username','required'],
            'email' => ['Email', 'Unique:users,email', 'required'],
            'password' => ['min:5','max:255', 'alpha_dash','required',],
            'author' => ['required', 'boolean'],
            'premium' => ['required', 'boolean'],
            
        ];
    }
}
