<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class MailController extends Controller
{

    public function getMail()
    {
        $datos = request()->all();
        $remitente = $datos['email'];

        Mail::send("emails.contacto", $datos, function ($message) use ($remitente, $datos) {
            $message->from($remitente, $datos['nombre'])
                ->to('niko@nctravelcusco.com', 'Trilha Inca Cuzco')
                ->subject('Formulario desde Trilha Inca Cuzco web.');
        });

        session()->flash('status', 'Mensagem enviada com sucesso!');
        return back();
    }

    /* public function getMail()
    {
        $datos = request()->all();
        Mail::send("emails.contacto", $datos, function ($message) use ($datos) {
            $message->from($datos['email'], $datos['nombre'])
                ->to('mirandadjmdjm@gmail.com', 'Trilha Inca Cuzco')
                ->subject('Formulario desde Trilha Inca Cuzco web.');
        });
        session()->flash('status', 'Mensagem enviada com sucesso!');
        return back();
    } */
}