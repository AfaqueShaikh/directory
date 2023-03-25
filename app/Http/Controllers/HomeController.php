<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('pages.home');
    }


}
