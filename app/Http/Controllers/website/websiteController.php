<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;

class websiteController extends Controller
{
    public function HomePage()
    {
        return view('website.welcome');
    }
    public function AboutPage()
    {
        return view('website.about');
    }
    
    public function CoursePage()
    {
        $query = course::get();
        return view('website.course')->with('courses', $query);
    }
}
