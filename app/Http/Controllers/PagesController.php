<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function table()
    {
        return view('pages.tables');
    }

    public function billing()
    {
        return view('pages.billing');
    }

    public function notifications()
    {
        return view('pages.notifications');
    }

    public function management()
    {
        return view('profile.user-management');
    }
}
