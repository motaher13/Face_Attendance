<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/15/2018
 * Time: 7:31 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseMaterialRequest extends FormRequest
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
            'url' => 'required_without:file',
            'file' => 'required_without:url|mimes:mkv,mp4,3gp,flv',
        ];
    }
}