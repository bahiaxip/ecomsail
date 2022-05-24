<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Profile;
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
                    move_uploaded_file($files['tmp_name'][$key], 'gallery/'.$prod_id.'/'.$files['name'][$key]);
                    
                }
            }
            return ['status' => 200,'message' => 'Imagen subida correctamente'];
        }else{
            return ['status' => 200,'message' => 'No se ha subido la imagen'];
        }
    }
}