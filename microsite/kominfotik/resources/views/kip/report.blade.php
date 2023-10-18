<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    <div class="card-header bg-gradient-primary shadow-dark pb-3 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0 text-white">Laporan Penyelesaian Aktifitas Layanan KIP</h6>
        </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" id="ticketing" class="text-start" action="{{ asset('/kip/submit_report/'.$layanan->id_layanan_kip); }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row">
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
        </div>
        <div class="row">
            <div class="col-lg">    
                <h6 class="text-primary text-sm ">Identitas Pemohon: </h6>
                <div class="table-responsive">
                    <table class="table table-bordered" style="border-color: #f0f2f5;">
                        <tr class="text-sm font-weight-bold" style="background-color: #f0f2f5;">
                            <td>Nama</td>
                            <td>No. Telp / HP / Email</td>
                            <td>Instansi</td>
                        </tr>
                        <tr>
                            <td class="text-sm">{{ $layanan->nama_pemohon }}</td>
                            <td class="text-sm">{{ $layanan->no_hp_pemohon }}</td>
                            <td class="text-sm">{{ $layanan->instansi->nama_instansi }}</td>
                        </tr>
                        <tr class="text-sm font-weight-bold">
                            <td colspan="4" style="background-color: #f0f2f5;">Kategori</td>
                        </tr>
                        <tr style="border-width: 1px; border-color: #dee2e6;">
                            <td colspan="4" class="text-sm">{{ $layanan->kategori }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">
                        <div class="mb-3 text-sm">
                        <h6 class="text-primary text-sm">Pegawai Disposisi: </h6>
                        <ul>
                            @foreach ($layanan->layanan_kip_disposisi as $ld)
                                <li>{{ $ld->user->nama_lengkap }}</li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="mb-3 text-sm">
                            <h6 class="text-primary text-sm">Tanggal Permohonan: </h6>
                            {{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('dddd, DD MMMM Y')}}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg">
                <h6 class="text-primary text-sm">Data Layanan: </h6>
                <div class="table-responsive">
                <table class="table table-bordered" style="border-color: #f0f2f5;">
                    <tbody>
                    <tr class="d-flex">
                        <td class="text-sm col-4 font-weight-bold">Kategori</td>
                        <td class="text-sm col-8">{{ $layanan->kategori }}</td>
                    </tr>
                    @if($layanan->kategori == "Optimalisasi Komputer / Laptop" || $layanan->kategori == "Pemulihan Akun Pemerintahan Yang Diretas")
                    <tr class="d-flex" style="border-width: 1px; border-color: #dee2e6;">
                        <td class="text-sm col-4 font-weight-bold">Penjelasan Permasalahan</td>
                        <td class="text-sm col-8">
                            @php
                            $maxLength = 50;
                            
                            $penjelasan = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $layanan->penjelasan, 0, PREG_SPLIT_NO_EMPTY);
                            echo $penjelasan_split = implode("<br>",$penjelasan);
                            
                            @endphp
                        </td>
                    </tr>
                    @endif
                    </tbody>
                </table>
                </div>
                <h6 class="text-primary text-sm">Laporan Layanan: </h6>
                <div class="table-responsive">
                <table class="table table-bordered" style="border-color: #f0f2f5;">
                    <tbody>
                    <tr class="d-flex">
                        <td class="text-sm col-4 font-weight-bold">Laporan/Ringkasan<br> Hasil Pekerjaan</td>
                        <td class="text-sm col-8">
                            <div class="input-group input-group-outline mb-3">
                                @if($layanan->hasil_text != null)
                                <textarea class="form-control" name="hasil_text" maxlength="500" rows="4" placeholder="Tuliskan Hasil Pekerjaan" required>{{ $layanan->hasil_text }}</textarea>
                                @else
                                <textarea class="form-control" name="hasil_text" maxlength="500" rows="4" placeholder="Tuliskan Hasil Pekerjaan" required></textarea>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class="text-sm col-4 font-weight-bold">Link</td>
                        <td class="text-sm col-8">
                            <div class="input-group input-group-outline mb-3">
                                @if($layanan->link != null)
                                <input name="link" type="text" class="form-control" value="{{ $layanan->link }}">
                                @else
                                <input name="link" type="text" class="form-control" placeholder="Sediakan link apabila ada">
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class="text-sm col-4 font-weight-bold">Alat Kerja</td>
                        <td class="text-sm col-8">
                            <select class="selectpicker alat_kerja w-100" data-size="10" title="Pilih Alat Kerja" name="alat_kerja[]" multiple required>
                                <option value="Kamera Video">Kamera Video</option>
                                <option value="Kamera Foto">Kamera Foto</option>
                                <option value="Tripod">Tripod</option>
                                <option value="Monopod">Monopod</option>
                                <option value="Gun Mic">Gun Mic</option>
                                <option value="Mic Clip-on">Mic Clip-on</option>
                                <option value="Lighting">Lighting</option>
                                <option value="Voice Recorder">Voice Recorder</option>
                                <option value="Switcher">Switcher</option>
                                <option value="Audio Mixer">Audio Mixer</option>
                                <option value="Wireless HDMI">Wireless HDMI</option>
                                <option value="Software Editing">Software Editing</option>
                                <option value="Software Desain Grafis">Software Desain Grafis</option>
                            </select>
                            <script>
                                var alat_kerja = @json(explode(', ', $layanan->alat_kerja));
                                $('.alat_kerja').selectpicker('val', alat_kerja);
                            </script>
                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class="text-sm col-4 font-weight-bold">Laporan Hasil<br> File PDF</td>
                        <td class="text-sm col-8">
                            <div class="input-group input-group-outline mt-2">
                                <input name="hasil_file" type="file" accept=".pdf">
                            </div>
                            @if($layanan->hasil_file != null)
                            <a class="text-info font-weight-bold" target="_blank" href="{{ asset('/storage/layanan/kip/hasil_file/'.$layanan->hasil_file) }}">Lihat Laporan File PDF</a>
                            @endif
                        </td>
                    </tr>
                    <tr class="d-flex">
                        <td class="text-sm col-4 font-weight-bold">Foto Hasil</td>
                        <td class="col-8">
                            <input name="hasil_image" type="file" id="img" hidden="true" accept="image/*" onchange="gambar_upload(this.value)">
                            <label for="img" class="btn btn-info my-0">Upload Gambar</label>
                            <script type="text/javascript">
                                function gambar_upload(val)
                                {
                                    filename = val.split('\\').pop().split('/').pop();
                                    var src = URL.createObjectURL(event.target.files[0]);
                                    var preview = document.getElementById("file-ip-1-preview");
                                    preview.src = src;
                                    preview.hidden = false;
                                    preview.style.display = "block";
                                }
                            </script>
                            <br>
                            @if($layanan->hasil_file != null)
                            <img id="file-ip-1-preview" src="{{ asset('/storage/layanan/kip/hasil_image/'.$layanan->hasil_image) }}" height="160px" class="mb-3 mt-2">
                            @else
                            <img id="file-ip-1-preview" height="160px" class="mb-3 mt-2" style="display: none;">
                            @endif
                        </td>
                    </tr>
                    <tr style="border-width: 1px; border-color: #dee2e6;">
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>        
        <hr class="my-3">
        <div class="text-left">
            <!-- <button type="button" class="btn bg-gradient-primary mb-2" id="simpan" data-toggle="modal" data-target="#submitid{{ $layanan->id_layanan }}">Simpan</button> -->
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            <!-- Modal Submit -->
            <div class="modal fade" id="submitid{{ $layanan->id_layanan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Simpan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span>Setelah simpan anda tidak akan bisa merubah data lagi, lanjutkan?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>