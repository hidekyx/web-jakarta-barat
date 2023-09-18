<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0">Disposisi Data Layanan</h6>
        </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" id="ticketing" class="text-start" action="{{ asset('/ticketing/submit_disposisi/'.$layanan->id_layanan); }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row">
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    @foreach ($errors->all() as $error)
                    <span class="text-sm">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-6">    
                <h6 class="text-dark text-sm ">Identitas Pemohon: </h6>
                <div class="table-responsive">
                    <table class="table table-bordered" style="border-color: #f0f2f5;">
                        <tr class="text-sm font-weight-bold" style="background-color: #f0f2f5;">
                            <td>Nama Pemohon</td>
                            <td>No. Telp / HP / Email</td>
                            <td>Instansi</td>
                        </tr>
                        <tr>
                            <td class="text-sm">{{ $layanan->nama_pemohon }}</td>
                            <td class="text-sm">{{ $layanan->kontak }}</td>
                            <td class="text-sm">{{ $layanan->instansi->nama_instansi }}</td>
                        </tr>
                        <tr class="text-sm font-weight-bold">
                            <td colspan="4" style="background-color: #f0f2f5;">Alamat</td>
                        </tr>
                        <tr style="border-width: 1px; border-color: #dee2e6;">
                            <td colspan="4" class="text-sm">{{ $layanan->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Tanggal Permohonan: </h6>
                <div class="mb-3 text-sm">
                    {{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('dddd, DD MMMM Y')}}
                </div>
                <h6 class="text-dark text-sm">Disposisi: </h6>
                <select class="selectpicker disposisi w-100" data-size="4" title="Pilih Disposisi" name="disposisi[]" multiple required>
                    <optgroup label="Pelaksana">
                        @foreach ($staff as $s)
                            <option value="{{ $s->id_user }}">{{ $s->nama_lengkap }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Tenaga Terampil">
                        @foreach ($tenaga_terampil as $tt)
                            <option value="{{ $tt->id_user }}">{{ $tt->nama_lengkap }}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
        </div>
        <script>
            var disposisi = @json($disposisi);
            $('.disposisi').selectpicker('val', disposisi);
        </script>
        <hr class="my-3">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2" id="simpan">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>