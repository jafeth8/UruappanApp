<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        
        return view('index',['sliders'=>Slider::get()]);
    }
}
