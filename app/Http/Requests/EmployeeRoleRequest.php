<?php
/**
 * Created by PhpStorm.
 * User: Motaher
 * Date: 2/10/2018
 * Time: 7:35 PM
 */

namespace App\Http\Requests;


class EmployeeRoleRequest extends FormRequest
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
       return[
           'pin' => 'required',
       ];
    }
}