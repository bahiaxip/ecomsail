<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Settings extends Component
{
    public $typealert = 'success';
    //revisar en servidor si funciona el loading...
    public $switch_loading = false;
    
    public function mount($message=null){
        session()->flash('message',$message);
    }
     public function dehydrate()
    {
        /*
        if(session('message'))
            dd(session()->get('message'));
        */
    }

    public function save_settings($data){
//posible validación

        
        $this->switch_loading = true;
        if(!file_exists(config_path().'/cms.php')):
            fopen(config_path().'/ecomsail.php','w');
            //return config_path();
        endif;

        $file = fopen(config_path().'/ecomsail.php','w');
        fwrite($file,'<?php '.PHP_EOL);
        fwrite($file,'return ['.PHP_EOL);
        unset($data['_token']);
        foreach($data as $key => $value):            
            if(is_null($value)):
                fwrite($file,'\''.$key.'\' => \'\',' .PHP_EOL);
            else:
                fwrite($file,'\''.$key.'\' => \''.$value.'\',' .PHP_EOL);
            endif;
        endforeach;
        fwrite($file,']'.PHP_EOL);
        fwrite($file,'?>'.PHP_EOL);
        fclose($file);
//añadimos sleep() para que se muestren los datos actualizados al recargar la página,
//ya que es necesario generar un archivo en PHP y generamos redirect() en lugar de session
//a la espera de otra solución

        sleep(5);
        $this->typealert = 'success';
        return redirect()->route('list_settings',['message' => 'La configuración ha sido actualizada']);
        
        //session()->flash('message','La configuración ha sido actualizada');


        //return back()->with('message','Las configuraciones han sido guardadas con éxito')->with('typealert','success');
    }
    public function render()
    {
        $this->switch_loading = false;
        return view('livewire.admin.settings.settings');
    }
}
