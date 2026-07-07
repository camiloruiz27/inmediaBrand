<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactLeadRequest;
use App\Mail\ContactLeadSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactLeadController extends Controller
{
    public function store(StoreContactLeadRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        Mail::to(config('imb.contact_form_to'))->send(new ContactLeadSubmitted($payload));

        return back()
            ->with('contact_success', 'Gracias. Tu solicitud fue enviada y pronto recibirás respuesta.')
            ->withFragment('contacto');
    }
}
