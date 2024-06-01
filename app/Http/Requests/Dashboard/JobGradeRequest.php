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
            'job_id'=> 'required|exists:jobs,id',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'=>'حقل الدرجه الوظيفيه مطلوب .',
            'name.min'=>'برجاء كتابة حقل الدرجه الوظيفيه أكثر من 10 كلمات.',
            'name.max'=>'برجاء كتابة حقل الدرجه الوظيفيه أقل من من 300 كلمة.',
            'job_id.required'=>'حقل الوظيفه مطلوب .',
            'job_id.exists'=>'حقل الوظيفه غير موجود .',
        ];
    }
}
