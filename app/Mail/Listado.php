<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Listado extends Mailable
{
    use Queueable, SerializesModels;

    //array datos adjuntos (pdf y/o excel)
    public $attach;
    //datos usuarios (eloquent)
    public $username;
    public $listname;
    public $file_name;

    public function __construct($attach,$username,$listname,$file_name)
    {
        $this->attach=$attach;
        $this->username=$username;
        $this->listname = $listname;
        $this->file_name = $file_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $path_date=date('Y-m-d');
        $mail=$this->from("proyecto@gmail.com")
            ->view('livewire.admin.'.$this->listname.'.template_email')
            ->with("username",$this->username)->with('listname',$this->listname);        
            if(isset($this->attach["pdf"]) && $this->attach["pdf"]=="1"){
                $mail->attach(public_path('listado_'.$path_date.'.pdf'),[
                    'as'=>'listado'.$path_date.'.pdf',
                    'mime'=>'application/pdf'
                ]);
            }
            if(isset($this->attach["excel"]) && $this->attach["excel"]=="1"){
                $mail->attach(public_path($this->file_name));    
            }
                
        return $mail;
    }
}
