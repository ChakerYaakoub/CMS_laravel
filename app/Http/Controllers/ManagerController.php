<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //

    public function show()
    {
        return view('manager.index');
    }

    public function showForm()
    {
        return view('manager.create');
    }
}
