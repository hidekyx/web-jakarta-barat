<section id="layanan-publik" class="no-sidebar background-grey">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-6">
                <h2>Layanan Publik</h2>
                <p>Layanan yang ada di {{ $kewilayahan->nama }}</p>
            </div>
            <div class="col-lg-6 text-end">
                <div class="p-dropdown ml-3 float-right">
                    <a class="title btn btn-light"><i class="icon-sliders"></i> Filter</a>
                    <div class="p-dropdown-content">
                        <ul>
                            <li><a href="#"><i class="fa fa-briefcase-medical"></i>Kesehatan</a></li>
                            <li><a href="#"><i class="fa fa-book"></i>Pendidikan</a></li>
                            <li><a href="#"><i class="fa fa-bus"></i>Transportasi</a></li>
                            <li><a href="#"><i class="fa fa-user-clock"></i>PTSP</a></li>
                            <li><a href="#"><i class="fab fa-weixin"></i>Kanal Pengaduan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kategori</th>
                            <th class="noExport">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['layanan-publik'] as $key => $dl)
                        <tr>
                            <td>{{ $key+1 }}</td>
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
        </div>
    </div>
</section>