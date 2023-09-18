<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Daftar Unit Kerja - Jakarta Barat</h6>
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
        <div class="col-lg-12">
            <a href="{{ asset('/instansi/tambah') }}"><button class="btn btn-sm btn-info">Tambah Data</button></a>
        </div>
        <div class="col-lg-12">
            <form role="form" class="text-start">
                <div class="row">
                    <div class="col-lg-4 col-8 mb-3">
                        <h6 class="text-dark text-sm ">Nama Instansi: </h6>
                        <div class="input-group input-group-outline">
                            <input name="nama_instansi" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <h6 class="text-sm" style="visibility: hidden;">Cari</h6>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="table-responsive p-0">
                <table id="datatable" class="table table-hover align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 w-2">No</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Nama Instansi</th>
                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instansi as $key => $i)
                        <tr>
                            <td>
                                <p class="text-xs font-weight-bold mb-0 ps-3">{{ $key+1 }}</p>
                            </td>
                            <td>
                                @if($i->status == "Aktif")
                                <span class="badge w-100 badge-sm bg-gradient-success">{{ $i->status }}</span>
                                @else
                                <span class="badge w-100 badge-sm bg-gradient-danger">{{ $i->status }}</span>
                                @endif
                            </td>
                            <td style="width: 80%;">
                                <p class="text-xs font-weight-bold mb-0">{{ $i->nama_instansi }}</p>
                            </td>
                            <td>
                                <a href="{{ asset('/instansi/edit/'.$i->id_instansi) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                                @if($i->status == "Aktif")
                                <form role="form" class="text-start" action="{{ asset('/instansi/nonaktif/'.$i->id_instansi) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <button class="btn-link" type="submit"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Nonaktifkan">block</i></button>
                                </form>
                                @else
                                <form role="form" class="text-start" action="{{ asset('/instansi/aktif/'.$i->id_instansi) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <button class="btn-link" type="submit"><i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Aktifkan">lock_open</i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <hr class="mt-0">
                <div class="ml-4">
                    {{ $instansi->withQueryString()->links() }}
                </div>
                <style>
                    .btn-link {
                    border: none;
                    outline: none;
                    background: none;
                    cursor: pointer;
                    color: #0000EE;
                    padding: 0;
                    text-decoration: underline;
                    font-family: inherit;
                    font-size: inherit;
                }
                </style>
                </div>
            </div>
        </div>
    </div>
</div>
</div>