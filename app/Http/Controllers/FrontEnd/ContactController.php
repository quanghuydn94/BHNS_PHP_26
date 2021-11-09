<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comments;

class ContactController extends Controller
{
    public function aboutUs()
    {
        $comments = comments::orderby('id', 'desc')->limit(5)->get();
        return view('frontend.aboutUs.about', compact('comments'));
    }

    public function contact()
    {
        return view('frontend.aboutUs.contact');
    }
}
