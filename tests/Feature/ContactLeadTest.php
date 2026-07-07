<?php

use App\Mail\ContactLeadSubmitted;
use Illuminate\Support\Facades\Mail;

test('the landing page returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('Productora Audiovisual Corporativa y de Marca');
});

test('the contact form validates required fields', function () {
    $response = $this->post(route('contact.store'), []);

    $response->assertSessionHasErrors([
        'nombre_completo',
        'empresa',
        'correo_corporativo',
        'telefono',
        'proyecto',
    ]);
});

test('the contact form sends a lead notification email', function () {
    Mail::fake();

    config()->set('imb.contact_form_to', 'leads@example.com');

    $payload = [
        'nombre_completo' => 'Camilo Ruiz',
        'empresa' => 'Inmedia Brand',
        'correo_corporativo' => 'camilo@example.com',
        'telefono' => '+57 300 111 2233',
        'proyecto' => 'Necesitamos un video corporativo para comunicacion interna.',
    ];

    $response = $this->post(route('contact.store'), $payload);

    $response
        ->assertSessionHasNoErrors()
        ->assertSessionHas('contact_success');

    Mail::assertSent(ContactLeadSubmitted::class, function (ContactLeadSubmitted $mail) use ($payload) {
        return $mail->lead['correo_corporativo'] === $payload['correo_corporativo']
            && $mail->lead['nombre_completo'] === $payload['nombre_completo'];
    });
});
