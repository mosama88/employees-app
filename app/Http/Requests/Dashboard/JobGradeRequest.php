<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class JobGradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

//'name',
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:10|max:300',
            'num_of_day'=>'required|integer|between:21,50',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'=>'حقل الوظيفه مطلوب .',
            'name.min'=>'برجاء كتابة حقل الوظيفه أكثر من 10 كلمات.',
            'name.max'=>'برجاء كتابة حقل الوظيفه أقل من من 300 كلمة.',
            'num_of_day.required'=>'حقل عدد أيام الاجازه مطلوب .',
            'num_of_day.between'=>'برجاء كتابة حقل عدد أيام الاجازه أكثر من او يساوى 21 او أقل من  او يساوى 50 .',
            'num_of_day.integer'=>'برجاء كتابة حقل عدد أيام بالأرقام.',
        ];
    }
}
