<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKaryawanRequest extends FormRequest
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
            'nip'=>['required',Rule::unique('karyawans')->ignore($this->karyawan->id, 'id')],
            'nama'=>'required',
            'username'=>'required',
            'password'=>'required',
            'jabatan'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'role'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nip.required'=>'NIP Harus Diisi',
            'nip.unique' => 'NIP Sudah Digunakan',
            'nama.required'=>'Nama Harus Diisi',
            'username.required'=>'Username Harus Diisi',
            'password.required'=>'Password Harus Diisi',
            'jabatan.required'=>'Jabatan Harus Diisi',
            'alamat.required'=>'Alamat Harus Diisi',
            'jenis_kelamin.required'=>'Jenis Kelamin Harus Diisi',
            'role.required'=>'Role Harus Diisi',
        ];
    }
}