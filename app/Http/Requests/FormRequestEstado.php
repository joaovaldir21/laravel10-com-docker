<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestEstado extends FormRequest
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
        if ($this->method() == "POST" || $this->method() == "PUT") {
            $request = [
                'nome' => 'required|unique:estados',
                'uf' => 'required|unique:estados|min:2|max:2',
            ];
        } 
        return $request;
    }

}
