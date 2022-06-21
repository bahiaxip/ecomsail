<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Settings extends Component
{
    public $typealert;

    public function save_settings($data){
        
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
//a la espera de otra solución

        sleep(3);
        $this->typealert = 'success';
        session()->flash('message','La configuración ha sido actualizada');

        //return back()->with('message','Las configuraciones han sido guardadas con éxito')->with('typealert','success');
    }
    public function render()
    {
        return view('livewire.admin.settings.settings');
    }
}
