<!-- ======= Layanan Section ======= -->
<section id="layanan" class="contact">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
        <h2>Layanan</h2>
        <p>Barat Ticketing Network melayani pengajuan berupa penanganan permasalahan jaringan serta instalasi, penambahan, dan penataan jaringan yang terhubung pada jaringan instansi pemerintahan Jakarta Barat.</p>
    </div>

    <form role="form" id="ticketing" class="text-start" action="{{ asset('/net-ticketing/submit'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="row">
        <div class="row px-4">
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    @foreach ($errors->all() as $error)
                    <span class="text-sm">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <span class="text-sm">{{ Session::get('error') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info" data-aos="fade-right" data-aos-delay="100">
            <div class="row">
                <div class="form-group col-md-6 mb-4">
                    <label for="name" class="mb-2 label-form">Nama Pemohon</label>
                    <input type="text" name="nama_pemohon" class="form-control" id="nama_pemohon" placeholder="Isi Nama Pemohon" maxlength="50" required>
                </div>
                <div class="form-group col-md-6 mb-4">
                    <label for="kontak" class="mb-2 label-form">No HP / Email</label>
                    <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Isi Kontak" maxlength="50" required>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="tanggal" class="mb-2 label-form">Tanggal Permohonan</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
            </div>
            <div class="form-group mb-4">
                <label for="name" class="mb-2 label-form">Instansi</label>
                <select class="selectpicker w-100" title="Pilih Instansi" data-live-search="true" data-size="4" name="instansi" required>
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="name" class="mb-2 label-form">Kategori Layanan</label>
                <select name="kategori" id="kategori" class="selectpicker w-100" title="Pilih Kategori Penanganan" onchange="changeFunc();" required>
                    <option value="Instalasi, Penambahan, dan Penataan Jaringan">Instalasi, Penambahan, dan Penataan Jaringan</option>
                    <option value="Penanganan Permasalahan Jaringan">Penanganan Permasalahan Jaringan</option>
                </select>
            </div>
            <script type="text/javascript">
            function changeFunc() {
                var kategori_select = document.getElementById("kategori");
                var kategori_value = kategori_select.options[kategori_select.selectedIndex].value;
                if(kategori_value == "Instalasi, Penambahan, dan Penataan Jaringan") {
                    $('#penanganan').fadeOut("fast");
                    $('#instalasi').delay(100).fadeIn();
                    $('.instalasi').prop("required", true);
                    $('.penanganan').prop("required", false);
                    $('.penanganan').prop("checked", false);
                }
                else if(kategori_value == "Penanganan Permasalahan Jaringan") {
                    $('#instalasi').fadeOut("fast");
                    $('#penanganan').delay(100).fadeIn();
                    $('.instalasi').prop("required", false);
                    $('.instalasi').prop("checked", false);
                    $('.penanganan').prop("required", true);
                }
            }
            </script>
        </div>
        </div>

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <div class="php-email-form" data-aos="fade-left" data-aos-delay="200">
            @include('ticketing.front.penanganan')
            @include('ticketing.front.instalasi')
            </div>
        </div>
    </div>
    </form>

    </div>
</section>