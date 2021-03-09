<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'price' => 'required|integer',
            'stock' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama mobil harus diisi',
            'name.string'   => 'Nama mobil harus berupa string',
            'price.required'=> 'Harga mobil harus diisi',
            'price.integer' => 'Harga mobil harus berupa angka',
            'stock.required'=> 'Stok mobil harus diisi',
            'stock.integer' => 'Stok mobil harus berupa angka'
        ];
    }
}
