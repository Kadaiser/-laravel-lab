<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get the validation factory instance.
     *
     * @return \Illuminate\Contracts\Validation\Factory
     */
    public function getCredentials()
    {
        $username = $this->get('username');

        //email or username auth
        if ($this->isEmail($username)) {
            return [
                'email' => $username,
                'password' => $this->get('password'),
            ];
        }
        return $this->only('username', 'password');
        
    }

    /**
     * Determine if the given string is an email.
     *
     * @param  string  $value
     * @return bool true if the given string is an email
     */
    public function isEmail($value = null)
    {
        $factory = $this->container->make(ValidationFactory::class);
        return !$factory->make(['username' => $value], ['username' => 'email'])->fails();
    }
}
