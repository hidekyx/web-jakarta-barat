<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    @foreach ($absensi as $a)
    <div class="card-header pb-0 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0">Edit Keterangan Absensi - {{ $a->user->nama_lengkap }}</h6>
        </div>
        
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/absensi/update_keterangan/'.$a->id_absensi); }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row px-2">
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
        <div class="container-zero">
        <div class="row form-libur">
            <div class="col-lg-2">
                <h6 class="text-dark text-sm ">Tanggal: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input disabled type="date" class="form-control" value="{{ $a->tanggal }}" required>
                </div>
            </div>
            
            <div class="col-lg-2">
                <h6 class="text-dark text-sm ">Status : </h6>
                <div class="input-group input-group-outline mb-3">
                <select class="form-control" name="status" required>
                    <option selected hidden value="{{ $a->status }}">{{ $a->status }}</option>
                    <option value="Masuk">Masuk</option>
                    <option value="Izin">Izin</option>
                    <option value="Cuti">Cuti</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Dinas Luar Penuh">Dinas Luar Penuh</option>
                    <option value="Dinas Luar Awal">Dinas Luar Awal</option>
                    <option value="Dinas Luar Akhir">Dinas Luar Akhir</option>
                </select>
                </div>
            </div>     
            <div class="col-lg-8">
                <h6 class="text-dark text-sm ">Keterangan: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="keterangan" type="text" class="form-control" value="{{ $a->keterangan }}">
                </div>
            </div>          
        </div>
        </div>
        <hr class="mt-1">
        <div class="text-left">
            <!-- <button type="submit" class="btn bg-gradient-info ml-2 mb-2 add-field">Tambah</button> -->
            <button type="submit" class="btn bg-gradient-primary ml-2 mb-2">Simpan</button>
        </div>
        </form>
        @endforeach
    </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var max_fields = 10;
        var wrapper = $(".container-zero");
        var add_button = $(".add-field");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div class="row form-libur" id="id-field"><div class="col-lg-2"><div class="input-group input-group-outline mb-3"><input name="tanggal[]" type="date" class="form-control" required></div></div><div class="col-lg-9"><div class="input-group input-group-outline mb-3"><input name="keterangan[]" type="text" class="form-control" required></div></div><div class="col-lg-1 mt-2"><a href="#" class="delete"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">delete</i></a></div></div>'); //add input box
                document.getElementById('id-field').setAttribute('id', x);;
            } else {
                alert('Anda telah mencapai batas input maksimal')
            }
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            document.getElementById(x).remove();
            x--;
        })
    });
</script>