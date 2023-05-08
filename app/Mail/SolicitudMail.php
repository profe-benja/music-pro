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

class SolicitudMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $a;
    public $formulario;

    public function __construct($id)
    {
      $a = Alumno::findOrFail($id);
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
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
          subject: 'Documentos solicitados para BENEFICIOS ESTATALES 2023',
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
            view: 'mail.solicitud',
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
