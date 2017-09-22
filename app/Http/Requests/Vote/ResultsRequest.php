<?php

namespace App\Http\Requests\Vote;

use App\Http\Requests\FormRequest;

class ResultsRequest extends FormRequest
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
            'title_de' => 'required',
            'title_fr' => 'required',
            'title_it' => 'required',
            'source' => 'nullable|url',
            'total_vote' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'yes_vote_percentage' => 'nullable|numeric',
            'no_vote_percentage' => 'nullable|numeric',
            'vote_date' => 'required|date',
        ];
    }
}
