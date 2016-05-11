<?php

namespace Cinema\Http\Requests\API;

use Cinema\Models\imagenes3;
use InfyOm\Generator\Request\APIRequest;

class Createimagenes3APIRequest extends APIRequest
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
        return imagenes3::$rules;
    }
}
