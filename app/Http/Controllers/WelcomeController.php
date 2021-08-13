<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $crops = Crop::where('status','VERIFIED')->take(4)->latest()->get();
        return view('welcome',compact('crops'));
    }
}
