<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $telefono;
    public $fecha;
    public $nacionalidad;
    public $interes;
    public $mensaje;
    // Añade más propiedades para los campos adicionales del formulario

    /**
     * Create a new message instance.
     *
     * @param  array  $formData
     * @return void
     */
    public function __construct(array $formData)
    {
        $this->nombre = $formData['nombre'];
        $this->email = $formData['email'];
        $this->telefono = $formData['telefono'];
        $this->fecha = $formData['fecha'];
        $this->nacionalidad = $formData['nacionalidad'];
        $this->interes = $formData['interes'];
        $this->mensaje = $formData['mensaje'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, $this->nombre)
            ->view('emails.formularioPacotes')
            ->subject('Mensaje peticion de informacion')
            ->with([
                'nombre' => $this->nombre,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'fecha' => $this->fecha,
                'nacionalidad' => $this->nacionalidad,
                'interes' => $this->interes,
                'mensaje' => $this->mensaje,
            ]);
    }
}