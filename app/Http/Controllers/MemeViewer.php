<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;

class MemeViewer extends Controller
{
    public function dashboard(){
        $memes = Meme::latest()->get(); 

        return view('layouts.dashboard', compact('memes'));
    }
}
