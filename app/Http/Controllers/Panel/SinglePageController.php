<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SinglePageController extends Controller
{
    public function index()
    {
        if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'employee') { // set rolename is admin or employee to access into index page

            return view('panel.index');
        } else {                                                                         // if rolename is not admin or employee then logout and show message errors
            Auth::logout();
            return redirect('/')->withErrors('Thông tin không trùng khớp.');
        }
    }
}
