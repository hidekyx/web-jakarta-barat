<section id="status">
<div class="footer-newsletter">
    <div class="container" data-aos="zoom-in">
    <div class="row justify-content-center">
        <div class="section-title pb-0">
            <h2>Cek Status</h2>
            <p>Apabila anda sudah mengajukan layanan, anda dapat mengecek status layanan menggunakan kode ticketing.</p>
        </div>
        <div class="col-lg-6 mb-5">
            <div id="cek-status">
                <input type="text" name="kode_layanan" id="kode_layanan"><input type="submit" value="Cek Status" id="cek">
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="info mb-5" id="detail_status" style="display: none;">
            <div class="row">
            <h6 class="label-head mb-3">Identitas Pemohon</h6>
            <div class="col-lg-6 col-12">    
                <div class="mb-3">
                    <p class="label-body mb-0">Nama</p>
                    <p id="status_nama_pemohon"></p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0">No. HP / Email</p>
                    <p id="status_kontak"></p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0">Instansi</p>
                    <p id="status_instansi"></p>
                </div>
            </div>
            <div class="col-lg-6 col-12">    
                <div class="mb-3 status_progress">
                    <p class="label-body mb-0">Status</p>
                    <b><span id="status_status"></span></b>
                    <a id="berita_acara" style="display: none;"><i class="bi bi-arrow-right"></i> Download File Berita Acara</a>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0">Tanggal Permohonan</p>
                    <p id="status_tanggal_permohonan">-</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0">Tanggal Selesai</p>
                    <p id="status_tanggal_selesai">-</p>
                </div>
            </div>
            <div id="selesai" style="display: none;">
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-12">    
                    <h6 class="label-head mb-3">Detail Layanan</h6>
                        <div class="mb-3">
                            <p class="label-body mb-0">Kategori Layanan</p>
                            <p id="status_kategori"></p>
                        </div>
                        <div class="mb-3">
                            <p class="label-body mb-0 label-deskripsi">Deskripsi</p>
                            <p id="status_deskripsi" class="mb-0"></p>
                            <ul style="padding: 0; list-style-type: none;" id="status_jenis"></ul>
                        </div>
                        <div class="mb-3">
                            <p class="label-body mb-0">Cakupan</p>
                            <p id="status_cakupan"></p>
                        </div>
                        <div class="mb-3 div-penanganan" style="display: none;">
                            <p class="label-body mb-0">Penanganan Yang Dilakukan</p>
                            <ul style="padding: 0; list-style-type: none;" id="status_penanganan"></ul>
                        </div>
                        <div class="mb-3 div-perangkat">
                            <p class="label-body mb-0">Perangkat Jaringan Yang Ditangani</p>
                            <ul style="padding: 0; list-style-type: none;" id="status_perangkat"></ul>
                        </div>
                        <div class="mb-3 div-barang">
                            <p class="label-body mb-0">Barang Pakai Habis</p>
                            <ul style="padding: 0; list-style-type: none;" id="status_barang"></ul>
                        </div>
                        <div class="mb-3 div-alat-kerja">
                            <p class="label-body mb-0">Alat Kerja</p>
                            <ul style="padding: 0; list-style-type: none;" id="status_alat"></ul>
                        </div>
                        <div class="mb-3 div-perangkat-kominfotik">
                            <p class="label-body mb-0">Perangkat Kominfotik</p>
                            <ul style="padding: 0; list-style-type: none;" id="status_perangkat_kominfotik"></ul>
                        </div>
                        <div class="mb-3 div-ip">
                            <p class="label-body mb-0">IP Address Yang Digunakan</p>
                            <p id="status_ip"></p>
                        </div>
                        <div class="mb-3 div-ringkasan">
                            <p class="label-body mb-0">Ringkasan Pekerjaan</p>
                            <p id="status_ringkasan"></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">    
                        <h6 class="label-head mb-3">Informasi Perwakilan</h6>
                        <div class="mb-3 div-teknisi">
                            <p class="label-body mb-0">Teknisi Yang Bertugas</p>
                            <ul style="padding: 0; list-style-type: none;" id="status_teknisi"></ul>
                        </div>
                        <div class="mb-3 div-perwakilan">
                            <p class="label-body mb-0">Nama Perwakilan</p>
                            <p id="status_perwakilan"></p>
                        </div>
                        <div class="mb-3 div-surat" style="display: none;">
                            <p class="label-body mb-0">Surat</p>
                            <p id="status_surat"></p>
                        </div>
                        <div class="mb-3 div-foto-hasil">
                            <h6 class="label-head">Foto Hasil</h6>
                            <p id="status_foto_hasil_null">-</p>
                            <img id="status_foto_hasil" hidden="true" height="260px" class="mb-3 mt-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</section>

@if($res['layanan'] != null)
@push('scripts')
<script>
$(document).ready(function(){
    $('#kode_layanan').prop("value", '{{ $res['layanan']['kode_layanan'] }}');
    $('#detail_status').fadeIn();
    $('#status_jenis li').remove();
    $('#status_penanganan li').remove();
    $('#status_perangkat li').remove();
    $('#status_alat li').remove();
    $('#status_perangkat_kominfotik li').remove();
    $('#status_barang li').remove();
    $('#status_ip').html('-');
    $('#status_teknisi li').remove();
    $('#status_ringkasan').html('-');
    $('#status_surat').html('-');
    $('#status_perwakilan').html('-');
    $('#status_perwakilan').html('-');
    $('#status_foto_hasil').prop('src', '').prop('hidden', true);
    $('#status_foto_hasil_null').show();
    $('#status_nama_pemohon').html('{{ $res['layanan']['nama_pemohon'] }}');
    $('#status_kontak').html('{{ $res['layanan']['kontak'] }}');
    $('#status_deskripsi').html('{{ $res['layanan']['deskripsi'] }}');
    $('#status_kategori').html('{{ $res['layanan']['kategori'] }}');
    $('#status_cakupan').html('{{ $res['layanan']['cakupan'] }}');

    @if($res['layanan']['status'] == "Selesai")
        $('#status_status').html('{{ $res['layanan']['status'] }}').removeClass().addClass('text-success');
        $('#berita_acara').show().prop('href', '{{ $res['detail']['berita_acara'] }}');
        $('#status_tanggal_selesai').html('{{ $res['layanan']['tanggal_selesai'] }}');
        $('#selesai').fadeIn();
        $('.div-perangkat').show();
        $('.div-barang').show();
        $('.div-alat-kerja').show();
        $('.div-perangkat-kominfotik').show();
        $('.div-ip').show();
        $('.div-ringkasan').show();
        $('.div-perwakilan').show();
        $('.div-foto-hasil').show();

        if('{{ $res['layanan']['kategori'] }}' == "Instalasi, Penambahan, dan Penataan Jaringan") {
            $('.div-penanganan').hide();
            $('.div-surat').fadeIn();
            $('.label-deskripsi').html("Deskripsi/Jenis Instalasi");
            let url_surat = "<a target='_blank' href='{{ asset('/storage/images/layanan/surat/'.$res['layanan']['file_surat']) }}'" + ">Download File Surat</a>";
            $('#status_surat').html("No Surat: " + '{{ $res['layanan']['no_surat'] }}' + "<br>Tanggal: " + '{{ $res['layanan']['tanggal_surat'] }}' + "<br>Perihal: " + '{{ $res['layanan']['perihal_surat'] }}' + "<br>" + url_surat);
        }
        else if('{{ $res['layanan']['kategori'] }}' == "Penanganan Permasalahan Jaringan") {
            $('.div-penanganan').fadeIn();
            $('.div-surat').hide();
            $('.label-deskripsi').html("Deskripsi/Jenis Permohonan");
            $.each(res['data']['penanganan'], function(key, value) {
                $('#status_penanganan').append("<li>- " + value['value'] + "</li>");
            });
        }
        $('#status_deskripsi').html('{{ $res['layanan']['deskripsi'] }}');
        $('#status_kategori').html('{{ $res['layanan']['kategori'] }}');
        $('#status_cakupan').html('{{ $res['layanan']['cakupan'] }}');

        $('#status_ringkasan').html('{{ $res['layanan']['penjelasan_pekerjaan'] }}');
        $('#status_perwakilan').html('{{ $res['layanan']['nama_perwakilan'] }}' + " (NIP: " + '{{ $res['layanan']['nip_perwakilan'] }}' +")");

        if('{{ $res['layanan']['foto_hasil'] }}' != null) {
            $('#status_foto_hasil').prop('src', '{{ asset('/storage/images/layanan/hasil/') }}' + '/' + '{{ $res['layanan']['foto_hasil'] }}').prop('hidden', false);
            $('#status_foto_hasil_null').hide();
        }

        $.each(@json($res['detail']['jenis']), function(key, value) {
            $('#status_jenis').append("<li>- " + value['value'] + "</li>");
        });
        $.each(@json($res['detail']['perangkat']), function(key, value) {
            $('#status_perangkat').append("<li>- " + value['value'] + "</li>");
        });

        @isset($res['detail']['barang_habis'])
        $.each(@json($res['detail']['barang_habis']), function(key, value) {
            $('#status_barang').append("<li>- " + value['nama_barang'] + ": " + value['terpakai'] + " " + value['satuan'] + "</li>");
        });
        @endisset

        @isset($res['detail']['alat_kerja'])
        $.each(@json($res['detail']['alat_kerja']), function(key, value) {
            $('#status_alat').append("<li>- " + value['value'] + "</li>");
        });
        @endisset

        @isset($res['detail']['perangkat_kominfotik'])
        $.each(@json($res['detail']['perangkat_kominfotik']), function(key, value) {
            $('#status_perangkat_kominfotik').append("<li>- " + value['value'] + " (S/N: " + value['value_2'] + ")</li>");
        });
        @endisset

        @isset($res['detail']['ip'])
        $.each(@json($res['detail']['ip']), function(key, value) {
            $('#status_ip').html(value['value'] + ' - ' + value['value_2']);
        });
        @endisset

        $.each(@json($res['detail']['teknisi']), function(key, value) {
            $('#status_teknisi').append("<li>- " + value['nama_lengkap'] + " (No HP: " + value['no_telp'] + ")</li>");
        });
    @elseif($res['layanan']['status'] == "Sedang Dikerjakan" || $res['layanan']['status'] == "Menunggu Validasi")
        $('#status_status').html("Sedang Dikerjakan").removeClass().addClass('text-info');
        $('#berita_acara').fadeOut();
        $('#selesai').fadeIn();
        $('#status_deskripsi').html('{{ $res['layanan']['deskripsi'] }}');
        $('#status_kategori').html('{{ $res['layanan']['kategori'] }}');
        $('#status_cakupan').html('{{ $res['layanan']['cakupan'] }}');
        $.each(@json($res['detail']['teknisi']), function(key, value) {
            $('#status_teknisi').append("<li>- " + value['nama_lengkap'] + " (No HP: " + value['no_telp'] + ")</li>");
        });
        $('.div-perangkat').hide();
        $('.div-barang').hide();
        $('.div-alat-kerja').hide();
        $('.div-perangkat-kominfotik').hide();
        $('.div-ip').hide();
        $('.div-ringkasan').hide();
        $('.div-perwakilan').hide();
        $('.div-surat').hide();
        $('.div-foto-hasil').hide();
        $('.div-penanganan').hide();
    @elseif($res['layanan']['status'] == "Menunggu Respon")
        $('#status_status').html("Sedang Proses").removeClass().addClass('text-warning');
        $('#berita_acara').fadeOut();
        $('#selesai').fadeIn();
        $('#status_deskripsi').html('{{ $res['layanan']['deskripsi'] }}');
        $('#status_kategori').html('{{ $res['layanan']['kategori'] }}');
        $('#status_cakupan').html('{{ $res['layanan']['status'] }}');
        $.each(@json($res['detail']['teknisi']), function(key, value) {
            $('#status_teknisi').append("<li>- " + value['nama_lengkap'] + " (No HP: " + value['no_telp'] + ")</li>");
        });
        $('.div-perangkat').hide();
        $('.div-barang').hide();
        $('.div-alat-kerja').hide();
        $('.div-perangkat-kominfotik').hide();
        $('.div-ip').hide();
        $('.div-ringkasan').hide();
        $('.div-perwakilan').hide();
        $('.div-surat').hide();
        $('.div-foto-hasil').hide();
        $('.div-penanganan').hide();
    @elseif($res['layanan']['status'] == "Belum Disposisi")
        $('#status_status').html("Menunggu Respon").removeClass().addClass('text-warning');
        $('#berita_acara').fadeOut();
        $('#selesai').fadeOut();
    @elseif($res['layanan']['status'] == "Dibatalkan")
        $('#status_status').html('{{ $res['layanan']['status'] }}').removeClass().addClass('text-danger');
        $('#berita_acara').fadeOut();
        $('#selesai').fadeOut();
    }
    @endif
    $('#status_instansi').html('{{ $res['detail']['instansi'] }}');
    $('#status_tanggal_permohonan').html('{{ $res['detail']['tanggal_permohonan'] }}');
});
</script>
@endpush
@endif

@push('scripts')
<script>
    $('#cek').click(function() {
        let kode_layanan = $('#kode_layanan').val();
        $.ajax({
            url: 'net-ticketing/status/' + kode_layanan,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let data = res['layanan'];
                $('#detail_status').fadeIn();
                $('#status_jenis li').remove();
                $('#status_penanganan li').remove();
                $('#status_perangkat li').remove();
                $('#status_alat li').remove();
                $('#status_perangkat_kominfotik li').remove();
                $('#status_barang li').remove();
                $('#status_ip').html('-');
                $('#status_teknisi li').remove();
                $('#status_ringkasan').html('-');
                $('#status_surat').html('-');
                $('#status_perwakilan').html('-');
                $('#status_perwakilan').html('-');
                $('#status_foto_hasil').prop('src', '').prop('hidden', true);
                $('#status_foto_hasil_null').show();
                $('#status_nama_pemohon').html(data['nama_pemohon']);
                $('#status_kontak').html(data['kontak']);
                if(data['status'] == "Selesai") {
                    $('#status_status').html(data['status']).removeClass().addClass('text-success');
                    $('#berita_acara').show().prop('href', res['data']['berita_acara']);
                    $('#status_tanggal_selesai').html(res['data']['tanggal_selesai']);
                    $('#selesai').fadeIn();
                    $('.div-perangkat').show();
                    $('.div-barang').show();
                    $('.div-alat-kerja').show();
                    $('.div-perangkat-kominfotik').show();
                    $('.div-ip').show();
                    $('.div-ringkasan').show();
                    $('.div-perwakilan').show();
                    $('.div-foto-hasil').show();

                    if(data['kategori'] == "Instalasi, Penambahan, dan Penataan Jaringan") {
                        $('.div-penanganan').hide();
                        $('.div-surat').fadeIn();
                        $('.label-deskripsi').html("Deskripsi/Jenis Instalasi");
                        let url_surat = "<a target='_blank' href='{{ asset('/storage/images/layanan/surat/') }}'" + data['file_surat'] + ">Download File Surat</a>";
                        $('#status_surat').html("No Surat: " + data['no_surat'] + "<br>Tanggal: " + data['tanggal_surat'] + "<br>Perihal: " + data['perihal_surat'] + "<br>" + url_surat);
                    }
                    else if(data['kategori'] == "Penanganan Permasalahan Jaringan") {
                        $('.div-penanganan').fadeIn();
                        $('.div-surat').hide();
                        $('.label-deskripsi').html("Deskripsi/Jenis Permohonan");
                        $.each(res['data']['penanganan'], function(key, value) {
                            $('#status_penanganan').append("<li>- " + value['value'] + "</li>");
                        });
                    }
                    $('#status_deskripsi').html(data['deskripsi']);
                    $('#status_kategori').html(data['kategori']);
                    $('#status_cakupan').html(data['cakupan']);

                    $('#status_ringkasan').html(data['penjelasan_pekerjaan']);
                    $('#status_perwakilan').html(data['nama_perwakilan'] + " (NIP: " + data['nip_perwakilan'] +")");

                    if(data['foto_hasil'] != null) {
                        $('#status_foto_hasil').prop('src', '{{ asset('/storage/images/layanan/hasil/') }}' + '/' + data['foto_hasil']).prop('hidden', false);
                        $('#status_foto_hasil_null').hide();
                    }

                    $.each(res['data']['jenis'], function(key, value) {
                        $('#status_jenis').append("<li>- " + value['value'] + "</li>");
                    });
                    $.each(res['data']['perangkat'], function(key, value) {
                        $('#status_perangkat').append("<li>- " + value['value'] + "</li>");
                    });
                    $.each(res['data']['barang_habis'], function(key, value) {
                        $('#status_barang').append("<li>- " + value['nama_barang'] + ": " + value['terpakai'] + " " + value['satuan'] + "</li>");
                    });
                    $.each(res['data']['alat_kerja'], function(key, value) {
                        $('#status_alat').append("<li>- " + value['value'] + "</li>");
                    });
                    $.each(res['data']['perangkat_kominfotik'], function(key, value) {
                        $('#status_perangkat_kominfotik').append("<li>- " + value['value'] + " (S/N: " + value['value_2'] + ")</li>");
                    });
                    $.each(res['data']['ip'], function(key, value) {
                        $('#status_ip').html(value['value'] + ' - ' + value['value_2']);
                    });
                    $.each(res['data']['teknisi'], function(key, value) {
                        $('#status_teknisi').append("<li>- " + value['nama_lengkap'] + " (No HP: " + value['no_telp'] + ")</li>");
                    });
                }
                else if(data['status'] == "Sedang Dikerjakan" || data['status'] == "Menunggu Validasi") {
                    $('#status_status').html("Sedang Dikerjakan").removeClass().addClass('text-info');
                    $('#berita_acara').fadeOut();
                    $('#selesai').fadeIn();
                    $('#status_deskripsi').html(data['deskripsi']);
                    $('#status_kategori').html(data['kategori']);
                    $('#status_cakupan').html(data['cakupan']);
                    $.each(res['data']['teknisi'], function(key, value) {
                        $('#status_teknisi').append("<li>- " + value['nama_lengkap'] + " (No HP: " + value['no_telp'] + ")</li>");
                    });
                    $('.div-perangkat').hide();
                    $('.div-barang').hide();
                    $('.div-alat-kerja').hide();
                    $('.div-perangkat-kominfotik').hide();
                    $('.div-ip').hide();
                    $('.div-ringkasan').hide();
                    $('.div-perwakilan').hide();
                    $('.div-surat').hide();
                    $('.div-foto-hasil').hide();
                    $('.div-penanganan').hide();
                }
                else if(data['status'] == "Menunggu Respon") {
                    $('#status_status').html("Menunggu Respon").removeClass().addClass('text-warning');
                    $('#berita_acara').fadeOut();
                    $('#selesai').fadeIn();
                    $('#status_deskripsi').html(data['deskripsi']);
                    $('#status_kategori').html(data['kategori']);
                    $('#status_cakupan').html(data['cakupan']);
                    $.each(res['data']['teknisi'], function(key, value) {
                        $('#status_teknisi').append("<li>- " + value['nama_lengkap'] + " (No HP: " + value['no_telp'] + ")</li>");
                    });
                    $('.div-perangkat').hide();
                    $('.div-barang').hide();
                    $('.div-alat-kerja').hide();
                    $('.div-perangkat-kominfotik').hide();
                    $('.div-ip').hide();
                    $('.div-ringkasan').hide();
                    $('.div-perwakilan').hide();
                    $('.div-surat').hide();
                    $('.div-foto-hasil').hide();
                    $('.div-penanganan').hide();
                }
                else if(data['status'] == "Belum Disposisi") {
                    $('#status_status').html("Menunggu Respon").removeClass().addClass('text-warning');
                    $('#berita_acara').fadeOut();
                    $('#selesai').fadeOut();
                }
                else if(data['status'] == "Dibatalkan") {
                    $('#status_status').html(data['status']).removeClass().addClass('text-danger');
                    $('#berita_acara').fadeOut();
                    $('#selesai').fadeOut();
                }
                $('#status_instansi').html(res['data']['instansi']);
                $('#status_tanggal_permohonan').html(res['data']['tanggal_permohonan']);
            },
            error: function(res){
                alert('Kode Ticketing tidak ditemukan!');
            }
        });
    });
</script>
@endpush