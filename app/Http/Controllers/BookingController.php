<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('room')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('cabinet', compact('bookings'));
    }
}
