
        <div class="row">
        <div class="col-12">
          <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Input Formulir Layanan Baru</h6>
        </div>
        </div>
    <div class="card-body pt-4 p-3">
        <form role="form" id="ticketing" class="text-start" action="{{ asset('/ticketing/simpan'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                <div class="input-group input-group-outline">
                    <label class="form-label">Nama Pemohon</label>
                    <input name="nama_pemohon" type="text" class="form-control" maxlength="50" required>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">No. Telp / HP / Email</label>
                    <input name="kontak" type="text" class="form-control"  maxlength="50" required>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Alamat</label>
                    <input name="alamat" type="text" class="form-control" required>
                </div>
                <h6 class="text-dark text-sm ">Media Permohonan: </h6>
                <div class="input-group">
                    <div class="form-check">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="media_1" name="media" value="Surat" required>
                        <label class="custom-control-label" for="media_1">Surat</label>
                    </div>
                    </div>
                    <div class="form-check">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="media_2" name="media" value="Whatsapp" required>
                        <label class="custom-control-label" for="media_2">Whatsapp</label>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Tanggal Permohonan: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="tanggal" type="date" class="form-control" required>
                </div>
                <h6 class="text-dark text-sm ">Instansi: </h6>
                <div class="input-group input-group-outline mb-0">
                    <select class="selectpicker w-100" title="Pilih Instansi" data-live-search="true" data-size="4" name="instansi" required>
                        @foreach ($instansi as $i)
                            <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr>
        <h6 class="text-dark text-sm ">Data Layanan: </h6>
        <div class="input-group input-group-outline mb-0">
            <select name="kategori" id="kategori" class="selectpicker w-100" title="Pilih Kategori Penanganan" onchange="changeFunc();" required>
                <option value="Instalasi, Penambahan, dan Penataan Jaringan">Instalasi, Penambahan, dan Penataan Jaringan</option>
                <option value="Penanganan Permasalahan Jaringan">Penanganan Permasalahan Jaringan</option>
                <option value="Dukungan Zoom Meeting">Dukungan Zoom Meeting</option>
            </select>
        </div>
        <script type="text/javascript">
        function changeFunc() {
            var kategori_select = document.getElementById("kategori");
            var kategori_value = kategori_select.options[kategori_select.selectedIndex].value;
            if(kategori_value == "Instalasi, Penambahan, dan Penataan Jaringan") {
                $('#instalasi').fadeIn();
                $('#penanganan').fadeOut();
                $('#lainnya').fadeOut();
                $('.instalasi').prop("required", true);
                $('.penanganan').prop("required", false);
                $('.penanganan').prop("checked", false);
                $('.lainnya').prop("required", false);
                $('#simpan').prop("disabled", false);
            }
            else if(kategori_value == "Penanganan Permasalahan Jaringan") {
                $('#instalasi').fadeOut();
                $('#lainnya').fadeOut();
                $('#penanganan').fadeIn();
                $('.instalasi').prop("required", false);
                $('.instalasi').prop("checked", false);
                $('.penanganan').prop("required", true);
                $('.lainnya').prop("required", false);
                $('#simpan').prop("disabled", false);
            }
            else if(kategori_value == "Dukungan Zoom Meeting") {
                $('#instalasi').fadeOut();
                $('#penanganan').fadeOut();
                $('#lainnya').fadeIn();
                $('.lainnya').prop("required", true);
                $('.instalasi').prop("required", false);
                $('.instalasi').prop("checked", false);
                $('.penanganan').prop("required", false);
                $('.penanganan').prop("checked", false);
                $('#simpan').prop("disabled", false);
            }
        }
        </script>
        @include('ticketing.tambah_lainnya')
        @include('ticketing.tambah_instalasi')
        @include('ticketing.tambah_penanganan')
        
        <hr class="my-3">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2" id="simpan" disabled>Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>