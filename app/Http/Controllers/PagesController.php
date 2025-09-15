<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view ('pages.index') ;
    }

    public function breakingnews() {
        return view ('pages.breakingnews.breakingnews') ;
    }

    public function sport() {
        return view ('pages.sport.sport') ;
    }

    public function trending() {
        return view ('pages.trending.trending') ;
    }

    public function ai() {
        return view ('pages.ai.ai') ;
    }

    public function amusing() {
        return view ('pages.amusing.amusing') ;
    }

     public function imagenews() {
        return view ('pages.image-news') ;
    }
    
}
