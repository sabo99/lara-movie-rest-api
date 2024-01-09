<?php

namespace App\Http\Requests;

class StoreMovieRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:255', 'unique:movies,title'],
            'description' => ['required', 'string', 'max:255'],
            'rating'      => ['required', 'numeric', 'min:0', 'max:10'],
            'image'       => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':Attribute harus diisi.',
            'string'   => ':Attribute harus berupa string.',
            'max'      => ':Attribute tidak boleh lebih dari :max.',
            'numeric'  => ':Attribute harus berupa angka.',
            'min'      => ':Attribute tidak boleh kurang dari :min.',
            'unique'   => ':Attribute sudah terdaftar.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title'       => 'Judul',
            'description' => 'Deskripsi',
            'rating'      => 'Rating',
            'image'       => 'Gambar',
        ];
    }
}
