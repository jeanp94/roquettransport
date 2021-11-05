<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules()
    {
        return [
            "title"            => "required|string|max:65000",
            "category"         => "required|integer|min:1",
            "slug"             => "required|alpha_dash|max:255",
            "content"          => "nullable|string",
            "published_at"     => "required|date",
            "banner"           => "nullable|integer",
            "image"            => "nullable|integer",
            "meta_title"       => "required|string|max:255",
            "meta_description" => "required|string|max:255",
        ];
    }
}
