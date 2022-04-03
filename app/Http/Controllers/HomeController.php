<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('welcome');
    }

    public function agenda()
    {
        return view('agenda');
    }

    public function artikel()
    {
        return view('artikel');
    }

    public function kontak()
    {
        return view('kontak');
    }
}
