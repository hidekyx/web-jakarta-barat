<section id="page-content">
    <div class="container">
        <div class="grid-system-demo-live">
            <div class="row">
                <div class="col-lg-8 p-t-20 p-b-20">
                    <div class="heading-text heading-section heading-gradient">
                        <h2><span>@unlink($current_subpage)</span></h2>
                    </div>
                    @if($current_menu->konten == "Tabel")
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Kategori</th>
                                    <th class="noExport">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['layanan-publik'] as $key => $dl)
                                @if($dl->kategori != ucwords(str_replace('-', ' ', $current_subpage)))
                                    @continue
                                @endif
                                <tr>
                                    <td>{{ $dl->nama_layanan }}</td>
                                    <td>{{ $dl->alamat_layanan }}</td>
                                    @if($dl->kategori == "Kesehatan")
                                    <td><span class="badge badge-pill bg-success">{{ $dl->kategori }}</span></td>
                                    @elseif($dl->kategori == "Pendidikan")
                                    <td><span class="badge badge-pill bg-danger">{{ $dl->kategori }}</span></td>
                                    @elseif($dl->kategori == "Transportasi")
                                    <td><span class="badge badge-pill bg-primary">{{ $dl->kategori }}</span></td>
                                    @elseif($dl->kategori == "PTSP")
                                    <td><span class="badge badge-pill bg-warning">{{ $dl->kategori }}</span></td>
                                    @elseif($dl->kategori == "Kanal Pengaduan")
                                    <td><span class="badge badge-pill bg-info">{{ $dl->kategori }}</span></td>
                                    @elseif($dl->kategori == "Tempat Ibadah")
                                    <td><span class="badge badge-pill bg-secondary">{{ $dl->kategori }}</span></td>
                                    @endif
                                    <td>
                                        <a class="text-reset" href="#map-{{ $dl->id_layanan_publik }}" data-lightbox="inline" data-bs-toggle="tooltip" data-bs-original-title="Cari Melalui Google Map"><i class="fa fa-map-marker-alt"></i></a>
                                        <div id="map-{{ $dl->id_layanan_publik }}" class="modal no-padding" data-delay="3000" style="max-width: 700px; min-height:450px">
                                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                                @if($dl->kategori == "PTSP" || $dl->kategori == "Kanal Pengaduan")
                                                src="https://maps.google.com/maps?width=660&amp;height=450&amp;hl=en&amp;q=Kantor {{ $kewilayahan->nama }}&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                                @else
                                                src="https://maps.google.com/maps?width=660&amp;height=450&amp;hl=en&amp;q={{ $dl->nama_layanan }}&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                                @endif
                                            </iframe>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p>Data belum tersedia.</p>
                    @endif
                </div>
                <div class="sidebar col-lg-4">
                    @include('front.widget_berita')
                </div>
            </div>
        </div>
    </div>
</section>