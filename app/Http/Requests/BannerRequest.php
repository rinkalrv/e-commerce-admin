<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'position' => 'integer|min:0',
            'url' => 'nullable|url',
        ];

        if ($this->method() === 'POST') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
        }

        return $rules;
    }
}