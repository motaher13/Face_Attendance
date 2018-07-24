<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/15/2018
 * Time: 6:20 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{

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
            'title' => 'required',
        ];
    }
}