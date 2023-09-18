<hr class="" style="border-top: 2px dashed #8c8b8b;">
<section class="no-padding">
    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
            @if($kewilayahan->kategori == "Kelurahan")
            src="https://maps.google.com/maps?width=660&amp;height=450&amp;hl=en&amp;q={{ $kewilayahan->kode_pos }}&amp;t=&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
            @else
            src="https://maps.google.com/maps?width=660&amp;height=450&amp;hl=en&amp;q={{ $kewilayahan->nama }}&amp;t=&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
            @endif
            </iframe>
        </div>
        <style>.mapouter{position:relative;text-align:right;width:100%;height:450px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:450px;}.gmap_iframe {height:450px!important;}</style>
    </div>
</section>
<hr class="" style="border-top: 2px dashed #8c8b8b;">