<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function in() {
        return view('home/absence_in');
    }

    public function out() {
        return view('home/absence_out');
    }

    public function absenceIn() {
        
    }

    public function absenceOut() {
        
    }
}
