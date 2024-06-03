<?php

namespace Modules\Barcode\Livewire\Pages;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Modules\Barcode\Models\Barcode;
use Modules\Barcode\Models\Bidang;
use Modules\Barcode\Models\Kategori;
use Livewire\WithPagination;

class ShowBarcode extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId='';

    public function deleteuseId($id)
    {
        $this->deleteId=$id;
    }

    public function delete(){
        $barcode=Barcode::find($this->deleteId);
        Storage::disk('public')->delete($barcode->name.'.png');
        Storage::disk('barcode')->delete($barcode->name.'.png');
        $barcode->delete();
        session()->flash('success', 'Barcode successfully delete.');
        return redirect()->route('barcode');
    }

    public function export($link)
    {
        session()->flash('success','File is downloading');
        $this->dispatch('close-modal');
        return Storage::disk('public')->download($link.'.png');
        // return redirect()->route('barcode');
    }

    public function cetak($link,$bidang,$kategori)
    {
        $bidang=Bidang::where('id',$bidang)->first();
        $kategori=Kategori::where('id',$kategori)->first();

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('app/barcode/QRCODE Template.docx'));
        $template->setValue('jenis_kuesioner',strtoupper($kategori->kategori));
        $template->setValue('bidang',strtoupper($bidang->keterangan));
        $template->setImageValue('barcode', array('path' =>  public_path('storage/').$link.'.png', 'width' => 290, 'height' => 290, 'ratio' => false));
        
        $filename = 'certificate_'.$link.'.docx';
        $path = storage_path('app/barcode/'.$filename);
        $template->saveAs($path);
        $this->dispatch('close-modal');
        return response()->download(storage_path('app/barcode/certificate_'.$link.'.docx'));
    }

    public function render()
    {
        return view('barcode::livewire.pages.show-barcode',[
            'barcode' => Barcode::with(['bidang','kategori'])->latest()->paginate(10),
        ]);
    }
}
