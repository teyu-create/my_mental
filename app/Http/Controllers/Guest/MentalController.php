<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentalController extends Controller
{
    //
    public function add()
    {
        return view('guest.mental.create');
    }

    public function create(Request $request)
    {
        return redirect()->route('mental.create');
    }

    public function index()
    {
        return view('guest.mental.list');
    }
}
