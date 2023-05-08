<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoMailController extends Controller
{
    //

    public function index()
    {
      // Mail::to($request->user())
      //   ->cc($moreUsers)
      //   ->bcc($evenMoreUsers)
      //   ->queue(new OrderShipped($order));
      $email = new DemoMail();

      return $email;

      Mail::to('benja.mora.torres@gmail.com')->queue(new DemoMail());

    }
}
