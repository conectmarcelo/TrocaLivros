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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'cd_isbn_livro' => 'required', 'bigInteger', 'cd_isbn_livro', 'unique:livros'
            
            
        ];
    }

    public function messages(){
        return [
            
            'unique' => 'Este ":attribute" não se encontra disponivel no momento!'
        ];
}
