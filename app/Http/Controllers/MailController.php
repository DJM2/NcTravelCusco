<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Mail\ContactFormMail;

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
    public function enviarFormulario(Request $request)
{
    // Validar los datos del formulario si es necesario
    $request->validate([
        'nombre' => 'required',
        'email' => 'required|email',
        'telefono' => 'required',
        'fecha' => 'required',
        'nacionalidad' => 'required',
        'interes' => 'required',
        'mensaje' => 'required'
    ]);

    // Obtener los datos del formulario
    $formData = $request->only(['nombre', 'email', 'telefono', 'fecha', 'nacionalidad', 'interes', 'mensaje']);

    // Enviar el correo electrónico
    Mail::to('miranda_djm2@hotmail.com')->send((new ContactFormMail($formData))->build());


    // Redireccionar o mostrar un mensaje de éxito
    return redirect()->back()->with('success', 'El formulario ha sido enviado correctamente.');
}

}