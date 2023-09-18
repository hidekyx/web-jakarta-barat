<section id="page-content">
    <div class="container">
        <div class="grid-system-demo-live">
            <div class="row">
                <div class="col-lg-8 p-t-20 p-b-20">
                    <div class="heading-text heading-section heading-gradient">
                        <h2><span>@unlink($current_subpage)</span></h2>
                    </div>
                    <div style="text-align: justify;">
                    @if($current_menu->konten == "Teks" && $data['perangkat'][strtolower($current_subpage)] != null)
                        {!! $data['perangkat'][strtolower($current_subpage)]->konten !!}
                    @elseif($current_menu->konten == "Gambar" && $data['perangkat'][strtolower($current_subpage)] != null)
                        <img src="{{ asset('storage/files/images/foto/struktur_organisasi/'.$data['perangkat'][strtolower($current_subpage)]->struktur_organisasi) }}" width="100%">
                    @else
                    <p>Data belum tersedia.</p>
                    @endif
                    </div>
                </div>
                <div class="sidebar col-lg-4">
                    @include('front.widget_berita')
                </div>
            </div>
        </div>
    </div>
</section>