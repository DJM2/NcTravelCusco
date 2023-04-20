<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function getMail()
    {
        $datos = request()->all();
        Mail::send("emails.contacto", $datos, function ($message) use ($datos) {
            $message->from($datos['email'], $datos['nombre'])
                ->to('info@pachamamaspirit.com', 'DJM2')
                ->subject('Envio de formulario desde la página web.');
        });
        session()->flash('status', 'Mensaje enviado exitosamente!');
        return back();
    }
    public function getMailEn()
    {
        $datos = request()->all();
        Mail::send("emails.contacto", $datos, function ($message) use ($datos) {
            $message->from($datos['email'], $datos['nombre'])
                ->to('info@pachamamaspirit.com', 'DJM2')
                ->subject('Envio de formulario desde la página web.');
        });
        session()->flash('status', 'Message sent successfully!');
        return back();
    }
}
