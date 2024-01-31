<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestProduto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $request = [];
        if ($this->method() == "POST") {
            $request = [
                'nome' => 'required',
                'valor' => "required|regex:/^\d+(\.\d{1,2})?$/", //Para valores com decimal
            ];
        } 
        return $request;
    }
}