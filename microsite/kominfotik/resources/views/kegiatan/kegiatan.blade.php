<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Laporan Kegiatan Bulanan</h6>
        </div>
    </div>
    
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kegiatan</th>
                    @if ($id_role == "2")
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Validasi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach ($tenaga_terampil as $ta)
            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                    <div>
                        <img src="storage/images/foto/{{ $ta->foto }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $ta->nama_lengkap }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $ta->email }}</p>
                    </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $ta->jabatan->nama_jabatan }}</p>
                    <p class="text-xs text-secondary mb-0">{{ $ta->seksi->nama_seksi }}</p>
                </td>
                <td>
                    <a href="{{ asset('/kegiatan/view/'.$ta->username) }}"><button class="btn btn-sm bg-gradient-info mb-0 toast-btn" type="button" data-target="successToast">Detail</button></a>
                </td>
                @if ($id_role == "2")
                <td>
                    <a href="{{ asset('/kegiatan/validasi/'.$ta->username) }}"><button class="btn btn-sm bg-gradient-success mb-0 toast-btn" type="button" data-target="successToast">Validasi</button></a>
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
</div>