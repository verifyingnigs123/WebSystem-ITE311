<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('page/home'); // Homepage
    }

    public function about()
    {
        return view('page/about'); // About page
    }

    public function contact() // Contact page
    {
        return view('page/contact');
    }

    
}   