<?php

namespace App\Livewire;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;

class Employee extends Component
{
    public $nama;
    public $email;
    public $alamat;

    public function store()
    {
        $rules = [
            'nama'  => 'required',
            'email'  => 'required|email',
            'alamat'  => 'required',
        ];    
        $pesan = [
            'nama.required'  => 'Nama wajib diisi',
            'email.required'  => 'Email wajib diisi',
            'email.email'  => 'Format email tidak sesuai',
            'alamat.required'  => 'Alamat wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
        ModelsEmployee::create($validated);
        session()->flash('message','data berhasil dimasukkan');
    }

    public function render()
    {
        return view('livewire.employee');
    }
}
