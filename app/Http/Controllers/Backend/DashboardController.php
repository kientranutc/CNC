<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //show all
    public function  index()
    {
        return view('backend.index');
    }
    //
}
