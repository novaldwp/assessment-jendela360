<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class CarSellingRequest extends FormRequest
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
            'name'  => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'car_id'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Pembeli Harus Diisi',
            'name.string'   => 'Nama Pembeli Harus Berupa String',
            'email.required'=> 'Email Pembeli Harus Diisi',
            'email.email'   => 'Format Email Pembeli Harus Benar',
            'phone.required'=> 'Nomor Handphone Harus Diisi',
            'phone.integer' => 'Nomor Handphone Harus Berupa Angka',
            'car_id'        => 'Pilih Mobil Yang Ingin Dijual'
        ];
    }
}
