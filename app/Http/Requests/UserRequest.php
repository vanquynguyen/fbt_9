<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($this->isMethod('PUT')) {
            return [
                'name' => 'required|max:255',
                'email' => 'required|max:255|email|unique:users,email,' . $request->id,
                'avatar' => 'image|max:10000',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:20|min:9',
                'gender' => 'required|numeric',
                'level' => 'required|numeric',
            ];
        }
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|max:10000',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20|min:9',
            'gender' => 'required|numeric',
            'level' => 'required|numeric',
        ];
    }
}
