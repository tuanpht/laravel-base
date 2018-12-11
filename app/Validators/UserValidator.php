<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserValidator extends BaseValidator
{
    protected function create(Request $request)
    {
        return new ValidatorData([
            'email' => ['required', Rule::unique(User::getTableName()), 'max:255'],
        ]);
    }

    protected function update(Request $request)
    {
        return $this->create($request);
    }
}
