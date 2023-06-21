<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\HtmlString;

class ReporteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reporte;

    public function __construct($reporte)
    {
        $this->reporte = $reporte;
    }

    public function build()
    {
        return $this->view('reportes.show', ['reporte' => $this->reporte])
            ->subject('Reporte del Tour a Peru')
            ->from('info@nctravelcusco.com', 'Nc Travel Cusco');
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Reporte Nc Travel Cusco'
        );
    }

    public function attachments()
    {
        return [];
    }
}