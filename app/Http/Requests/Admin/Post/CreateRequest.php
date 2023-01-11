<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required|string',
            'category_id' => 'required|integer',
            'meta_title' => 'required',
            'description' => 'required',
            'small_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết không được để trống',
            'image.required' => 'Hình ảnh không được để trống',
            'category_id.integer' => 'Danh mục không được để trống',
            'meta_title.required' => 'Tiêu đề không được để trống',
            'description.required' => 'Nội dung không được để trống',
            'small_description.required' => 'Mô tả không được để trống',
        ];
    }
}
