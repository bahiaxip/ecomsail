<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Profile;
use App\Models\ImagesProducts;
use Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
    /*
    public function verification(){        

        return view('verification');
    }
    */
    /*
    public function exportPDF(){
        //$pdf=app('dompdf.wrapper');
        $profiles=Profile::all();

        //$pdf->loadHTML('<h1>Styde.net</h1>');
        $view="livewire.profile";
        $pdf=\PDF::loadView($view,['profiles'=>$profiles]);
        return $pdf->stream('mi-archivo.pdf');
    }
    */
    //subida de imágenes de producto para galería
    public function images(Request $request){
        
        if(isset($_FILES["files"]) && isset($request->product_id)){
            
            $files = $_FILES['files'];
            $prod_id = $request->product_id;            
            
            if(!file_exists('gallery')){
                mkdir('gallery',0777,true);
            }
            if(!file_exists('gallery/'.$prod_id)){
                mkdir('gallery/'.$prod_id,0777,true);
            }
            
            foreach($files['error'] as $key=>$error){
                if($error == UPLOAD_ERR_OK){
                    //nombre aleatorio
                    $random = Str::random(10);
                    //extensión
                    $ext = pathinfo($files['name'][$key],PATHINFO_EXTENSION);
                    move_uploaded_file($files['tmp_name'][$key], 'gallery/'.$prod_id.'/'.$random.'.'.$ext);
                    
                    ImagesProducts::create([
                        'path_tag' => 'gallery/'.$prod_id.'/',
                        'file_name' => $files['name'][$key],
                        'image' => $random.'.'.$ext,
                        'file_ext' => $ext,
                        'product_id' => $prod_id
                    ]);
                    
                }
            }
            return ['status' => 200,'message' => 'Imagen subida correctamente'];
        }else{
            return ['status' => 200,'message' => 'No se ha subido la imagen'];
        }
    }
}