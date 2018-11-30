<?php

namespace App\Services\Web\Eloquent;

use App\Models\User;

class UserService extends BaseService
{
    public function __construct(User $model)
    {
        $this->userModel = $model;
    }

    /**
     * @param array $inputs Associative array [name, email, password]
     *
     * @return \App\Models\User|array
     */
    public function create(array $inputs)
    {
        return $this->userModel->create($inputs);
    }

    /**
     * @param \App\Models\User $user
     * @param array            $inputs Associative array [name]
     *
     * @return boolean
     */
    public function update($user, $inputs)
    {
        return $user->update([
            'name' => $inputs['name'],
        ]);
    }
}
