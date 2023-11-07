<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data PPID</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">PPID</li>
            <li class="breadcrumb-item">@unlink($subpage)</li>
            <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data - @unlink($subpage)</h5>
                <form class="row g-3 needs-validation" id="form-layanan-publik" method="post" action="{{ asset('dashboard/ppid/'.$subpage.'/simpan_informasi') }}" enctype="multipart/form-data" novalidate>
                @csrf
                    <input type="hidden" value="{{ $data_ppid->value ? 'update' : 'save' }}" name="submit_form">
                    <input type="hidden" value="{{ $data_ppid->id_ppid }}" name="id_ppid">
                    @if($data_ppid->id_pivot)
                    <input type="hidden" value="{{ $data_ppid->id_pivot }}" name="id_pivot">
                    @endif
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori PPID" value="@unlink($subpage) - {{ $data_ppid->isi }}" required disabled>
                            <label for="kategori">Data PPID</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="judul" class="form-label">Pilih Salah Satu</label>
                        <select class="form-control" name="type" id="type">
                            @if($data_ppid->type)
                            <option value="{{ $data_ppid->type }}" selected hidden>{{ $data_ppid->type }}</option>
                            @endif
                            <option value="Link">Link</option>
                            <option value="File">File</option>
                        </select>
                    </div>
                    @if($data_ppid->type)
                    <div class="col-md-12 position-relative" style="display: {{ $data_ppid->type == 'Link' ? 'block' : 'none'}};" id="form_link_container">
                    @else
                    <div class="col-md-12 position-relative" style="display: block" id="form_link_container">
                    @endif
                        <label for="judul" class="form-label">Link</label>
                        <input type="text" class="form-control" id="form_link" name="value" placeholder="Isi link terkait data informasi publik" value="{{ $data_ppid->value ? $data_ppid->value : ''}}" required>
                        <div class="invalid-tooltip">
                            Isi link terkait data informasi publik
                        </div>
                    </div>
                    <div class="col-md-12 position-relative" style="display: {{ $data_ppid->type == 'File' ? 'block' : 'none'}};" id="form_file_container">
                        <label for="file" class="col-sm-2 p-0 mb-2 col-form-label">File</label>
                        <input class="form-control mb-2" type="file" id="form_file" name="value" accept=".pdf" required>
                        <div class="invalid-tooltip">
                            Isi file terkait data informasi publik
                        </div>
                        @if($data_ppid->type == "File")
                        File Asli: <i><a href="{{ asset('storage/files/images/foto/ppid_daftar_informasi_publik/'.$data_ppid->value) }}" target="_blank">{{ $logged_user->nama }} - {{ $data_ppid->isi }}</a></i>
                        @endif
                    </div>
                    @push('scripts')
                    <script>
                        $('select').on('change', function() {
                            if (this.value == 'File') {
                                $('#form_file_container').show();
                                $('#form_file').prop('required', true);

                                $('#form_link_container').hide();
                                $('#form_link').removeAttr('required');
                            }
                            else if (this.value == 'Link') {
                                $('#form_link_container').show();
                                $('#form_link').prop('required', true);

                                $('#form_file_container').hide();
                                $('#form_file').removeAttr('required');
                            }
                        });
                        $(document).ready(function() {
                            if ($('#type').val() == 'File') {
                                $('#form_file_container').show();
                                $('#form_file').prop('required', true);

                                $('#form_link_container').hide();
                                $('#form_link').removeAttr('required');
                            }
                            else if ($('#type').val() == 'Link') {
                                $('#form_link_container').show();
                                $('#form_link').prop('required', true);

                                $('#form_file_container').hide();
                                $('#form_file').removeAttr('required');
                            }
                        });
                    </script>
                    @endpush
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</main>