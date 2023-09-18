<!-- ========= Layanan Section Start =========--> -->
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
                Komunikasi dan <span class="primary-color italic">Informasi Publik</span>
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
        <form role="form" action="{{ asset('/layanan-kip/form/submit'); }}" method="post" enctype="multipart/form-data" autocomplete="on">
        @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="sc-process-system-three sc-sm-mb-50">
                        <div class="process-content">
                            <h4 class="contact-title sc-pb-15">Kategori Layanan:</h4>
                            <select title="Pilih Layanan" data-size="11" class="form-control form-select selectpicker" name="kategori" id="kategori" required="" onchange="changeFunc();">
                                <option selected disabled hidden>-- Pilih Layanan --</option>
                                <optgroup label="Komunikasi dan Informasi Publik">
                                    <option value="Publikasi Media Video dan Grafis">Publikasi Media Video dan Grafis</option>
                                    <option value="Dukungan Komunikasi dan Informasi Publik">Dukungan Komunikasi dan Informasi Publik</option>
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
                    $('#publikasi_media').fadeOut("fast");
                    $('.publikasi_media_form').prop("required", false);
                    $('#kip_dukungan').fadeOut("fast");
                    $('.dukungan_kip_form').prop("required", false);
                    if(kategori_value == "Publikasi Media Video dan Grafis") {
                        $('#publikasi_media').delay(100).fadeIn();
                        $('.publikasi_media_form').prop("required", true);
                        $('#deskripsi_layanan').html('Dukungan penyediaan materi video dan grafis yang mewakili kebutuhan tingkat Kota Administrasi Jakarta Barat');
                    }
                    else if(kategori_value == "Dukungan Komunikasi dan Informasi Publik") {
                        $('#kip_dukungan').delay(100).fadeIn();
                        $('.dukungan_kip_form').prop("required", true);
                        $('#deskripsi_layanan').html('Dukungan fasilitasi hubungan dan kemitraan dengan media dalam rangka komunikasi dan informasi publik');
                    }
                }
                </script>
                @include('layanan.kip_publikasi')
                @include('layanan.kip_dukungan')
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