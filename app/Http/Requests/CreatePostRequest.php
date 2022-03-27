<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            "title"=>"required|min:6",
            "body"=>"required",
            // 'image' => 'required|mimes:jpg'
        ];
    }
    public function messages(){
        return [
            "title.required"=>"No post can be created without title",
            "title.min"=>"title should be at least 6 characters",
            "body.required"=>"No post without body",
            // "image.required"=>"no post without image",
            // "image.mimes"=>"image should be extension jpg",
        ];
    }
}
