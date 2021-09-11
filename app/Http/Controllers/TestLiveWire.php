<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestLiveWire extends Controller
{
    public function index(){
        return view('dashboard.live');
    }
}
