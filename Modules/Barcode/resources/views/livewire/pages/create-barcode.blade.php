<x-slot name="title">New Barcode</x-slot>
	
{{-- show alert if there is errors --}}
<x-ruangadmin.alert-error/>

@if(session()->has('success'))
<x-ruangadmin.alert type="success" message="{{ session()->get('success') }}" />
@endif
<div class="container px-4 px-lg-5">
    <x-ruangadmin.card>
        <form>
            <div class="row">
                <div class="col-md-4">
                    <x-ruangadmin.select-single text="Bidang" wire="bidang" name="bidang">
                        <option value="">Pilih Bidang</option>
                        @foreach ($listbidang as $key => $val)
                            <option value="{{ $val['id'] }}">{{ $val['bidang'] }}</option>
                        @endforeach
                    </x-ruangadmin.select-single>
                </div>
                <div class="col-md-4">
                    <x-ruangadmin.select-single text="Kategori" wire="kategori" name="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach ($listkategori as $key => $val)
                            <option value="{{ $val['id'] }}">{{ $val['kategori'] }}</option>
                        @endforeach
                    </x-ruangadmin.select-single>
                </div>
                <div class="col-md-6">
                    <x-ruangadmin.input text="Nama Link" wire="name" name="name" type="text" />
                </div>
                <div class="col-md-6">
                    <x-ruangadmin.input text="Link" wire="link" name="link" type="text" />
                </div>
            </div>
            <x-ruangadmin.button type="secondary" text="Cancel" for="cancel" wire="back"/>
            <x-ruangadmin.button type="primary" text="Submit" for="submit" wire="simpan"/>
        </form>
        
    </x-ruangadmin.card>
</div>