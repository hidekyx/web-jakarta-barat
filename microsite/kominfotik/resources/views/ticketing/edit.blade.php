<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0">Edit Formulir Layanan</h6>
        </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" id="ticketing" class="text-start" action="{{ asset('/ticketing/update/'.$layanan->id_layanan); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                <div class="input-group input-group-outline focused is-focused">
                    <label class="form-label">Nama Pemohon</label>
                    <input name="nama_pemohon" type="text" class="form-control" value="{{ $layanan->nama_pemohon }}" required>
                </div>
                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label class="form-label">No. Telp / HP / Email</label>
                    <input name="kontak" type="text" class="form-control" value="{{ $layanan->kontak }}" required>
                </div>
                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label class="form-label">Alamat</label>
                    <input name="alamat" type="text" class="form-control" value="{{ $layanan->alamat }}" required>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Tanggal Permohonan: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="tanggal" type="date" class="form-control" value="{{ $layanan->tanggal }}" required>
                </div>
                <h6 class="text-dark text-sm ">Instansi: </h6>
                <div class="input-group input-group-outline mb-0">
                    <select class="selectpicker instansi w-100" title="Pilih Instansi" data-live-search="true" data-size="4" name="instansi" required>
                        @foreach ($instansi as $i)
                            <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                        @endforeach
                    </select>
                </div>
                @if($id_role == 2)
                <h6 class="text-dark text-sm">Disposisi: </h6>
                <select class="selectpicker disposisi w-100" data-size="4" title="Pilih Disposisi" name="disposisi[]" multiple required>
                    <optgroup label="Staff">
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
                @endif
            </div>
        </div>
        <hr>
        <h6 class="text-dark text-sm ">Data Layanan: </h6>
        <div class="input-group input-group-outline mb-0">
            <select name="kategori" id="kategori" class="selectpicker w-100" title="Pilih Kategori Penanganan" onchange="changeFunc();" required>
                <option value="Instalasi, Penambahan, dan Penataan Jaringan">Instalasi, Penambahan, dan Penataan Jaringan</option>
                <option value="Penanganan Permasalahan Jaringan">Penanganan Permasalahan Jaringan</option>
                <option value="Kategori Lainnya">Kategori Lainnya</option>
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
            else if(kategori_value == "Kategori Lainnya") {
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
        <script>
            var kategori = '{{ $layanan->kategori }}';
            var cakupan = '{{ $layanan->cakupan }}';
            var disposisi = @json($disposisi);
            var jenis = @json($jenis);
            $('.instansi').selectpicker('val', '{{ $layanan->id_instansi }}');
            $('.disposisi').selectpicker('val', disposisi);
            $('#kategori').selectpicker('val', kategori);
            if(kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
                $('#instalasi').fadeIn();
                $('#penanganan').fadeOut();
                $('#lainnya').fadeOut();
                $('.instalasi').prop("required", false);
                $('.penanganan').prop("required", false);
                $('.penanganan').prop("checked", false);
                $('.lainnya').prop("required", false);
                $('#simpan').prop("disabled", false);
                if(cakupan == "Satu atau Beberapa PC") { $('#cakupan_1').prop("checked", true); }
                else if(cakupan == "Satu Ruangan") { $('#cakupan_2').prop("checked", true); }
                else if(cakupan == "Satu Lantai") { $('#cakupan_3').prop("checked", true); }
                else if(cakupan == "Satu Gedung") { $('#cakupan_4').prop("checked", true); }
                for (let i = 0; i < jenis.length; i++) {
                    if(jenis[i] == "Instalasi kabel jaringan baru") { $('#jenis_5').prop("checked", true); }
                    else if(jenis[i] == "Penataan kabel jaringan") { $('#jenis_6').prop("checked", true); }
                    else if(jenis[i] == "Penambahan kabel jaringan") { $('#jenis_7').prop("checked", true); }
                    else if(jenis[i] == "Pemasangan Rackmount") { $('#jenis_8').prop("checked", true); }
                }
                $('#deskripsi_1').prop("value", '{{ $layanan->deskripsi }}');
                $('#deskripsi_form_1').addClass('focused');
                $('#deskripsi_form_1').addClass('is-focused');
                $('#file-ip-1-preview').prop("src", '{{ asset('/storage/images/layanan/kondisi/'.$layanan->foto_kondisi); }}');
                $('#file-ip-1-preview').attr("hidden", false);
                $('#file').prop("value", '{{ $layanan->foto_kondisi }}');
                $('#no_surat').prop("value", '{{ $layanan->no_surat }}');
                $('#no_surat_form').addClass('focused');
                $('#no_surat_form').addClass('is-focused');
                $('#tanggal_surat').prop("value", '{{ $layanan->tanggal_surat }}');
                $('#perihal_surat').prop("value", '{{ $layanan->perihal_surat }}');
                $('#perihal_surat_form').addClass('focused');
                $('#perihal_surat_form').addClass('is-focused');
                $('#files').prop("value", '{{ $layanan->file_surat }}');
            }
            else if(kategori == "Penanganan Permasalahan Jaringan") {
                $('#instalasi').fadeOut();
                $('#lainnya').fadeOut();
                $('#penanganan').fadeIn();
                $('.instalasi').prop("required", false);
                $('.instalasi').prop("checked", false);
                $('.penanganan').prop("required", false);
                $('.lainnya').prop("required", false);
                $('#simpan').prop("disabled", false);
                if(cakupan == "Satu atau Beberapa PC") { $('#cakupan_5').prop("checked", true); }
                else if(cakupan == "Satu Ruangan") { $('#cakupan_6').prop("checked", true); }
                else if(cakupan == "Satu Lantai") { $('#cakupan_7').prop("checked", true); }
                else if(cakupan == "Satu Gedung") { $('#cakupan_8').prop("checked", true); }
                for (let i = 0; i < jenis.length; i++) {
                    if(jenis[i] == "Tidak bisa akses internet") { $('#jenis_1').prop("checked", true); }
                    else if(jenis[i] == "Internet lambat") { $('#jenis_2').prop("checked", true); }
                    else if(jenis[i] == "Wifi tidak bisa diakses") { $('#jenis_3').prop("checked", true); }
                    else { 
                        $('#jenis_4').prop("checked", true); 
                        $('#lainnya').collapse('show');
                        $('#lainnya_text').prop('required', true);
                        $('#lainnya_text').prop("value", jenis[i]);
                        $('#lainnya_form').addClass('focused');
                        $('#lainnya_form').addClass('is-focused');
                    }
                }
                $('#deskripsi_2').prop("value", '{{ $layanan->deskripsi }}');
                $('#deskripsi_form_2').addClass('focused');
                $('#deskripsi_form_2').addClass('is-focused');
                $('#file-ip-2-preview').prop("src", '{{ asset('/storage/images/layanan/kondisi/'.$layanan->foto_kondisi); }}');
                $('#file-ip-2-preview').attr("hidden", false);
                $('#file_2').prop("value", '{{ $layanan->foto_kondisi }}');
            }
            else if(kategori == "Kategori Lainnya") {
                $('#lainnya').fadeIn();
                $('#instalasi').fadeOut();
                $('#penanganan').fadeOut();
                $('.instalasi').prop("required", false);
                $('.instalasi').prop("checked", false);
                $('.penanganan').prop("required", false);
                $('.penanganan').prop("checked", false);
                $('.lainnya').prop("required", false);
                $('#simpan').prop("disabled", false);
                $('#deskripsi_3').prop("value", '{{ $layanan->deskripsi }}');
                $('#deskripsi_form_3').addClass('focused');
                $('#deskripsi_form_3').addClass('is-focused');
                $('#file-ip-3-preview').prop("src", '{{ asset('/storage/images/layanan/kondisi/'.$layanan->foto_kondisi); }}');
                $('#file-ip-3-preview').attr("hidden", false);
                $('#file_3').prop("value", '{{ $layanan->foto_kondisi }}');
                $('#no_surat_2').prop("value", '{{ $layanan->no_surat }}');
                $('#no_surat_form_2').addClass('focused');
                $('#no_surat_form_2').addClass('is-focused');
                $('#tanggal_surat_2').prop("value", '{{ $layanan->tanggal_surat }}');
                $('#perihal_surat_2').prop("value", '{{ $layanan->perihal_surat }}');
                $('#perihal_surat_form_2').addClass('focused');
                $('#perihal_surat_form_2').addClass('is-focused');
                $('#files_2').prop("value", '{{ $layanan->file_surat }}');
            }
        </script>
        <hr class="my-3">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2" id="simpan">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>