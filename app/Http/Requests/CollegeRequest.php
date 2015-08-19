<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CollegeRequest extends Request
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
            "name" => "required|max:255",
            "initials" => "required|max:20",
            "location_city_id" => "required|exists:location_cities,id"
        ];
    }
}
