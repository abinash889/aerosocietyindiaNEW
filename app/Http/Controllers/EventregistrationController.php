<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventregistrationController extends Controller
{
    public function eventregistration()
    {
        return view('frontend.eventregistration');
    }
}
