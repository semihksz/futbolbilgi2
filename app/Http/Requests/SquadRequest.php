<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SquadRequest extends FormRequest
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
        $rule = [
            'team' => 'required',
            'season_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'name' => 'required',
            'nationality' => 'required',
            'position' => 'required',
            'birthday' => 'required',
            'age' => 'required',
            'height' => 'required',
            'shirt_number' => 'required',
        ];
        if ($this->filled('image')) {
            $rule['image'] = 'required|image|mimes:png,jpg,jpeg,webp';
        }
        return $rule;
    }
}
