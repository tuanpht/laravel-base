<?php

namespace App\Validators;

class ValidatorData
{
    public $rules = [];

    public $messages = [];

    public $attributes = [];

    /**
     * Create validator data
     *
     * @param array $rules
     * @param array $messages
     * @param array $attributes
     */
    public function __construct(array $rules, array $messages = [], array $attributes = [])
    {
        $this->rules = $rules;
        $this->messages = $messages;
        $this->attributes = $attributes;
    }
}
