<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-2">
                    <div class="col-lg-5 col-12 mb-2">
                        <label>Filter berdasarkan kategori: </label>
                        <form role="form" method="get" class="text-start">
                        <div class="input-group input-group-outline">
                            <div class="input-grou-prepend">
                            <select name="kategori" class="form-control">
                                @isset($results['kategori'])
                                    @if($results['kategori'] == "")
                                    <option hidden value="">Semua Kategori</option>
                                    @else
                                    <option hidden value="{{ $results['kategori'] }}">{{ $results['kategori'] }}</option>
                                    @endif
                                @endisset
                                <option value="">Semua Kategori</option>
                                <option value="Setiap Saat">Setiap Saat</option>
                                <option value="Berkala">Berkala</option>
                                <option value="Serta Merta">Serta Merta</option>
                                <option value="Dikecualikan">Dikecualikan</option>
                            </select>
                            </div>
                            @isset($results['nama_inf'])
                            <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{ $results['nama_inf'] }}">
                            @else
                            <input type="text" name="judul" class="form-control" placeholder="Judul">
                            @endisset
                            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-primary mb-0"><i class="bi bi-search"></i></button>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
                
                <div style="overflow-x:auto;">
                <table class="table table-hover">
                    <thead>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>PPID SKPD/UKPD</th>
                        <th>File</th>
                        <th>Download</th>
                    </thead>
                    <tbody>
                        @foreach($informasi_publik as $key => $ip)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                @if($ip->kategori == "Setiap Saat")
                                <span class="badge text-secondary">{{ $ip->kategori }}</span>
                                @elseif($ip->kategori == "Berkala")
                                <span class="badge text-primary">{{ $ip->kategori }}</span>
                                @elseif($ip->kategori == "Serta Merta")
                                <span class="badge text-warning">{{ $ip->kategori }}</span>
                                @elseif($ip->kategori == "Dikecualikan")
                                <span class="badge text-danger">{{ $ip->kategori }}</span>
                                @endif
                            </td>
                            <td><b>{{ $ip->nama_inf }}</b><br>{{ $ip->detail_inf }}</td>
                            <td>{{ $ip->penanggung_jaw }}</td>
                            <td>
                                @if ($ip->file != null)
                                <form method="post" action="{{ asset('/daftar-informasi-publik/download/'.$ip->id_dftr) }}" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-primary">Download</button>
                                </form>
                                @else
                                -
                                @endif
                            </td>
                            @if($ip->kategori == "Dikecualikan")
                            <td>-</td>
                            @else
                            <td>{{ $ip->download }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <p class="mb-0">Jumlah download: <b>{{ $jumlah_download }}</b> kali</p>
                {{ $informasi_publik->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>