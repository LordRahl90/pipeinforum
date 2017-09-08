<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteMonitor extends Controller
{
    public function index(){
        return view('forum.index');
    }

    public function loadFullPost(){
        return view('forum.story');
    }
}
