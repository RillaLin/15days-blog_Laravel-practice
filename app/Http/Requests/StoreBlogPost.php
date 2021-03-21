<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;


class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post=request()->post;
        if(!isset($post))   //如果是creaate流程進來的直接回傳true，不用做驗證
            return true;

        if($post->user_id==Auth::id())  //判斷文章id是否為使用者id
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'title'=>'required|max:225',
            'content'=>'required'
            
        ];
    }
}
