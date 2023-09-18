<!--=========== Layanan Section Start =========-->
<div class="sc-contact-section sc-pt-100 sc-md-pt-70 sc-pb-80 sc-md-pb-50">
    <div class="container">
        <style>
            .bootstrap-select .dropdown-toggle {
                padding: 15px 20px !important;
            }
            .form-check-input:checked { 
                background-color: #feb52b;
                border-color: #feb52b;
            }
        </style>
        <div class="sc-heading-area text-center sc-pr-30 sc-pt-0 sc-pb-30">
            <span class="sub-title"><i class="icon-line"></i> Form Layanan</span>
            <h3 class="title">
                Aplikasi <span class="primary-color italic">Siber dan Sandi</span>
            </h3>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
        <form role="form" action="{{ asset('/layanan-astik/form/submit'); }}" method="post" enctype="multipart/form-data" autocomplete="on">
        @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="sc-process-system-three sc-sm-mb-50">
                        <div class="process-content">
                            <h4 class="contact-title sc-pb-15">Kategori Layanan:</h4>
                            <select title="Pilih Layanan" data-size="11" class="form-control form-select selectpicker" name="kategori" id="kategori" required="" onchange="changeFunc();">
                                <option selected disabled hidden>-- Pilih Layanan --</option>
                                <optgroup label="Keamanan Informasi Siber dan Sandi">
                                    <option value="Kontra Penginderaan">Kontra Penginderaan</option>
                                    <option value="Pengamanan Sinyal">Pengamanan Sinyal</option>
                                </optgroup>
                                <optgroup label="Keamanan Sistem">
                                    <option value="Instalasi Antivirus">Instalasi Antivirus</option>
                                    <option value="Penetration Testing">Penetration Testing</option>
                                    <option value="Pemulihan Akun Pemerintahan Yang Diretas">Pemulihan Akun Pemerintahan Yang Diretas</option>
                                </optgroup>
                                <optgroup label="Pemanfaatan Layanan Pemerintahan">
                                    <option value="Sertifikat Elektronik">Sertifikat Elektronik</option>
                                    <option value="Permohonan Email">Permohonan Email @jakarta.go.id</option>
                                </optgroup>
                            </select>
                            <div class="desc sc-mt-20" style="text-align: justify; text-justify: inter-word;" id="deskripsi_layanan"></div>
                        </div>
                    </div>
                    <div class="sc-chat-box sc-mt-20">
                        <a class="sc-primary-btn w-100 text-center" style="background-color: #128C7E !important;" href="https://wa.me/+6281211255934" target="_blank"><i class="fa-brands fa-whatsapp sc-mr-2" style="font-size: 25px !important;"></i> Hubungi Kami</a>
                    </div>
                </div>
                <script type="text/javascript">
                function changeFunc() {
                    var kategori_select = document.getElementById("kategori");
                    var kategori_value = kategori_select.options[kategori_select.selectedIndex].value;
                    $('#kontra_penginderaan').fadeOut("fast");
                    $('.kontra_penginderaan_form').prop("required", false);
                    $('#pengamanan_sinyal').fadeOut("fast");
                    $('.pengamanan_sinyal_form').prop("required", false);
                    $('#instalasi_antivirus').fadeOut("fast");
                    $('.instalasi_antivirus_form').prop("required", false);
                    $('#penetration_testing').fadeOut("fast");
                    $('.penetration_testing_form').prop("required", false);
                    $('#pemulihan_akun').fadeOut("fast");
                    $('.pemulihan_akun_form').prop("required", false);
                    $('#sertifikat_elektronik').fadeOut("fast");
                    $('.sertifikat_elektronik_form').prop("required", false);
                    $('#permohonan_email').fadeOut("fast");
                    $('.permohonan_email_form').prop("required", false);
                    if(kategori_value == "Kontra Penginderaan") {
                        $('#kontra_penginderaan').delay(100).fadeIn();
                        $('.kontra_penginderaan_form').prop("required", true);
                        $('#deskripsi_layanan').html('Kegiatan pengamanan informasi atau proses dalam mengidentifikasi ancaman penyadapan atau kerawanan kebocoran informasi dari alat/perangkat');
                    }
                    else if(kategori_value == "Pengamanan Sinyal") {
                        $('#pengamanan_sinyal').delay(100).fadeIn();
                        $('.pengamanan_sinyal_form').prop("required", true);
                        $('#deskripsi_layanan').html('Pengamanan sinyal radio/seluler dari gangguan penyadapan pada kegiatan strategis pemerintah');
                    }
                    else if(kategori_value == "Instalasi Antivirus") {
                        $('#instalasi_antivirus').delay(100).fadeIn();
                        $('.instalasi_antivirus_form').prop("required", true);
                        $('#deskripsi_layanan').html('Perlindungan dan keamanan pada data komputer dari serangan virus');
                    }
                    else if(kategori_value == "Penetration Testing") {
                        $('#penetration_testing').delay(100).fadeIn();
                        $('.penetration_testing_form').prop("required", true);
                        $('#deskripsi_layanan').html('Proses pengujian pada suatu sistem terutama website untuk mengetahui tingkat keamanannya');
                    }
                    else if(kategori_value == "Pemulihan Akun Pemerintahan Yang Diretas") {
                        $('#pemulihan_akun').delay(100).fadeIn();
                        $('.pemulihan_akun_form').prop("required", true);
                        $('#deskripsi_layanan').html('Proses pengembalian akun pemerintahan resmi yang telah hilang akibat diretas');
                    }
                    else if(kategori_value == "Sertifikat Elektronik") {
                        $('#sertifikat_elektronik').delay(100).fadeIn();
                        $('.sertifikat_elektronik_form').prop("required", true);
                        $('#deskripsi_layanan').html('Tanda tangan elektronik dan identitas yang menunjukkan status subjek hukum para pihak dalam transaksi elektronik');
                    }
                    else if(kategori_value == "Permohonan Email") {
                        $('#permohonan_email').delay(100).fadeIn();
                        $('.permohonan_email_form').prop("required", true);
                        $('#deskripsi_layanan').html('Pengajuan pembuatan akun email dengan menggunakan domain @jakarta.go.id');
                    }
                }
                </script>
                @include('layanan.astik_penginderaan')
                @include('layanan.astik_sinyal')
                @include('layanan.astik_antivirus')
                @include('layanan.astik_pentest')
                @include('layanan.astik_pemulihan')
                @include('layanan.astik_sertifikat')
                @include('layanan.astik_email')
                <script type="text/javascript">
                    function changeColor(id_element) {
                        var selectpicker = document.querySelector("[data-id=" + id_element + "]");
                        selectpicker.style.outline  = "2px solid #17975a";
                    }
                </script>
            </div>
        </form>
    </div>
</div>
<!--=========== Layanan Section End =========-->