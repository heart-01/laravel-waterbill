<?php

namespace App\Http\Requests\site\profiles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-Za-z\s\.ก-๙]+$/',
            'email' => 'required|email:rfc,dns',
            'tel' => 'nullable|regex:/^[\d]{10}$/',
            'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
        ];
    }

    public function messages() { 
        return [
            'name.required' => 'กรุณากรอก ชื่อ-สกุล',
            'name.regex' => 'กรอก ชื่อ-สกุล เป็นตัวอักษร ภาษาไทย หรือ ภาษาอังกฤษ เท่านั้น',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
            'tel.regex' => 'กรอกหมายเลขเบอร์โทรศัพท์ให้ถูกต้อง',
            'picture.mimes' => 'กรุณาเลือกไฟล์ภาพนามสกุล jpeg,jpg,png',
            'picture.max' => 'ไฟล์รูปขนาดใหญ่เกินไปจำกัด 1000 kilobytes',
            'picture.image' => 'รูปที่อัพโหลดต้องเป็นไฟล์รูปภาพ',
        ];
    }
}
