<?php

namespace App\Validators;

use Illuminate\Http\Request;
use InvalidArgumentException;
use BadMethodCallException;
use Illuminate\Support\Facades\Validator;

abstract class BaseValidator
{
    /**
     * Laravel Validator object
     *
     * @var \Illuminate\Contracts\Validation\Validator
     */
    protected $baseValidator;

    /**
     * Validate
     *
     * @param string $ruleMethod e.g. create
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \InvalidArgumentException
     */
    public function validate(string $ruleMethod, Request $request)
    {
        if (method_exists($this, $ruleMethod)) {
            throw new InvalidArgumentException('Validation rule does not exist.');
        }

        $validatorData = $this->{$ruleMethod}($request);

        $this->baseValidator = Validator::make(
            $request->all(),
            $validatorData->rules,
            $validatorData->messages,
            $validatorData->attributes
        );

        // After Validation Hook, e.g. afterCreate
        $afterValidationHookMethod = 'after' . ucfirst($ruleMethod);
        if (method_exists($this, $afterValidationHookMethod)) {
            $this->{$afterValidationHookMethod}($this->baseValidator);
        }

        $this->baseValidator->validate();
    }

    public function getBaseValidator()
    {
        if ($this->baseValidator === null) {
            throw new BadMethodCallException('Validation must be called first');
        }

        return $this->baseValidator;
    }
}
