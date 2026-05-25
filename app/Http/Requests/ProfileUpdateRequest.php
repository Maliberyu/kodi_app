<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:255'],
            'nama_lengkap' => ['nullable', 'string', 'max:255'],
            'email'        => [
                'required', 'string', 'lowercase', 'email', 'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'kelas'        => ['nullable', 'string', 'max:20'],
            'nama_sekolah' => ['nullable', 'string', 'max:255'],
            'avatar'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
