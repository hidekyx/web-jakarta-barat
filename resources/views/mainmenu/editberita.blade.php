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
		<div class="content-header row">
		</div>
		<div class="content-body">
			<div class="card-header">
				<i class="fa fa-plus"></i> Edit Berita
			</div>
			<hr style="margin-top: -12px; margin-bottom: 25px;">
			@foreach($editberita as $p)
			<form action="/masterberita/update/{{ $p->id }}" method="post" class="add" enctype="multipart/form-data">
				<div class="card-block">
					@csrf
					<label for="basic-url" class="form-label">Pilih Kategori Berita</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Kategori</span>
						<select required="required" class="form-control" name="catID" id="catID">
							@foreach ($post as $item)
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
						<span class="input-group-text">Judul Berita</span>
						<input type="text" class="form-control" required="required" value="{{ $p->title }}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="title" name="title">
					</div>

					<div>
						<span class="input-group-text">Isi Berita</span>
						<textarea class="form-control" name="content" id="tiny">
							{!! $p->content !!}
						</textarea>
					</div><br><br>

					<label for="basic-url" class="form-label">Tanggal Berita</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Tanggal</span>
						<input type="date" class="form-control" value="{{ $p->time }}" placeholder="Time" required="required" aria-label="Recipient's username" aria-describedby="basic-addon2" id="time" name="time">
					</div>

					<label for="basic-url" class="form-label">Input Tags</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Penanda</span>
						<select class="form-control selectpicker " title="Pilih Tags" name="tags[]" data-live-search="true" data-size="4" multiple>
						@if($p->tags != null || $p->tags != "")
						<option selected value="{{ $p->tags }}">Tag Sekarang: {{ ucwords($p->tags) }}</option>
						@endif
							@foreach($tags as $t)
								<option value="{{ $t->desc }}">{{ ucwords($t->desc) }}</option>
							@endforeach
						</select>
					</div>
					
					<script>
						$(document).ready(function(){
							$('select[name=tags]').val(1);
   							$('select[name=tags]').change();
						});
					</script>

					<div class="input-group mb-3">
						<input type="file" name="file_utama" id="file_submitted_utama" class="file file_utama_browse" accept="image/*">
						<label for="basic-url" class="form-label">Upload Foto Utama</label>
						<div class="input-group mb-3">
							<button type="button" class="browse btn btn-primary" id="file_utama">Pilih File</button>
							<input type="text" class="form-control" disabled placeholder="Upload File" id="file_utama_name">
							<button type="button" class="btn-delete btn btn-danger" id="delete_file_utama">Hapus Foto</button>
						</div>
						<input type="hidden" id="delete_file_utama_bool" name="delete_file_utama_bool" value="false">
						@if($p->img != null || $p->img != "")
							<img src="{{  asset('storage/berita/'.$p->img)  }}" width="50%" id="file_utama_preview" class="img-thumbnail">
						@else
							<img src="https://placehold.it/80x80" width="50%" hidden="true" id="file_utama_preview" class="img-thumbnail">
						@endif			
					</div>

					<div class="row">
						<div class="col">
							<div class="input-group mb-3">
								<input type="file" name="file_2" id="file_submitted_2" class="file file_2_browse" accept="image/*">
								<label for="basic-url" class="form-label">Upload Foto #2</label>
								<div class="input-group mb-3">
									<button type="button" class="browse btn btn-primary" id="file_2">Pilih File</button>
									<input type="text" class="form-control" disabled placeholder="Upload File" id="file_2_name">
									<button type="button" class="btn-delete btn btn-danger" id="delete_file_2">Hapus Foto</button>
								</div>
								<input type="hidden" id="delete_file_2_bool" name="delete_file_2_bool" value="false">
								@if($p->img_2 != null || $p->img_2 != "")
									<img src="{{  asset('storage/berita/'.$p->img_2)  }}" width="80%" id="file_2_preview" class="img-thumbnail">
								@else
									<img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_2_preview" class="img-thumbnail">
								@endif
							</div>
						</div>
						<div class="col">
							<div class="input-group mb-3">
								<input type="file" name="file_3" id="file_submitted_3" class="file file_3_browse" accept="image/*">
								<label for="basic-url" class="form-label">Upload Foto #3</label>
								<div class="input-group mb-3">
									<button type="button" class="browse btn btn-primary" id="file_3">Pilih File</button>
									<input type="text" class="form-control" disabled placeholder="Upload File" id="file_3_name">
									<button type="button" class="btn-delete btn btn-danger" id="delete_file_3">Hapus Foto</button>
								</div>
								<input type="hidden" id="delete_file_3_bool" name="delete_file_3_bool" value="false">
								@if($p->img_3 != null || $p->img_3 != "")
									<img src="{{  asset('storage/berita/'.$p->img_3)  }}" width="80%" id="file_3_preview" class="img-thumbnail">
								@else
									<img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_3_preview" class="img-thumbnail">
								@endif
							</div>
						</div>
						<div class="col">
							<div class="input-group mb-3">
								<input type="file" name="file_4" id="file_submitted_4" class="file file_4_browse" accept="image/*">
								<label for="basic-url" class="form-label">Upload Foto #4</label>
								<div class="input-group mb-3">
									<button type="button" class="browse btn btn-primary" id="file_4">Pilih File</button>
									<input type="text" class="form-control" disabled placeholder="Upload File" id="file_4_name">
									<button type="button" class="btn-delete btn btn-danger" id="delete_file_4">Hapus Foto</button>
								</div>
								<input type="hidden" id="delete_file_4_bool" name="delete_file_4_bool" value="false">
								@if($p->img_4 != null || $p->img_4 != "")
									<img src="{{  asset('storage/berita/'.$p->img_4)  }}" width="80%" id="file_4_preview" class="img-thumbnail">
								@else
									<img src="https://placehold.it/80x80" width="80%" hidden="true" id="file_4_preview" class="img-thumbnail">
								@endif
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
						var id_delete_bool = '#delete_' + id + '_bool';
						$(id_filename).val(fileName);

						var reader = new FileReader();
						reader.onload = function(e) {
							document.getElementById(id_preview).src = e.target.result;
							document.getElementById(id_preview).hidden = false;
							$(id_delete_bool).val('false');
							$(id_filename).val('');
						};
						reader.readAsDataURL(this.files[0]);
					});
					$(".btn-delete").click(function(){
						var id_button = $(this).attr('id');
						if(id_button == "delete_file_utama") {
							$('#file_utama_preview').removeAttr('src');
							document.getElementById('file_utama_preview').hidden = true;
							$('#delete_file_utama_bool').val('true');
						}
						else if(id_button == "delete_file_2") {
							$('#file_2_preview').removeAttr('src');
							document.getElementById('file_2_preview').hidden = true;
							$('#delete_file_2_bool').val('true');
						}
						else if(id_button == "delete_file_3") {
							$('#file_3_preview').removeAttr('src');
							document.getElementById('file_3_preview').hidden = true;
							$('#delete_file_3_bool').val('true');
						}
						else if(id_button == "delete_file_4") {
							$('#file_4_preview').removeAttr('src');
							document.getElementById('file_4_preview').hidden = true;
							$('#delete_file_4_bool').val('true');
						}
					});
					</script>

					<label for="basic-url" class="form-label">Upload Video</label>
					<div class="input-group mb-3">
						<input type="file" class="form-control" id="video" value="{{ $p->video }}" name="video">
						<label class="input-group-text" for="uploadberita">Upload</label>
					</div>

					<label for="basic-url" class="form-label">Input Keterangan Gambar</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Caption Gambar</span>
						<input type="text" class="form-control" required="required" value="{{ $p->caption }}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="caption" name="caption">
					</div>

					<label for="basic-url" class="form-label">Status Publikasi</label>
					<div class="input-group mb-3 d-flex">
						<div style="margin-right: 10%">
							<input id="private" type="radio" name="published"
							@if ($p->published == 'N')
								checked
							@endif
							value="N">
							<label for="private">Un-Publish</label>
						</div>
						<div>
							<input id="public" type="radio" name="published"
							@if ($p->published == 'Y')
								checked
							@endif
							value="Y">
							<label for="public">Publish</label>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" value="Simpan Data" class="btn btn-submit btn-success">Simpan</button>
						<a href="/menuberita" class="btn btn-submit btn-primary">Kembali</a>
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

