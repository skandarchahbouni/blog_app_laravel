<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GigRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "company_name" => 'bail|required|max:40',
            "job_title" => 'bail|required|max:100',
            "job_location" => 'required',
            "company_email" => 'required|email',
            "company_website" => "", // valid url ?
            "tags" => "nullable|numeric",
            "job_description" => 'required|max:1000'
        ];
    }
}
