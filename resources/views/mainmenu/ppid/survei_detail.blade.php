@extends('layouts.backendMainLayout')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="app-content content">
<div class="content-overlay"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <h5 class="mt-2">Daftar Responden Kuesioner</h5>
        <div class="card-block">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Nama Lengkap</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $data->nama_lengkap }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Jenis Kelamin</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $data->jenis_kelamin }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Tanggal Lahir</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('dddd, DD MMMM Y')}}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Tanggal Survei</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($data->tanggal_survei)->isoFormat('dddd, DD MMMM Y')}}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $data->email }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Pendidikan Terakhir</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $data->pendidikan_terakhir }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Pekerjaan</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $data->pekerjaan }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Pernah Mengajukan Permohonan PPID</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $data->pengajuan_permohonan }}" disabled>
                    </div>
                </div>
            </div>
            <div class="overflow-auto" style="height: 500px;">
                @foreach($pertanyaan as $key => $p)
                <div class="col-12 mb-2">
                    <label class="form-label">{{ $key+1 }}.) {{ $p->pertanyaan }}</label>
                    @if($p->jenis == "radio")
                        <div class="form-check mx-3">
                            <input id="jawaban_1[{{$key+1}}]" type="radio" class="form-check-input" disabled>Sangat Baik
                        </div>
                        <div class="form-check mx-3">
                            <input id="jawaban_2[{{$key+1}}]" type="radio" class="form-check-input" disabled>Baik
                        </div>
                        <div class="form-check mx-3">
                            <input id="jawaban_3[{{$key+1}}]" type="radio" class="form-check-input" disabled>Cukup Baik
                        </div>
                        <div class="form-check mx-3">
                            <input id="jawaban_4[{{$key+1}}]" type="radio" class="form-check-input" disabled>Tidak Baik
                        </div>
                    @elseif($p->jenis == "textarea")
                        <textarea class="form-control" style="height: 100px;" disabled>{{ $jawaban[$key+1] }}</textarea>
                    @endif
                </div>
                @endforeach
            </div>
            <script>
                var jumlah_jawaban = "{{ count($jawaban) }}";
                var jawaban = <?php echo json_encode($jawaban); ?>;
                for (let i = 0; i < jumlah_jawaban; i++) {
                    if(jawaban[i] == "Sangat Baik") {
                        document.getElementById("jawaban_1["+i+"]").checked = true;        
                    }
                    else if(jawaban[i] == "Baik") {
                        document.getElementById("jawaban_2["+i+"]").checked = true;        
                    }
                    else if(jawaban[i] == "Cukup Baik") {
                        document.getElementById("jawaban_3["+i+"]").checked = true;        
                    }
                    else if(jawaban[i] == "Tidak Baik") {
                        document.getElementById("jawaban_4["+i+"]").checked = true;        
                    }
                }
            </script>
            <a href="/layanan-info-publik/survei" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script><script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
