<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'names.first_name' => ['required', 'string', 'max:100'],
            'names.last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:190'],
            'subject' => ['required', 'string', 'max:190'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        try {
            Mail::to(config('mail.admin_address'))->send(new ContactMessageMail(
                name: trim($data['names']['first_name'].' '.$data['names']['last_name']),
                email: $data['email'],
                contactSubject: $data['subject'],
                messageBody: $data['message'],
            ));
        } catch (\Throwable $e) {
            Log::error('No se pudo enviar el mensaje de contacto: '.$e->getMessage());
        }

        return back()->with('status', 'Gracias por tu mensaje, te responderemos lo antes posible.');
    }
}
