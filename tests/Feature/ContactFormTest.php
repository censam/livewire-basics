<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use App\Mail\ContactFormMailable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_dashboard_page_contains_contact_form_livewire_component()
    {
        $this->get('/dashboard')
            ->assertSeeLivewire('contact-form');
    }



    public function contact_form_sends_out_an_email()
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('name','Sampath')
            ->set('email','sampath@sampath.com')
            ->set('phone','1234567')
            ->set('message','This is my Message')
            ->call('submitFom')
            ->assertSee('Mail Sent Successfully');

        Mail::assertSent(function (ContactFormMailable $mail){
            $mail->build();

            return $mail->hasTo('sampath@sampath.com') &&
                    $mail->hasFrom('wgadhjgasgdg@asd.com') &&
                    $mail->subject === 'Contact Form Submission';
        });

    }


    public function contact_form_message_has_minimm_characters()
    {

        Livewire::test(ContactForm::class)
            ->set('message','asd')
            ->call('submitFom')
            ->assertHasErrors(['message' => 'min']);
    }
}
