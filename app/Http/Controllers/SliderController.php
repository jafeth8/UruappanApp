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
           //'estado'=>$request->get('estado'),
           'orden'=>$request->get('orden')  
        ]);

        return redirect()->route('home')->with('slider_added','Un nuevo elemento ha sido creado.');
    }

    public function showEdit(Slider $slider){
        //return $slider;
        return view('editSlider',['slider'=>$slider]);
    }

    public function editSlider(Slider $slider,Request $request){
        
        if($request->hasFile('imagen')){
            $file= $request->imagen;
            $file->move(public_path() . '/img/slider', $file->getClientOriginalName());

            $slider->update([
                'titulo'=>$request->get('titulo'),
                'descripcion'=>$request->get('descripcion'),
                'url_image'=>$file->getClientOriginalName(),
                'texto_boton'=>$request->get('texto_boton'),
                'url_boton'=>$request->get('url_boton'),
                'estilo_boton'=>$request->get('estilo'),
                //'estado'=>$request->get('estado'),
                'orden'=>$request->get('orden')  
             ]);

        }else{
            $slider->update([
                'titulo'=>$request->get('titulo'),
                'descripcion'=>$request->get('descripcion'),
                'texto_boton'=>$request->get('texto_boton'),
                'url_boton'=>$request->get('url_boton'),
                'estilo_boton'=>$request->get('estilo'),
                //'estado'=>$request->get('estado'),
                'orden'=>$request->get('orden')  
             ]);
        }
        //$imagen=$file->getClientOriginalName();
        $noticia=$request->get('titulo');
      
        
        return redirect()->route('home')->with("updated_slider","$noticia se ha actualizado ");
    }

    public function deleteSlider($id){
                //$bi = $bid;

        // Elimino la imagen de la carpeta 'galeria'
        $imagen = Slider::select('url_image')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('url_image', ', ');
        //dd($imgfrm);
        //Storage::delete($imgfrm);
        
        $image_path = public_path()."/img/slider/$imgfrm";
        if (@getimagesize($image_path)) {
              unlink($image_path);
            }
        

        Slider::destroy($id);

        // Redireccionamos con mensaje 
        
        //return Redirect::to('admin/bicicletas/actualizar/'.$bi.'');
        return redirect()->route('home')->with("delete_slider"," la noticia se ha eliminado ");
        return $id;

    }
}
