<?php

namespace App\Http\Controllers;

use App\Slider;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        
        $datosUser = User::inRandomOrder()->take(8)->where('role','customer')->where('estado',1)->get();
        return view('index',['sliders'=>Slider::get(),'users'=>$datosUser]);
    }
}
