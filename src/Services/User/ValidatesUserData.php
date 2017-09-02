<?php

namespace Viviniko\Permission\Services\User;

use Viviniko\Support\ValidatesData;
use Illuminate\Support\Facades\Config;

trait ValidatesUserData
{
    use ValidatesData;

    public function validateCreateData($data)
    {
        $this->validate($data, $this->rules());
    }

    public function validateUpdateData($userId, $data)
    {
        $rules = $this->rules($userId);
        unset($rules['password']);
        $this->validate($data, $rules);
    }

    public function rules($userId = null)
    {
        $userId = $userId ? (',' . $userId) : '';
        $table = Config::get('permission.users_table');
        return [
            'email' => 'email|unique:' . $table . ',email' . $userId,
            'phone' => 'regex:/^\d{6,11}$/|unique:' . $table . ',phone' . $userId,
            'firstname' => 'required|max:32',
            'lastname' => 'required|max:32',
            'password' => 'required|min:6|confirmed',
        ];
    }
}