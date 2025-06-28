<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsPageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cms_pages,slug',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ];

        if ($this->method() === 'PUT') {
            // THE PROBLEM IS LIKELY HERE OR HOW $this->page is being resolved
            $rules['slug'] = 'required|string|max:255|unique:cms_pages,slug,' . $this->page->id;
        }

        return $rules;
    }
}