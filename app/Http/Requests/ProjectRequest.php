<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class ProjectRequest extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // 'email' => 'email address',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = request();
        return [
            'product' => 'required',
            'description' => 'required',
            'target' => 'required',
            'has_coding_language' => 'required|boolean',
            'coding_language' => [
                    Rule::requiredIf(function () use ($request){
                        return ((bool) $request->has_coding_language === true);
                    })
                ],
            'has_buildup' => 'required|boolean',
            'buildup_file' => [
                    Rule::requiredIf(function () use ($request){
                        return ((bool) $request->has_buildup === true);
                    })
                ],
            'is_buildup_by_code_expert' => [
                    Rule::requiredIf(function () use ($request){
                        return ((bool) $request->has_buildup === false);
                    }),
                    'nullable', 'boolean'
                ],
            'buildup_date' => [
                    Rule::requiredIf(function () use ($request){
                        return ($request->is_buildup_by_code_expert === false);
                    }),
                    'nullable', 'date'
                ],
            'has_design' => 'required|boolean',
            'design_file' => [
                    Rule::requiredIf(function () use ($request){
                        return ((bool) $request->has_design === true);
                    })
                ],
            'is_design_by_code_expert' => [
                    Rule::requiredIf(function () use ($request){
                        return ((bool) $request->has_design === false);
                    }),
                    'nullable', 'boolean'
                ],
            'design_date' => [
                    Rule::requiredIf(function () use ($request){
                        return ($request->is_design_by_code_expert === false);
                    }),
                    'nullable', 'date'
                ],
        ];
    }
}
