<?php

namespace App\Http\Controllers;

use App\Slider;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$Sliders=Slider::get();
        return view('dashboard',['sliders'=>Slider::get()]);
    }

    public function indexNegocios()
    {
        $id=auth()->id();
        $imagenes_galeria = User::find($id)->imagenesUsers;
        return view('dashboard_negocios',['users'=>User::find($id),'imagenes_galeria'=>$imagenes_galeria]);
    }
    
    public function showUsers(){
        $user = User::all();
        $names = $user->sortBy('name')->pluck('name')->unique();
        $emails = $user->sortBy('email')->pluck('email')->unique();
        return view('usuarios',compact('names', 'emails'));
    }

    public function redireccionar(){
        if (auth()->user()->role=='admin') {
            return redirect()->route('home');
        }

        return redirect()->route('homeNegocios');
    }
}
