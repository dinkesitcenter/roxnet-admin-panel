<?php

namespace Modules\Barcode\Livewire\Pages;

use Livewire\Component;
use Modules\Barcode\Models\Barcode;
use Modules\Barcode\Models\Bidang;
use Modules\Barcode\Models\Kategori;

class CreateBarcode extends Component
{
    public $name,$link,$bidang,$kategori;
    public $listbidang;
    public $listkategori;

    public function mount(){
        $this->listbidang=Bidang::all()->toArray();
        $this->listkategori=Kategori::all()->toArray();
    }

    public function simpan(){
        $barcode=[
            'name'=>$this->name,
            'link'=>$this->link,
            'bidang_id'=> $this->bidang,
            'kategori_id' => $this->kategori,
        ];
        Barcode::create($barcode);
        session()->flash('success', 'Barcode successfully created.');
        return redirect()->route('barcode');
    }

    public function back(){
        return $this->redirectRoute('admin.barcode');
    }


    public function render()
    {
        return view('barcode::livewire.pages.create-barcode');
    }
}
