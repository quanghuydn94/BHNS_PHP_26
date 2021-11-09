<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = comments::all();
        return view('panel.comment.index', compact('comments'));
    }

    public function delete($id)
    {
        comments::find((int)$id)->update(['active'=>0]);
        return redirect()->route('comment.index');
    }

    public function restore($id)
    {
        comments::find((int)$id)->update(['active'=>1]);
        return redirect()->route('comment.index');
    }
}
