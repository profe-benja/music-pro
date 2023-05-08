<?php

namespace App\Mail;

use App\Models\Alumno;
use App\Services\FormularioSocioeconomico;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $a;
    public $formulario;

    public function __construct()
    {
      $a = Alumno::findOrFail(39);
      $formulario = (new FormularioSocioeconomico())->call();

      $n = 1;
      foreach ($a->solicitudes as $solKey => $solicitud) {
        foreach ($solicitud->documentos as $dKey => $documento) {
          foreach ($formulario as $fKey => $form) {
            if ($fKey == $documento->documento_code ) {
              $formulario[$documento->documento_code]['values'][$documento->documento_id]['status'] = true;
              $formulario[$documento->documento_code]['values'][$documento->documento_id]['solicitud'] = $n;
              $formulario[$documento->documento_code]['values'][$documento->documento_id]['fecha'] = $solicitud->getFechaEntrega()->getDate();
              $formulario[$documento->documento_code]['values'][$documento->documento_id]['estado'] = $documento->estado;
            }
          }
        }

        $n++;
      }

      $this->a = $a;
      $this->formulario = $formulario;
      // $pdf = Pdf::loadView('pdf.documento_alumno_pdf',compact('payload','a','formulario'));
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
          // from: new Address('benja.mora.torres@gmail.com', 'Jeffrey Way'),
          // replyTo: [
          //     new Address('bej.mora@profesor.duoc.cl', 'Taylor Otwell'),
          // ],
          subject: 'Notificación de recepción',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.demo',
            // view: 'pdf.documento_alumno_pdf',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
