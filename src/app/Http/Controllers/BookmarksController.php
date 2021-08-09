<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarksController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->bookmark($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unbookmark($id);
        return back();
    }

    public function show($id)
    {
        $user = User::find($id);
        $bookmarks = $user->bookmarks();
        return view('bookmark.show', compact('user', 'bookmarks'));
    }
}
