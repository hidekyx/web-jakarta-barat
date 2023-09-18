@extends('layouts.backendMainLayout')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<style>
.file {
  visibility: hidden;
  position: absolute;
}
</style>
<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body">
            <div class="card-header">
                <i class="fa fa-plus"></i> Edit Berita Foto
            </div>
            @foreach($editberitafoto as $p)
            <form action="/masterberitafoto/update/{{$p->id}}" method="post" class="add" enctype="multipart/form-data">
                <div class="card-block">
            @csrf
                    <label for="basic-url" class="form-label">Pilih Kategori Berita</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Kategori</span>
                        <select class="form-control" required="required" name="catID" id="catID">
                            @foreach ($kat as $item)
                            @if($item->id == $p->catID)
                                <option value="{{ $item->id }}" selected>{{ $item->kategori }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <label for="basic-url" class="form-label">Input Judul Berita</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Judul</span>
                        <input type="text" class="form-control" required="required" value="{{ $p->judul }}" placeholder="Judul Berita" aria-label="Recipient's username" aria-describedby="basic-addon2" id="judul" name="judul">
                    </div>

                    <label for="basic-url" class="form-label">Input Lokasi</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">lokasi</span>
                        <input type="text" class="form-control" required="required" value="{{ $p->lokasi }}" placeholder="Ketik Disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="lokasi" name="lokasi">
                    </div>

                    <label for="basic-url" class="form-label">Input Keterangan Berita</label>
                    <div>
                        <span class="input-group-text">Keterangan Berita</span>
                        <textarea class="form-control" name="keterangan" id="tiny">{!! $p->keterangan !!}</textarea>
                    </div>
                    
                    <br><br>

                    <label for="basic-url" class="form-label">Tanggal</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Tanggal</span>
                        <input type="date" class="form-control" placeholder="Tanggal" value="{{ $p->time }}" required="required" aria-label="Recipient's username" aria-describedby="basic-addon2" id="time" name="time">
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" name="file_utama" class="file file_utama_browse" accept="image/*">
                        <label for="basic-url" class="form-label">Upload Foto Utama</label>
                        <div class="input-group mb-3">
                            <button type="button" class="browse btn btn-primary" id="file_utama">Pilih File</button>
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file_utama_name">
                        </div>
                        @if($p->img != null || $p->img != "")
                        <img src="{{  asset('storage/beritafoto/'.$p->img)  }}" width="50%" id="file_utama_preview" class="img-thumbnail">
                        @else
                        <img src="https://placehold.it/80x80" width="50%" hidden="true" id="file_utama_preview" class="img-thumbnail">
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="file" name="file_2" class="file file_2_browse" accept="image/*">
                                <label for="basic-url" class="form-label">Upload Foto #2</label>
                                    <div class="input-group mb-3">
                                        <button type="button" class="browse btn btn-primary" id="file_2">Pilih File</button>
                                        <input type="text" class="form-control" disabled placeholder="Upload File" id="file_2_name">
                                    </div>
                                    @if($p->img_2 != null || $p->img_2 != "")
                                    <img src="{{  asset('storage/beritafoto/'.$p->img_2)  }}" width="80%" id="file_2_preview" class="img-thumbnail">
                                    @else
                                    <img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_2_preview" class="img-thumbnail">
                                    @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="file" name="file_3" class="file file_3_browse" accept="image/*">
                                <label for="basic-url" class="form-label">Upload Foto #3</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="browse btn btn-primary" id="file_3">Pilih File</button>
                                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file_3_name">
                                </div>
                                @if($p->img_3 != null || $p->img_3 != "")
                                <img src="{{  asset('storage/beritafoto/'.$p->img_3)  }}" width="80%" id="file_3_preview" class="img-thumbnail">
                                @else
                                <img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_3_preview" class="img-thumbnail">
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="file" name="file_4" class="file file_4_browse" accept="image/*">
                                <label for="basic-url" class="form-label">Upload Foto #4</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="browse btn btn-primary" id="file_4">Pilih File</button>
                                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file_4_name">
                                </div>
                                @if($p->img_4 != null || $p->img_4 != "")
                                <img src="{{  asset('storage/beritafoto/'.$p->img_4)  }}" width="80%" id="file_4_preview" class="img-thumbnail">
                                @else
                                <img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_4_preview" class="img-thumbnail">
                                @endif
                            </div>
                        </div>
                    </div>

                    <input id="private" type="hidden" name="published" value="N">
                        <div class="form-group">
                            <button type="submit" class="btn btn-submit btn-success">Simpan</button>
                            <a href="/menuberitafoto" class="btn btn-submit btn-primary">Kembali</a>
                        </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script><script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $('textarea#tiny').tinymce({
        height: 200,
        menubar: false,
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });
</script>
@endsection

