<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{

    public function render()
    {
        return view('livewire.notification')->extends('message');
    }


    public function alertSuccess()
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'This is a success message']
        );
    }


    public function alertError()
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'error',  'message' => 'Something is Wrong!']
        );
    }


    public function alertInfo()
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'info',  'message' => 'This is an information message']
        );
    }


    public function alertWarning()
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'warning',  'message' => 'This is warning message']
        );
    }
}
