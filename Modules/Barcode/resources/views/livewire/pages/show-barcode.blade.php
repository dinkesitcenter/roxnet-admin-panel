<div>
    <x-slot name="title">
        Barcode
    </x-slot>
    <div class="container px-4 px-lg-5">

      @if(session()->has('success'))
      <x-ruangadmin.alert type="success" message="{{ session()->get('success') }}" />
      @endif
    </div>
    <div>
      <x-ruangadmin.card>
        <x-slot name="title">Data Barcode</x-slot>
        <x-slot name="option">
          <a href="{{ route('admin.barcode.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah
          </a>
        </x-slot>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Bidang</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Link</th>
                <th>Barcode</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($barcode as $no=>$bar)
              <tr>
                <td class="text-center">{{ $no+1 }}</td>
                <td>{{ isset($bar['bidang']) ? $bar['bidang']['bidang']:'' }}</td>
                <td>{{ isset($bar['kategori']) ? $bar['kategori']['kategori']:'' }}</td>
                <td>{{ $bar['name'] }}</td>
                <td><a href="{{ $bar['link'] }}">{{ $bar['link'] }}</a></td>
                <td style="text-align: center;">
                  <img src="{{ asset('storage/'.$bar['name'].'.png') }}" alt="barcode" width="70" height="70" style="margin: 0 auto;" /> 
                  @php ((!file_exists(public_path('storage/'.$bar['name'].'.png'))) ? \Storage::disk('public')->put($bar['name'].'.png',base64_decode(DNS2D::getBarcodePNG($bar['link'], "QRCODE",10,10))):null) @endphp
                  <br>
                  <button wire:click="export('{{$bar['name']}}')" class="btn btn-primary mb-1">
                    Download
                  </button>
                </td>
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-info mr-1 info"
                  data-name="{{ $bar['name'] }}" data-link="{{ $bar['link'] }}" data-bidang="{{ $bar['bidang_id'] }}" data-kategori="{{ $bar['kategori_id'] }}">
                    <i class="fas fa-eye"></i>
                  </button>
                  <a href="{{ route('admin.barcode.edit',$bar->id) }}" class="btn btn-primary mr-1"><i class="fas fa-edit"></i></a> 
                  <button type="button" class="btn btn-danger" wire:click="deleteuseId({{$bar->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i></button>
  
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center">No Barcode</td>
              </tr>
              @endforelse
  
            </tbody>
          </table>
          <br/>
          <div class="row justify-content-center my-2">
            {{ $barcode->links() }}
          </div>
        </div>
      </x-ruangadmin.card>

      <x-ruangadmin.modal-confirm>
        <x-slot name="id">deleteModal</x-slot>
        <x-slot name="title">Delete Confirm</x-slot>
        <p>Are you sure want to delete?</p>
      </x-ruangadmin.modal-confirm>
    </div>

    <x-ruangadmin.modal>
      <x-slot name="id">infoModal</x-slot>
      <x-slot name="title">Information</x-slot>
  
      <div class="row mb-2">
        <div class="col-6">
          <b>Nama</b>
        </div>
        <div class="col-6" id="name-modal"></div>
      </div>
      <div class="row mb-2">
        <div class="col-6">
          <b>Link</b>
        </div>
        <div class="col-6" id="link-modal"></div>
      </div>
      <div class="row mb-2">
        <div class="col-6">
          <b>Barcode</b>
        </div>
  
        <div class="col-6" id="barcode-modal">
          <img src="" alt="barcode" />
          <br />
          <br />
          <button id="download" class="btn btn-primary mb-1" wire:click="">
            Download
          </button>
          <br />
          <br />
          <button id="download-cetak" class="btn btn-info mb-1" wire:click="">
            Download Cetak Template
          </button>
        </div>
      </div>
    </x-ruangadmin.modal>
  
    <x-slot name="script">
      @script
      <script>
        $('.info').click(function(e) {
          e.preventDefault()
          $('#name-modal').text($(this).data('name'))
          $('#link-modal').text($(this).data('link'))
          $('#barcode-modal img').attr("src",'/storage/'+$(this).data('name')+'.png')
          $('#barcode-modal #download').attr("wire:click","export('"+$(this).data('name')+"')")
          $('#barcode-modal #download-cetak').attr("wire:click","cetak('"+$(this).data('name')+"',"+$(this).data('bidang')+","+$(this).data('kategori')+")")
          $('#infoModal').modal('show')
        })
        $wire.on('close-modal', () => {
          $('#infoModal').modal('hide')
        });
      </script>
      @endscript
    </x-slot>
</div>
