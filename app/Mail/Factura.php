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

    public $productos_factura;
    public $destino;

    public function __construct($productos_factura,$destino)
    {
        $this->productos_factura=$productos_factura;
        $this->destino=$destino;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('livewire.products.factura')
            //ecomsail en lugar de sistemadeventas
                    ->from("bahiaxip@hotmail.com")
                    ->subject("Nuevo mensaje de Ecomsail ");
    }
}
