<section id="cek_layanan">
<div class="container" data-aos="zoom-in">
    <div class="row justify-content-center sc-pt-70 sc-pb-70">
        <div class="error-text" style="pb-0">
            <div class="sc-heading-area text-center">
                <span class="sub-title"><i class="icon-line"></i>Cek</span>
                <h3 class="title">Status <span class="primary-color italic">Layanan</span></h3>
            </div>
            <center><p>Anda dapat mengecek status layanan menggunakan kode resi yang telah didapatkan.</p>
            <form role="form" action="{{ asset('/layanan/detail-status') }}" method="get" enctype="multipart/form-data" autocomplete="on">
                <div class="sc-searchbar-area d-flex align-items-center justify-content-center">
                    <div class="input-field">
                        <input type="text" id="kode_layanan" name="kode_layanan" placeholder="Cek Resi" required/>
                    </div>
                    <button type="submit" class="btn sc-primary-btn"><i class="icon-search"></i> Cari</button>
                </div>
            </form>
        </div>
        @if($layanan != null)
            @if($layanan_detail == "ID")
                @include('layanan.layanan_id_detail')
            @elseif($layanan_detail == "ASTIK")
                @include('layanan.layanan_astik_detail')
            @elseif($layanan_detail == "KIP")
                @include('layanan.layanan_kip_detail')
            @endif
        @endif
    </div>
</div>
</section>