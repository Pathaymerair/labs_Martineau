<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use ImageIntervention;

class TitleController extends Controller
{
    public function index(){
        $titles = Title::all();
        return view('welcome', compact('titles'));
    }

    public function indexBlog(){
        $titles = Title::all();
        return view('blog', compact('titles'));
    }
    public function indexServices(){
        $titles = Title::all();
        return view('services', compact('titles'));
    }
    public function indexContact(){
        $titles = Title::all();
        return view('contact', compact('titles'));
    }
}
