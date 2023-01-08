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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $post = $this->route()->parameter('post');
        
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:PUBLISHED,DRAFT',
            'file' => 'image'
        ];

        if($post){
            $rules['slug'] ='required|unique:posts,slug,'. $post->id;
        }

        if($this->status == 'PUBLISHED'){
            $rules = array_merge($rules, [
                'category_id' => 'required|exists:categories,id',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
