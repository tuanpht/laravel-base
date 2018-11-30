<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Gate;

class BaseController extends Controller
{
    protected $viewData;

    public function __construct()
    {
        $this->viewData = [];
    }

    public function redirectToAction($action, $params = null, $controller = null)
    {
        $controller = $controller ?? '\\' . static::class;
        if ($params) {
            return redirect()->action("$controller@$action", $params);
        }

        return redirect()->action("$controller@$action");
    }
}
