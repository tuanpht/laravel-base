<?php

/**
 * Check if an input has error, e.g. validation errors
 *
 * @param array|string $fields Input fields name
 * @param \Illuminate\Support\MessageBag $errors
 * @param string $errorCssClass   Css class when field has error
 * @param string $noErrorCssClass Css class when field has no error
 *
 * @return string
 */
function has_error($fields, $errors, $errorCssClass = 'has-error', $noErrorCssClass = '')
{
    return $errors->has($fields) ? $errorCssClass : $noErrorCssClass;
}

/**
 * Get the path to a versioned Mix file in public/assets folder
 *
 * @param string $assetPath Relative path in public/assets folder
 *
 * @return \Illuminate\Support\HtmlString|string
 */
function mix_asset($assetPath)
{
    return mix($assetPath, 'assets');
}
