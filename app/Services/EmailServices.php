<?php

namespace App\Services;

use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class EmailServices
{
  protected $subject;
  protected $email;
  protected $content;
  protected $content_html;

  public function __construct($subject, $email, $content, $content_html) {
    $this->subject = $subject;
    $this->email = $email;
    $this->content = $content;
    $this->content_html = $content_html;
  }

  public function send() {
    try {
      $email = new DemoMail($this->subject, $this->content, $this->content_html);
      Mail::to($this->email)->queue($email);

      $response = [
        'error' => false, // 'error' => 'false
        'message' => 'Envio de correcto exitosamente',
      ];

      return $response;
    } catch (\Throwable $th) {
      $response = [
        'error' => true, // 'error' => 'false
        'message' => 'Error. Algo inesperado ha ocurrido',
      ];

      return $response;
    }
  }
}
