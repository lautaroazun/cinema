<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;
use Cinema\Models\imagenes3;

class Createimagenes3Request extends Request
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
