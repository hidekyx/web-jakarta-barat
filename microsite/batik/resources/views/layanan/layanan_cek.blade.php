<section id="cek_layanan">
<div class="container" data-aos="zoom-in">
    <div class="row justify-content-center sc-pt-70 sc-pb-70">
        <div class="error-text" style="pb-0">
            <div class="sc-heading-area text-center">
                <span class="sub-title"><i class="icon-line"></i>Cek</span>
                <h3 class="title">Status <span class="primary-color italic">Layanan</span></h3>
            </div>
            <center><p>Anda dapat mengecek status layanan menggunakan kode resi yang telah didapatkan.</p>
            <form action="#" method="get">@csrf</form>
            <div class="sc-searchbar-area d-flex align-items-center justify-content-center">
                <div class="input-field">
                    <input type="text" id="kode_layanan" name="kode_layanan" placeholder="Cek Resi" required="" />
                </div>
                <a href="{{ asset('/layanan/detail-status') }}" class="lightbox-detail" data-glightbox="type: external"><button class="btn sc-primary-btn"><i class="icon-search"></i> Cari</button></a>
            </div>
        </div>
    </div>
</div>
</section>