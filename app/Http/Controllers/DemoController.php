<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function siswa()
    {
        return view('demo.siswa');
    }

    public function guru()
    {
        return view('demo.guru');
    }
}
