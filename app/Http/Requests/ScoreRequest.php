<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ScoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'user_id'           => 'required|integer', 
            'question_id'       => 'required|integer', 
            'status_question'   => 'required|string|max:1000', 
            'note'              => 'required|integer'
        ];
    }
}
