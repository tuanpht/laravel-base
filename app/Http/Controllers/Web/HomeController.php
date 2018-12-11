<?php

namespace App\Http\Controllers\Web;

use App\Models\User;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->viewData['title'] = trans('home.title');
    }

    public function index()
    {
        return view('web.welcome', $this->viewData);
    }
}
