<?php

namespace App\Http\Controllers;

use App\Models\Tenda;
use Illuminate\Http\Request;

class homepageController extends Controller
{
     public function index()
    {
        $tenda = Tenda::latest()->take(3)->get();
        return view('homepage', compact('tenda'));
    }

}
