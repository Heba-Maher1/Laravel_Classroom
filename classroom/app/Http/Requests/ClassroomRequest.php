<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:255|',
                'section' => 'nullable|string|max:255',
                'subject' => 'nullable|string|max:255',
                'room' => 'nullable|string|max:255',
                'cover_image' => [
                    'nullable',
                    'image',
                ]
        ];
    }

    public function messages(): array
    {
            return [
                'required' => ':attribute Importent!',
                'name.required' => 'The name is required',
            ];
    }
}
