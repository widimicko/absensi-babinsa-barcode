<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function masuk() {
        return view('home/absen_masuk');
    }

    public function pulang() {
        return view('home/absen_pulang');
    }
}
