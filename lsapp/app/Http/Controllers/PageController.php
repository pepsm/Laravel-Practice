<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
         $title = 'Welcome page';
        return view('pages.index')->with('title', $title);
    }
    public function about()
    {
        $title = 'About';
        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Programming', 'SEO', 'Web Design']
        );
        return view('pages.services')->with($data);
    }
}
