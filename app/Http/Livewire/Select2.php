<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select2 extends Component
{
    public $selCity = '';
 
    public $cities = [
        'Rajkot',
        'Surat',
        'Baroda',
    ]; 

    public function render()
    {
        return view('livewire.select2')->extends('layouts.app');
    }
}
