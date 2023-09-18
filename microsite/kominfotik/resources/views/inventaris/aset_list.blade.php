<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Daftar Barang Aset</h6>
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
                <a href="{{ asset('/inventaris/barang-aset/tambah') }}"><button class="btn btn-sm btn-info">Tambah Data</button></a>
                @endif
                <div id="cari">
                    <hr class="p-0 w-100">
                    <form role="form" class="text-start">
                    <div class="row">
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Bulan Perolehan: </h6>
                            <div class="input-group input-group-outline">
                                <input name="bulan_perolehan" type="month" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Seksi: </h6>
                            <div class="input-group input-group-outline">
                                <select class="selectpicker w-100" title="Pilih Seksi Penggunaan" name="seksi">
                                    @foreach ($seksi as $s)
                                    <option value="{{ $s->id_seksi }}">{{ $s->nama_seksi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Barang Aset: </h6>
                            <div class="input-group input-group-outline">
                                <select class="selectpicker w-100 show-tick" title="Cari Barang Aset" name="aset" data-live-search="true" data-size="10">
                                    @foreach ($aset as $a)
                                    <option value="{{ $a->kode_barang_aset }}" data-subtext="- {{ $a->kode_barang_aset }}">{{ $a->nama_aset }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg col-12">
                            <h6 class="text-sm" style="visibility: hidden;">Cari</h6>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="table-responsive p-0">
                <table class="table table-hover align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 w-2">No</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kode/Nama Barang</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Seksi</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">No Reg</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Satuan/Bahan</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Perolehan</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Merk</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Tipe</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Asal Perolehan</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kondisi</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventaris as $key => $i)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0 ps-3">{{ ($inventaris->currentPage()-1) * $inventaris->perPage() + $key+1 }}</p>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">Kode: {{ $i->kode_barang_aset }}</p>
                                <p class="text-xs font-weight-bold mb-0">
                                    @php
                                    $maxLength = 20;
                                    
                                    $nama_aset = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", ($i->aset->nama_aset), 0, PREG_SPLIT_NO_EMPTY);
                                    echo $nama_aset_split = implode("<br>",$nama_aset);
                                    
                                    @endphp
                                </p>
                            </td>
                            <td>
                                @if($i->id_seksi == 1)
                                <span class="badge badge-sm bg-gradient-success w-80 text-white">ID</span>
                                @elseif($i->id_seksi == 2)
                                <span class="badge badge-sm bg-gradient-info w-80 text-white">KIP</span>
                                @elseif($i->id_seksi == 3)
                                <span class="badge badge-sm bg-gradient-primary w-80 text-white">ASTIK</span>
                                @elseif($i->id_seksi == 4)
                                <span class="badge badge-sm bg-gradient-warning w-80 text-white">TU</span>
                                @endif
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold text-primary mb-0">{{ sprintf("%04s", $i->no_registrasi) }}</p>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">Satuan:</p>
                                <p class="text-xs font-weight-bold mb-0">{{ $i->satuan }}</p>
                                <hr class="mt-0 mb-2">
                                <p class="text-xs text-secondary mb-0">Bahan:</p>
                                <p class="text-xs font-weight-bold mb-0">{{ $i->bahan }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($i->tanggal_perolehan)->isoFormat('D MMMM Y')}}</p>
                                @if($i->tanggal_bpkb != null)
                                <hr class="mt-0 mb-2">
                                <p class="text-xs text-secondary mb-0">Tanggal BPKB/Dokumentasi:</p>
                                <p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($i->tanggal_bpkb)->isoFormat('D MMMM Y')}}</p>
                                @endif
                                @if($i->no_polisi != null)
                                <hr class="mt-0 mb-2">
                                <p class="text-xs text-secondary mb-0">No Polisi:</p>
                                <p class="text-xs font-weight-bold mb-0">{{ $i->no_polisi }}</p>
                                @endif
                            </td>
                            <td>
                                @if($i->merk != null)
                                <p class="text-xs font-weight-bold mb-0">
                                    @php
                                    $maxLength = 30;
                                    
                                    $merk = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", ($i->merk), 0, PREG_SPLIT_NO_EMPTY);
                                    echo $merk_split = implode("<br>",$merk);
                                    
                                    @endphp
                                </p>
                                @else
                                <p class="text-xs font-weight-bold mb-0">-</p>
                                @endif
                                @if($i->no_rangka != null)
                                <hr class="mt-0 mb-2">
                                <p class="text-xs text-secondary mb-0">No Chasis/Rangka:</p>
                                <p class="text-xs font-weight-bold mb-0">{{ $i->no_rangka }}</p>
                                @endif
                            </td>
                            <td>
                                @if($i->tipe != null)
                                <p class="text-xs font-weight-bold mb-0">
                                    @php
                                    $maxLength = 30;
                                    
                                    $tipe = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", ($i->tipe), 0, PREG_SPLIT_NO_EMPTY);
                                    echo $tipe_split = implode("<br>",$tipe);
                                    
                                    @endphp
                                </p>
                                @else
                                <p class="text-xs font-weight-bold mb-0">-</p>
                                @endif
                                @if($i->no_mesin != null)
                                <hr class="mt-0 mb-2">
                                <p class="text-xs text-secondary mb-0">No Mesin/Pabrik:</p>
                                <p class="text-xs font-weight-bold mb-0">{{ $i->no_mesin }}</p>
                                @endif
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $i->asal_perolehan }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold text-success mb-0">{{ $i->kondisi_aset }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold text-info mb-0">@duit($i->harga)</p>
                            </td>
                            <td>
                                <a href="#"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                                <a href="#"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">delete</i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <hr class="mt-0">
                <div class="ml-4">
                    {{ $inventaris->withQueryString()->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>