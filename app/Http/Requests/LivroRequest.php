<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            
            'cd_isbn_livro' => ['required', 'cd_isbn_livro', 'unique:livros'],
            
            
        ];


    }

    public function messages(){
        return [
            
            'unique' => 'Este ":attribute" não se encontra disponivel no momento!'
        ];
    }

}