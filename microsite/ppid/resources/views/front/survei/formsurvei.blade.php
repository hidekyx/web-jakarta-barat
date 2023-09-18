<div class="container-fluid wow fadeInUp" data-wow-delay="0.3s">
    <div class="container">
    <form action="{{ asset('/survei/submit'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="row">
        @if(session('errors'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            @foreach ($errors->all() as $error)
            <span class="text-sm">{{ $error }}</span>
            @endforeach
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <span class="text-sm">{{ Session::get('success') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h4>Form Identitas</h4>
        <div class="col-lg-6 col-12 mb-4">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-0 bg-light px-4" required="required" placeholder="Input Nama" name="nama_lengkap" style="height: 55px;" maxLength="100">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="input-group mb-2">
                        <select class="form-control border-0 bg-light px-4" name="jenis_kelamin" style="height: 55px;" required="required">
                            <option hidden selected>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Email</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control border-0 bg-light px-4" required="required" placeholder="Input Email" name="email" style="height: 55px;" maxLength="100">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Tanggal Lahir</label>
                    <div class="input-group mb-2">
                        <input type="date" class="form-control border-0 bg-light px-4" required="required" placeholder="Input Tanggal Lahir" name="tanggal_lahir" style="height: 55px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Pendidikan Terakhir</label>
                    <div class="input-group mb-2">
                        <select class="form-control border-0 bg-light px-4" name="pendidikan_terakhir" style="height: 55px;" required="required">
                            <option hidden selected>Pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP/MTs">SMP/MTs</option>
                            <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Pekerjaan</label>
                    <div class="input-group mb-2">
                        <select class="form-control border-0 bg-light px-4" name="pekerjaan" style="height: 55px;" required="required">
                            <option hidden selected>Pekerjaan</option>
                            <option value="Siswa/mahasiswa">Siswa/Mahasiswa</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI">TNI</option>
                            <option value="POLRI">POLRI</option>
                            <option value="BUMN">BUMN</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label">Apakah anda sudah pernah mengajukan permohonan informasi publik di PPID Kota Administrasi Jakarta Barat?</label>
                    <div class="input-group">
                        <div class="form-check mx-3">
                            <input type="checkbox" class="form-check-input" name="pengajuan_permohonan" value="Sudah">Sudah
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
        <h4>Pertanyaan Kuesioner</h4>
            <div class="overflow-auto" style="height: 500px;">
                @foreach($pertanyaan as $key => $p)
                <div class="col-12 mb-4">
                    <label class="form-label">{{ $key+1 }}.) {{ $p->pertanyaan }}</label>
                    @if($p->jenis == "radio")
                    <div class="form-check mx-3">
                        <input type="radio" class="form-check-input" name="jawaban[{{$key+1}}]" value="Sangat Baik" required>Sangat Baik
                    </div>
                    <div class="form-check mx-3">
                        <input type="radio" class="form-check-input" name="jawaban[{{$key+1}}]" value="Baik" required>Baik
                    </div>
                    <div class="form-check mx-3">
                        <input type="radio" class="form-check-input" name="jawaban[{{$key+1}}]" value="Cukup Baik" required>Cukup Baik
                    </div>
                    <div class="form-check mx-3">
                        <input type="radio" class="form-check-input" name="jawaban[{{$key+1}}]" value="Tidak Baik" required>Tidak Baik
                    </div>
                    @elseif($p->jenis == "textarea")
                    <textarea class="form-control border-0 bg-light px-4" style="height: 100px;" required="required" name="jawaban[{{$key+1}}]"></textarea>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="col-12 mt-4">
                <button class="btn btn-primary w-100 py-3" type="submit">Kirim Data Survei</button>
            </div>
        </div>
    </div>
    </form>
    </div>
</div>