<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequestNewArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $author = False;
    
        if(auth()->user()->author === 1){
            $author = True;
        }

        return $author;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['min:3', 'max:120', 'required'],
            'content' => ['required'],
            'categories' => ['',],
            'image' => [''],
            'premium'=> [''],
        ];
    }
}
