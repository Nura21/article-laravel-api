<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|unique:articles|max:255',
            'description' => 'required',
            'date' => 'required',
            'author' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('validation.required'),
            'description.required' => __('validation.required'),
            'date.required' => __('validation.required'),
            'author.required' => __('validation.required'),
        ]
    }
}
