<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

class SinglePageController extends Controller
{
    public function index()
    {
        return view('panel.index');
    }
}
