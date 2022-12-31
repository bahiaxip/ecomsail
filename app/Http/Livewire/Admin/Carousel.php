<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Carousel as Carous;
use Livewire\WithFileUploads;
use Auth, Image;
class Carousel extends Component
{
    use WithFileUploads;

    public $filter_type;
    public $slider_id;
    public $iteration;
    public $main_title;
    public $second_title;
    public $image;
    public $aux_image;
    public $duplicate_aux_image;
    public $aux_path_tag;
    public $aux_thumb;
    public $status=0;
    public $sliderIdTmp;
    public $total_sliders;
    public $typealert;
    public $role_user;

    //personalizamos el nombre del atributo de los mensajes de error
    protected $validationAttributes = [
        'main_title' => 'título',
        'second_title' => 'título adicional',
        'image' => 'imagen'
    ];

    public function mount($filter_type){        
        $this->filter_type = $filter_type;
        $this->set_total_sliders();
        $this->role_user = Auth::user()->role;
    }
    //establecemos el total de sliders con status público (status = 1)
    public function set_total_sliders(){
        $this->total_sliders = Carous::where('status',1)->count();       
    }

    public function store(){
        $validated = $this->validate([
            'main_title' => 'required',
            'second_title' => 'required',
            'image' => 'required|image',
            'aux_image' => 'nullable|image',
            'status' => 'required'
        ]);
        
        //comprobar si existe imagen y eliminar la anterior            
        $image_name = $this->image->getClientOriginalName();
        $ext = $this->image->getClientOriginalExtension();
        //almacenamos con el método store que genera un nombre de archivo aleatorio
        $path_date= date('Y-m-d');
        $image = $this->image->store('public/carousel/');
        //eliminamos el directorio public
        $imagelesspublic = substr($image,7);

        $path_tag = '/storage/';
        $thumb = $imagelesspublic;
        $count = Carous::where('status',1)->count();
        $position = -1;
        if($this->status != 0){
            $position = $count;
        }
        
        $slider = Carous::create([
            'title' => $validated['main_title'],
            'text' => $validated['second_title'],  
            'path_tag' => $path_tag,
            'file_name' => $image_name,
            'file_ext' => $ext,
            'image' =>   $imagelesspublic,
            'thumb' => $thumb,
            'status' => $validated['status'],
            'position' => $position,
            'user_id' => Auth::id()
        ]);
//Revisar para optimizar, ya que se puede realizar la creación sin 
//actualizar, a diferencia del método update().
        //imagen auxiliar (recomendable para modo pantalla completa)
        //si se ha seleccionado una imagen se actualiza, si no, se mantiene,
        //de la misma forma que la imagen principal
        if($validated['aux_image']  !== null){
            $aux_image_name = $this->aux_image->getClientOriginalName();
            $aux_ext = $this->aux_image->getClientOriginalExtension();
            //almacenamos con el método store que genera un nombre de archivo aleatorio                
            $aux_image = $this->aux_image->store('public/carousel');
            //eliminamos el directorio public
            $aux_imagelesspublic = substr($aux_image,7);            
            //$aux_thumb = $aux_imagelesspublic;
            //redimensionamos imagen para crear un thumbnail
            $array_aux_thumb = $this->set_thumb_image(public_path('/storage/'.$aux_imagelesspublic),$aux_ext);
            $aux_path_tag = $array_aux_thumb['path_tag'];
            $aux_thumb = $array_aux_thumb['thumb'];
            $slider->update([
                'aux_path_tag' => $aux_path_tag,
                'aux_file_name' => $aux_image_name,
                'aux_ext' => $aux_ext,
                'aux_image' => $aux_imagelesspublic,
                'aux_thumb' => $aux_thumb
            ]);
        }
        //actualizamos total de sliders
        $this->set_total_sliders();
        $this->typealert="success";
        session()->flash('message','Imagen añadida correctamente');
        $this->clear2();
        $this->emit('addSlider');
    }

    public function edit($id){
        $slider = Carous::findOrFail($id);
        $this->slider_id = $id;
        $this->main_title = $slider->title;
        $this->second_title = $slider->text;
        $this->status = $slider->status;
        $this->aux_path_tag = $slider->aux_path_tag;        
        //$this->aux_image = $slider->aux_image;
        $this->duplicate_aux_image = $slider->aux_image;
        $this->aux_thumb = $slider->aux_thumb;
    }

    public function update(){
        $validated = $this->validate([
            'main_title' => 'required',
            'second_title' => 'required',
            'image' => 'nullable|image',
            'aux_image' => 'nullable|image',
            'status' => 'required'
        ]);
        $slider = Carous::findOrFail($this->slider_id);
        $icon;
        $icon_name;
        $thumb;
        $iconlesspublic;
        $icon_name;

        $position = -1;
        //si estatus es borrador y estaba anteriormente en estado público (con una 
        //posición establecida), es necesario actualizar todas las posiciones, 
        //manteniendo el mismo orden que tenían
        if($this->status == 0 && $slider->position != -1){
            //actualizamos la posición del slider seleccionado para que no cuente
            //en el ordernamiento de las posiciones
            $slider->update(['status' => 0]);
            $this->set_positions();
        }
        if($this->status != 0){
            //si proviene de borrador, añadimos al final
            if($slider->position == -1){
                $count = Carous::where('status',1)->count();
                $position = $count;
            //si ya era público, mantenemos la misma posición
            }else{
                $position = $slider->position;    
            }
            
        }
        //si el campo de imagen está vacío no se actualiza la imagen,
        //manteniendo la que ya tiene.
        if($validated['image']  === null){
            $slider->update([
                'title' => $validated['main_title'],
                'text' => $validated['second_title'],
                'status' => $validated['status'],
                'position' => $position,            
            ]);
        }else{
    //falta comprobar si existe imagen y eliminar la anterior                 
                $image_name = $this->image->getClientOriginalName();
                $ext = $this->image->getClientOriginalExtension();
                //almacenamos con el método store que genera un nombre de archivo aleatorio
                $path_date= date('Y-m-d');
                $image = $this->image->store('public/carousel/');
                //eliminamos el directorio public
                $imagelesspublic = substr($image,7);

                $path_tag = '/storage/';
                $thumb = $imagelesspublic;
            
            $slider->update([
                'title' => $validated['main_title'],
                'text' => $validated['second_title'],  
                'path_tag' => $path_tag,
                'file_name' => $image_name,
                'file_ext' => $ext,
                'image' =>   $imagelesspublic,
                'thumb' => $thumb,
                'status' => $validated['status'],
                'position' => $position,     
            ]);
        }
        //imagen auxiliar (recomendable para modo pantalla completa)
        //si se ha seleccionado una imagen se actualiza, si no, se mantiene,
        //de la misma forma que la imagen principal
        if($validated['aux_image']  !== null){
            $aux_image_name = $this->aux_image->getClientOriginalName();
            $aux_ext = $this->aux_image->getClientOriginalExtension();
            //almacenamos con el método store que genera un nombre de archivo aleatorio                
            $aux_image = $this->aux_image->store('public/carousel');
            //eliminamos el directorio public
            $aux_imagelesspublic = substr($aux_image,7);            
            //$aux_thumb = $aux_imagelesspublic;
            //redimensionamos imagen para crear un thumbnail
            $array_aux_thumb = $this->set_thumb_image(public_path('/storage/'.$aux_imagelesspublic),$aux_ext);
            $aux_path_tag = $array_aux_thumb['path_tag'];
            $aux_thumb = $array_aux_thumb['thumb'];
            $slider->update([
                'aux_path_tag' => $aux_path_tag,
                'aux_file_name' => $aux_image_name,
                'aux_ext' => $aux_ext,
                'aux_image' => $aux_imagelesspublic,
                'aux_thumb' => $aux_thumb
            ]);
        }
        //actualizamos total de sliders
        $this->set_total_sliders();
        $this->typealert="success";
        session()->flash('message','Carousel actualizado correctamente');
        $this->clear2();
        $this->emit('editSlider');

    }
    //intercambiar posición del slider -> arriba(up) o abajo(down)
    public function set_position($id,$type){        
        //$position representa la posición del slider seleccionado
        if($id != null && $type != null){
            $selected_slider = Carous::findOrFail($id);
            $position = $selected_slider->position;

            if($type == 'up' && $position != 0){                
                $new_position = $selected_slider->position - 1;
                $slider_prev = Carous::where('status',1)->where('position',$new_position)->first();                
                $selected_slider->update(['position' => $new_position]);
                $slider_prev->update(['position' => $position]);
            }elseif($type == 'down' && $position != $this->total_sliders){
                $new_position = $selected_slider->position + 1;
                $slider_next = Carous::where('status',1)->where('position',$new_position)->first();
                if($slider_next){
                    $selected_slider->update(['position' => $new_position]);
                    $slider_next->update(['position' => $position]);    
                }
            }
        }
    }
    public function set_positions(){
        $carousel = Carous::where('status',1)->orderBy('position')->get();
        foreach($carousel as $key => $c){
            $c->update([
                'position' => $key
            ]);
        }
    }
    public function clear(){
        $this->main_title = null;
        $this->second_title = null;
        $this->image = null;
        $this->status = 0;
        $this->aux_image = null;
        $this->iteration = rand();

    }
    public function clear2(){
        $this->clear();
        //resetea todos los mensajes de error
        $this->resetValidation();

    }
    public function saveSliderId($id){
        $this->sliderIdTmp = $id;
    }
    public function clearSliderId(){
        $this->sliderIdTmp = null;
    }
    public function delete(){
        $slider = Carous::findOrFail($this->sliderIdTmp);
        $slider->delete();
        //actualizamos posiciones
        $this->set_positions();
        //actualizamos total de sliders
        $this->set_total_sliders();
        $this->typealert='success';
        session()->flash('message', "Imagen eliminada correctamente");

        //session()->flash('typealert' , 'success');
        $this->clear2();
        $this->emit('confirmDel');

    }
    public function set_type_query(){
        $sliders;
        if($this->filter_type == 3){
            $sliders = Carous::orderBy('position')->get();
        }else{
            $sliders = Carous::where('status',$this->filter_type)->orderBy('position')->get();
        }
        return $sliders;
    }
    public function render()
    {    
        $sliders = $this->set_type_query();
        $data = ['sliders' => $sliders];
        return view('livewire.admin.carousel.carousel',$data);
    }

    public function set_thumb_image($image,$ext){
        $path_tag[0] = '/storage/';
        $path_tag[1] = 'carousel/';
        $only_image = str_replace(public_path().$path_tag[0].$path_tag[1],"",$image);
        
        $picture = $image;
        //establecemos máximo de anchura o altura
        $max = 75;
        //creamos objeto imagen desde una imagen desde el
        //sistema de archivo, no desde el dominio
        if($ext == 'jpg' || $ext == 'jpeg')
            $src_img = ImagecreateFromJpeg($picture);
        elseif($ext == 'png')
            $src_img = ImagecreateFromPng($picture);
        else
            $src_img = ImagecreateFromGif($picture);
        //obtenemos altura y anchura
        $oh = imagesy($src_img); //original height
        $ow = imagesx($src_img); //original width
        //establecemos una altura y anchura por defecto
        $new_h = $oh;
        $new_w = $ow;
        //modificamos la anchura y la altura en caso de que alguna
        //de ellas sobrepase el máximo obteniendo la proporción y 
        //comprobando si es más alta que ancha o viceversas
        if($oh > $max || $ow > $max){
            $r = $oh/$ow;
            $new_h = ($oh > $ow) ? $max : $max*$r;
            $new_w = $new_h/$r;
        }
        //creamos un recurso de imagen en blanco para rellenar
        $dst_img = ImageCreateTrueColor($new_w,$new_h);

        //establecemos la redimensión de la imagen en el recurso de imagen
        if($ext == 'png'){
            imagealphablending($dst_img, false);
            imagesavealpha($dst_img,true);
            imagecolortransparent($dst_img, imagecolorallocatealpha($dst_img, 255, 255, 255, 127));
        }
        ImageCopyResized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,ImageSX($src_img),ImageSY($src_img));
        //exportamos la imagen
        $new_thumb = $path_tag[1].'th_'.$only_image;
        $list = ['path_tag' => $path_tag[0],'thumb' => $new_thumb];
        if($ext == 'png'){
            imagepng($dst_img,public_path($path_tag[0].$new_thumb));
        }elseif($ext == 'gif'){
            imagegif($dst_img,public_path($path_tag[0].$new_thumb));
        }else{
            imagejpeg($dst_img,public_path($path_tag[0].$new_thumb));
        }
        return $list;
        
    }
}
