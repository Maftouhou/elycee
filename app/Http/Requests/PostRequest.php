<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
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
            'user_id'       => 'required|integer', 
            'title'         => 'required|string|max:1000', 
            'content'       => 'required|string', 
            'url_thumbnail' => 'max:1000',
            'status'        => 'required|boolean'
        ];
    }
}
