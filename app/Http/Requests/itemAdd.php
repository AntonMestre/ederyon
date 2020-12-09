<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itemAdd extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
            'id' => 'required|string|max:6',
            'nom' => 'required|string|max:30',
            'lore' => 'required|string|max:200',
            'type' => 'required',
            'pallier' => 'required|string|max:2',
            'vit' => 'nullable|string|max:11',
            'def' => 'nullable|string|max:11',
            'ene' => 'nullable|string|max:11',
            'reg' => 'nullable|string|max:11',
            'conc' => 'nullable|string|max:11',
            'vite' => 'nullable|string|max:11',
            'pui' => 'nullable|string|max:11',
            'crit' => 'nullable|string|max:11',
            'esq' => 'nullable|string|max:11',
            'mel' => 'nullable|string|max:11',
            'dis' => 'nullable|string|max:11',
            'deg' => 'nullable|string|max:11',
            'soin' => 'nullable|string|max:11',
            'pro' => 'nullable|string|max:11',
            'cont' => 'nullable|string|max:11',
        ];
    }
}
