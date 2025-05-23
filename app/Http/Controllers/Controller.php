<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Drivers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $totalBooking = Bookings::whereDate('created_at', today())->count();
        $totalDriver = Drivers::count();
        $totalScheduled = Bookings::count();

        return view('dashboard', compact('totalBooking', 'totalDriver', 'totalScheduled'));
    }
}
