<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampsController extends Controller
{
    public function index()
    {
        return view('camps.index');
    }
}
