<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Blogsters!';
        return view('pages.index', compact('title'));
    }
    public function about(){
        return view('pages.about');
    }
}
