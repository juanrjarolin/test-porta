<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailQueue extends Mailable
{
    use Queueable, SerializesModels;

    protected $cantidadUsuarios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cantidadUsuarios)
    {
        $this->cantidadUsuarios = $cantidadUsuarios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('juanjarolin@viotitsa.com.py', 'Juan Jarolin')
            ->subject('Reporte diario de usuarios')
            ->view('layouts.email')
            ->with([
                'cantidadUsuarios' => $this->cantidadUsuarios
            ]);
    }
}
