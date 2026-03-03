<?php

namespace App\View\Components\Pelanggan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormPelanggan extends Component
{
    public $id;
    public $namaPasien;
    public $jenisKelamin;
    public $tanggalLahir;
    public $nomorTelepon;
    public $alamat;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $id = null, 
        $namaPasien = null, 
        $jenisKelamin = null, 
        $tanggalLahir = null, 
        $nomorTelepon = null, 
        $alamat = null
    ) {
        $this->id = $id;
        $this->namaPasien = $namaPasien;
        $this->jenisKelamin = $jenisKelamin;
        $this->tanggalLahir = $tanggalLahir;
        $this->nomorTelepon = $nomorTelepon;
        $this->alamat = $alamat;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pelanggan.form-pelanggan');
    }
}