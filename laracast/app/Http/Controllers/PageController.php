<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function  welcome(){

        return view('welcome')->with('title', 'Welcome to The Laracast Blog');
    }
}
