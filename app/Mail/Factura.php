<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Factura extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $shared_data;
    public $view;
    public $file;
    public $order_name;
    public $name;
    public $date;

    public function __construct($shared_data,$view,$file,$order_name,$name)
    {        
        $this->shared_data=$shared_data;
        $this->view=$view;
        $this->file = $file;
        $this->order_name = $order_name;
        $this->name = $name;
        $this->date = date('Y-m-d');
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $mail = $this->view('livewire.products.'.$this->view)
            //ecomsail en lugar de sistemadeventas
                    ->from("bahiaxip@hotmail.com")
                    ->subject("Pedido realizado")
                    ->attach(public_path($this->file),
                        [
                            'as'=>$this->file,
                            'mime'=>'application/pdf'
                        ]);                    
        return $mail;
    }
}
