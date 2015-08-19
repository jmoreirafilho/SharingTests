<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadRequest extends Request
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
            "link_url" => "required|max:255",
            "subject_id" => "required|exists:subjects,id",
            "description" => "required|max:255"
        ];
    }
}
