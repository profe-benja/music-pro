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
    public $asunto;
    public $contenido;
    public $contenido_html;

    public function __construct($asunto = '', $contenido = '', $contenido_html = '')
    {
      $this->asunto = 'Correo de prueba | ' . $asunto;
      $this->contenido = $contenido;
      $this->contenido_html = $contenido_html;
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
          subject: $this->asunto,
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
