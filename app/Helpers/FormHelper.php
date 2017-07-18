<?php

function has_errors($fields, $errors)
{
    foreach ($fields as $field) {
        if ($errors->has($field)) {
            return true;
        }
    }
    return false;
}
