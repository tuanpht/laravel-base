<?php

namespace App\Models\Validators;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostValidator extends BaseValidator
{
    protected function create(Request $request)
    {
        return new ValidatorData([
            'title' => ['required', Rule::unique('posts'), 'max:255'],
            'body' => ['required'],
        ]);
    }

    protected function update(Request $request)
    {
        return $this->create($request);
    }
}
