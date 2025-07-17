<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:10',
            'detail' => 'nullable|min:3|max:10',
            'author' => 'nullable|min:3|max:10',
            'date' =>  'required|after_or_equal:today',
        ];
    }
    function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'author.required' => 'Author name is required!!!!!',
        ];
    }
}
