<?php

// Sample helper
if (!function_exists('has_error')) {
    /**
     * Check if an input has error, e.g. validation errors
     *
     * @param array|string $fields Input fields name
     * @param \Illuminate\Support\MessageBag $errors
     * @param string $errorCssClass   Css class when field has error
     * @param string $noErrorCssClass Css class when field has no error
     *
     * @return boolean
     */
    function has_error($fields, $errors, $errorCssClass = 'has-error', $noErrorCssClass = '')
    {
        return $errors->has($fields) ? $errorCssClass : $noErrorCssClass;
    }
}

if (!function_exists('mix_asset')) {
    /**
     * Get the path to a versioned Mix file in public/assets folder
     *
     * @param string $assetPath Relative path in public/assets folder
     *
     * @return string
     */
    function mix_asset($assetPath)
    {
        return mix($assetPath, 'assets');
    }
}
