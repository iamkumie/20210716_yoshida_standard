<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|size:8',
            'address' => 'required',
            'opinion' => 'required|max: 120'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'お名前を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式にしてください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.size' => '郵便番号はハイフンを含めた８文字で入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => '120文字以内で入力してください',
        ];
    }

    // protected function prepareForValidation()
    // {
    //     $this->merge(['postcode' => mb_convert_kana($this->postcode, 'as')]);
    // }

    public function sanitize()
    {
        $input = $this->all();

        if (isset($input['postcode'])) {
            $input['postcode'] = mb_convert_kana($input['postcode'], 'as');
        }

        $this->replace($input);
        return $input;
    }
}
