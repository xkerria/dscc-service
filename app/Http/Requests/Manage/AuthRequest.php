<?php

namespace App\Http\Requests\Manage;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'username' => 'required|string',
            'password' => 'required|string'
        ];
    }
}
