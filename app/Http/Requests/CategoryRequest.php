<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ];

        if ($this->method() === 'PUT') {
            $rules['slug'] = 'required|string|max:255|unique:categories,slug,' . $this->category->id;
        }

        return $rules;
    }
}