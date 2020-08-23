<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function show(){
        return view('addSlider2');
    }

    public function create(Request $request){
        
        if($request->hasFile('imagen')){
            $file= $request->imagen;
            $file->move(public_path() . '/img/slider', $file->getClientOriginalName());

        }
        //$imagen=$file->getClientOriginalName();
        
         Slider::create([
           'titulo'=>$request->get('titulo'),
           'descripcion'=>$request->get('descripcion'),
           'url_image'=>$file->getClientOriginalName(),
           'texto_boton'=>$request->get('texto_boton'),
           'url_boton'=>$request->get('url_boton'),
           'estilo_boton'=>$request->get('estilo'),
           'estado'=>$request->get('estado'),
           'orden'=>$request->get('orden')  
        ]);

        return redirect()->route('home');
    }

    public function showEdit(Slider $slider){
        //return $slider;
        return view('editSlider',['slider'=>$slider]);
    }

    public function editSlider(Slider $slider,Request $request){
        
        if($request->hasFile('imagen')){
            $file= $request->imagen;
            $file->move(public_path() . '/img/slider', $file->getClientOriginalName());

        }
        //$imagen=$file->getClientOriginalName();
        
         $slider->update([
           'titulo'=>$request->get('titulo'),
           'descripcion'=>$request->get('descripcion'),
           'url_image'=>$file->getClientOriginalName(),
           'texto_boton'=>$request->get('texto_boton'),
           'url_boton'=>$request->get('url_boton'),
           'estilo_boton'=>$request->get('estilo'),
           'estado'=>$request->get('estado'),
           'orden'=>$request->get('orden')  
        ]);

        return redirect()->route('home');
    }
}
