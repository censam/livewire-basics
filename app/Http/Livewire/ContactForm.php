<?php

namespace App\Http\Livewire;

use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name, $email, $telephone, $message;
    public $success_message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'telephone' => 'required',
        'message' => 'required',
    ];


    public function formSubmit()
    {
        $contact = $this->validate();

        sleep(5);

        Mail::to('wgsampath@gmail.com')->send(new ContactFormMailable($contact));

        $this->success_message = "Mail Sent Successfully";



        $this->resetForm();

    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->telephone = '';
        $this->message = '';


    }


    public function render()
    {
        return view('livewire.contact-form');
    }
}
