<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Daftar Barang Pakai Habis</h6>
            </div>
        </div>
        </div>
    </div>
    
    <div class="card-body px-0 pb-2 mx-0">
    <div class="row px-4">
        @if(session('errors'))
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                @foreach ($errors->all() as $error)
                <span class="text-sm">{{ $error }}</span>
                @endforeach
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ Session::get('error') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
        <div class="row container">
            <div class="col-12 col-lg">
                @if ($id_role == 1 || $id_role == 5)
                <a href="#"><button class="btn btn-sm btn-info">Tambah Data</button></a>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="table-responsive p-0">
                <table class="table table-hover align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 w-2">No</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Total Pemakaian</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Satuan</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Detail</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventaris_barang as $key => $ib)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0 ps-3">{{ $key+1 }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $ib->nama_barang }}</p>
                            </td>
                            <td>
                                <span class="badge badge-sm bg-dark w-30 text-white">{{ $ib->jumlah_terpakai }}</span>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $ib->satuan }}</p>
                            </td>
                            <td>
                                <p class="text-xs mb-0">
                                    <button class="btn btn-sm mb-0 btn-info detail-barang" value="{{ $ib->id_barang }}">Detail</button>
                                </p>
                            </td>
                            <td>
                                <a href="#"><i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak Laporan Barang">print</i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <hr class="mt-0">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <h5 class="mb-0">
                Grafik Data Barang Pakai Habis
                </h5>
                <p class="mb-2 font-weight-normal text-sm" id="grafik_nama_barang">{{ $detail_barang->nama_barang }}</p>
            </div>

            <hr class="mt-0 py-3">
            <div class="row container px-4">
                <h5 class="mb-0">
                Rekap Data Barang Pakai Habis
                </h5>
                <p class="mb-2 font-weight-normal text-sm" id="rekap_nama_barang">{{ $detail_barang->nama_barang }}</p>
                <table class="table table-hover align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 w-2">No</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Instansi</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Pemakaian</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2" style="width: 50px;">Kode Layanan</th>
                        </tr>
                    </thead>
                    <tbody class="rekap-barang">
                        @foreach ($riwayat_barang as $key => $rb)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0 ps-3">{{ $key+1 }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $rb['hari'] }}</p>
                                <p class="text-xs mb-0">{{ $rb['tanggal'] }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold text-secondary mb-0">{{ $rb['instansi'] }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold text-info mb-0">{{ $rb['jumlah_terpakai'] }} {{ $detail_barang->satuan }}</p>
                            </td>
                            <td>
                                <span class="badge bg-dark badge-sm text-white w-100">{{ $rb['kode_layanan'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script>
    $('.detail-barang').click(function() {
        let id_barang = this.value;
        $.ajax({
            url: 'get_json_barang/' + id_barang,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let satuan = res['satuan'];
                $("#grafik_nama_barang").html(res['data_barang']['nama_barang']);
                $("#rekap_nama_barang").html(res['data_barang']['nama_barang']);
                $(".rekap-barang").empty();
                $.each(res['riwayat_barang'], function(key, value) {
                    $('.rekap-barang').append("<tr><td><p class='text-xs font-weight-bold mb-0 ps-3'>"+ ++key +"</p></td><td><p class='text-xs font-weight-bold mb-0'>"+ value['hari'] +"</p><p class='text-xs mb-0'>"+ value['tanggal'] +"</p></td><td><p class='text-xs font-weight-bold text-secondary mb-0'>"+ value['instansi'] +"</p></td><td><p class='text-xs font-weight-bold text-info mb-0'>"+ value['jumlah_terpakai'] + " " + satuan +"</p></td><td><span class='badge bg-dark badge-sm text-white w-100'>"+ value['kode_layanan'] +"</span></td></tr>");
                });
            },
            error: function(res){
                alert('Barang tidak ditemukan!');
            }
        });
    });
</script>
@endpush