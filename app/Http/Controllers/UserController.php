<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

/*----------------------------- */
use App\Img_user;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage; 
use Illuminate\Support\Str; 
use File;
use Illuminate\Support\Facades\DB as FacadesDB;
use SebastianBergmann\Environment\Console;
use Yajra\DataTables\DataTables;

/*----------------------------- */
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }


    public function dataTable()
    {
        return DataTables::of(User::select('id', 'name', 'email', 'created_at')->where('role','customer'))
        ->editColumn('created_at', function(User $user){
            return $user->created_at->diffForHumans();
        })
        // ->addColumn('delete', '<form action="{{route(\'user.destroy\', $id)}}" method="POST">
        //                     <input type="hidden" name="_method" value="DELETE">
        //                     <input type="submit" name="submit" value="'.('Eliminar').'" class="btn btn-danger btn-sm"
        //                     onClick="return confirm(\'¿Seguro?\')">
        //                     {{csrf_field()}}
        //                     </form>')
        // ->addColumn('show', '<a href="{{route(\'user.show\', $id)}}" class="btn btn-info btn-sm">' .('Ver'). '</a>')
        // ->addColumn('edit', '<a href="{{route(\'user.edit\', $id)}}" class="btn btn-warning btn-sm">' . ('Editar') . '</a>')

        // ->addColumn('show', 'user.dataTable.show')
        // ->addColumn('edit', 'user.dataTable.edit')
        // ->addColumn('delete', 'user.dataTable.delete')
        ->addColumn('btn', 'users.dataTable.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }


    public function update(User $users,Request $request){
        

        if($request->hasFile('logo')){
            $file= $request->logo;
            $file->move(public_path() . '/img/logoNegocio', $file->getClientOriginalName());

        }

        if(request()->hasFile('imagen_portada')){
            $file2= request()->imagen_portada;
            $file2->move(public_path() . '/img/portadaNegocio', $file2->getClientOriginalName());

        }
        $users->update([
            'name'=>request('nombreNegocio'),
            'descripcion'=>request('descripcion'),
            'ubicacion'=>request('ubicacion'),
            'telefono'=>request('telefono'),
            'categoria'=>request('categoria'),
            'facebook_url'=>request('facebook_url'),
            'logo'=>$file->getClientOriginalName(),
            'imagen_portada'=>$file2->getClientOriginalName(),
            'imagenes_galeria' => date('dmyHi'),
        ]);
 
        /*888888888888888888888888888888888888888888888888888888888888*/
        
        $ci = $request->file('img');
        //return dd($request->file('img'));
        if(!empty($ci)){
             // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas 
            $this->validate($request, [

                
                'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048'

            ]);        
            
            // Recibimos una o varias imĂˇgenes y las guardamos en la carpeta 'uploads'
            
            foreach($request->file('img') as $image)
                {
                    
                    $imagen = $image->getClientOriginalName();
                    $formato = $image->getClientOriginalExtension();
                    $image->move(public_path().'/img/galeria', $imagen);
                    
                    // Guardamos el nombre de la imagen en la tabla 'img_bicicletas'
                    Img_user::create(
                        [
                            'nombre' => $imagen, 
                            'formato' => $formato,
                            'user_id' => $users->id,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ]
                    );

                }         
                
        }
        
        //$imagenes_galeria = $users->imagenesUsers;
     
        /*888888888888888888888888888888888888888888888888888888888888 */
        
        return redirect()->route('homeNegocios',$users)->with('message','Guardado Satisfactoriamente !');
    }

    public function eliminarImagen($id,$uid){
        

        //$bi = $bid;

        // Elimino la imagen de la carpeta 'uploads'
        $imagen = Img_user::select('nombre')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ', ');
        //dd($imgfrm);
        //Storage::delete($imgfrm);
        
        $image_path = public_path()."/img/galeria/$imgfrm";
        if (@getimagesize($image_path)) {
              unlink($image_path);
            }
        

        Img_user::destroy($id);

        // Redireccionamos con mensaje 
        Session::flash('message', 'Imagen Eliminada Satisfactoriamente !');
        //return Redirect::to('admin/bicicletas/actualizar/'.$bi.'');
        return redirect()->route('homeNegocios');
    }
}
