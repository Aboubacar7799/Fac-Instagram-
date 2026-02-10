<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => ['required', 'email', 'max:50'],
            'sujet' => 'required',
            'message' => 'required'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'nom.required' => 'Le nom est obligatoire',
    //         'prenom.required' => 'Le prenom est obligatoire',
    //         'sujet.required' => 'Le sujet est obligatoire',
    //         'message.unique' => 'Le message est obligatoire',
    //         'email.required' => 'L\'email est obligatoire',
    //     ];
    // }
}
