<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class VacationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'=>'required|string|in:satisfying,emergency,regular,Annual,mission',
            'start' => 'required|date',
            'to' => 'required|date',
            'notes' => 'nullable|string|max:1000',
            'employee_id'=> 'required|exists:employees,id',
            'acting'=> 'required|exists:employees,id',
            'file'=> 'file|mimes:docx,doc,pdf,png,webp,jpg,jpeg',
        ];
    }


    public function messages(): array
    {
        return [
            'type.required'=>'نوع الأجازه مطلوب',
            'type.in'=>'يجب أختيار نوع الأجازه الموجود بالجدول',
            ########################################################
            'start.required'=>'حقل أبتداء الاجازه مطلوب',
            'start.date_format' => 'تاريخ أبتداء الاجازه لا يتطابق مع الصيغة m/d/Y.',
            ########################################################
            'to.required'=>'حقل أنتهاء الاجازه مطلوب',
            'to.date_format' => 'تاريخ أنتهاء الاجازه لا يتطابق مع الصيغة m/d/Y.',
            ########################################################
            'notes.max'=>'برجاء كتابة الملاحظات أقل من 1000 كلمة.',
            ########################################################
            'employee_id.required' => 'برجاء أختيار الموظف.',
            'employee_id.exists' => 'الموظف المحدد غير موجود.',
            ########################################################
            'file.file'=>'يجب أن يكون حقل الصورة من نوع ملف.',
            'file.mimes'=>'يجب أن يكون حقل الملف  من النوع:، doc,docs,pdf,png,webp,jpg,jpeg.',
        ];
    }
}
