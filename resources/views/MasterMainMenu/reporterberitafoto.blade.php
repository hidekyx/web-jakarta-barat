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
                <i class="fa fa-plus"></i> New Berita Foto
            </div>
            <form action="/masterberitafoto/store" method="post" class="add" enctype="multipart/form-data">
                <div class="card-block">
                    @csrf
                    <label for="basic-url" class="form-label">Pilih Kategori Berita</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Kategori</span>
                        <select class="form-control" required="required" name="catID" id="catID">
                            <option value="" selected disabled hidden>Pilih Kategori</option>
                            @foreach ($kat as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="basic-url" class="form-label">Input Judul Berita</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Judul</span>
                        <input type="text" class="form-control" required="required" placeholder="Ketik Disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="judul" name="judul">
                    </div>

                    <label for="basic-url" class="form-label">Input Lokasi</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">lokasi</span>
                        <input type="text" class="form-control" required="required" placeholder="Ketik Disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="lokasi" name="lokasi">
                    </div>

                    <label for="basic-url" class="form-label">Input Keterangan Berita</label>
                    <div>
                        <span class="input-group-text">Keterangan Berita</span>
                        <textarea class="form-control" name="keterangan" id="tiny"></textarea>
                    </div>
                    <br><br>

                    <label for="basic-url" class="form-label">Tanggal</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Tanggal</span>
                        <input type="date" class="form-control" placeholder="Tanggal" required="required" aria-label="Recipient's username" aria-describedby="basic-addon2" id="time" name="time">
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" name="file_utama" class="file file_utama_browse" accept="image/*">
                        <label for="basic-url" class="form-label">Upload Foto Utama</label>
                        <div class="input-group mb-3">
                            <button type="button" class="browse btn btn-primary" id="file_utama">Pilih File</button>
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file_utama_name">
                        </div>
                        <img src="https://placehold.it/80x80" width="50%" hidden="true" id="file_utama_preview" class="img-thumbnail">
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
                                <img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_2_preview" class="img-thumbnail">
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
                                <img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_3_preview" class="img-thumbnail">
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
                                <img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_4_preview" class="img-thumbnail">
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                    $(document).on("click", ".browse", function() {
                        var id_button = $(this).attr('id');
                        var class_browse = '.' + id_button + '_browse';
                        var file = $(this).parents().find(class_browse);
                        file.trigger("click");
                    });
                    $('input[type="file"]').change(function(e) {
                        var fileName = e.target.files[0].name;
                        var id = $(this).attr('name');
                        var id_filename = '#' + id + '_name';
                        var id_preview = id + '_preview';
                        $(id_filename).val(fileName);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById(id_preview).src = e.target.result;
                            document.getElementById(id_preview).hidden = false;
                        };
                        reader.readAsDataURL(this.files[0]);
                    });
                    </script>

                    <input id="private" type="hidden" name="published" value="N">

                    <div class="form-group">
                        <button type="submit" value="add" class="btn btn-submit btn-success">Simpan</button>
                     </div>
                </div>
            </form>
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

