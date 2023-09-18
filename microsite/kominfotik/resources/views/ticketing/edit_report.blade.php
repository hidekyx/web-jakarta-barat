@include('ticketing.report')
<script>
    var penjelasan_pekerjaan = '{{ $layanan->penjelasan_pekerjaan }}';
    var nama_perwakilan = '{{ $layanan->nama_perwakilan }}';
    var nip_perwakilan = '{{ $layanan->nip_perwakilan }}';
    var tanda_tangan = '{{ asset('/storage/images/layanan/ttd/'.$layanan->tanda_tangan) }}';
    var foto_hasil = '{{ asset('/storage/images/layanan/hasil/'.$layanan->foto_hasil) }}';
    var detail = @json($detail);
    var kategori = '{{ $kategori }}';
    var form_action = '{{ asset('/ticketing/update_report/'.$layanan->id_layanan); }}';
    if(kategori == "Report Penanganan") {
        $("input.penanganan:checkbox").prop('required', false);
        for (let i = 0; i < detail['penanganan'].length; i++) {
            if(detail['penanganan'][i] == "Setting IP Address") { $('#penanganan_1').prop("checked", true); }
            else if(detail['penanganan'][i] == "Cek jalur kabel") { $('#penanganan_2').prop("checked", true); }
            else if(detail['penanganan'][i] == "Cek perangkat jaringan") { $('#penanganan_3').prop("checked", true); }
            else if(detail['penanganan'][i] == "Cek koneksi") { $('#penanganan_4').prop("checked", true); }
            else if(detail['penanganan'][i] == "Crimping kabel UTP") { $('#penanganan_5').prop("checked", true); }
            else if(detail['penanganan'][i] == "Penarikan kabel UTP") { $('#penanganan_6').prop("checked", true); }
            else if(detail['penanganan'][i] == "Konfigurasi perangkat") { $('#penanganan_7').prop("checked", true); }
            else if(detail['penanganan'][i] == "Pasang perangkat jaringan") { $('#penanganan_8').prop("checked", true); }
            else if(detail['penanganan'][i] == "Melaporkan ke dinas atau vendor") { $('#penanganan_9').prop("checked", true); }
            else { $('#penanganan_10').prop("checked", true); $('#penanganan_lainnya').collapse('show'); $('#penanganan_lainnya_form').addClass('focused').addClass('is-focused'); $('#penanganan_lainnya_text').prop('required', true).prop("value", detail['penanganan'][i]); }
        }
    }

    $("input.perangkat:checkbox").prop('required', false);
    for (let i = 0; i < detail['perangkat'].length; i++) {
        if(detail['perangkat'][i] == "Modem") { $('#perangkat_1').prop("checked", true); }
        else if(detail['perangkat'][i] == "Catalyst") { $('#perangkat_2').prop("checked", true); }
        else if(detail['perangkat'][i] == "Wifi Router") { $('#perangkat_3').prop("checked", true); }
        else if(detail['perangkat'][i] == "Access Point") { $('#perangkat_4').prop("checked", true); }
        else if(detail['perangkat'][i] == "Router") { $('#perangkat_5').prop("checked", true); }
        else if(detail['perangkat'][i] == "Switch/HUB") { $('#perangkat_6').prop("checked", true); }
        else { $('#perangkat_7').prop("checked", true); $('#perangkat_lainnya').collapse('show'); $('#perangkat_lainnya_form').addClass('focused').addClass('is-focused'); $('#perangkat_lainnya_text').prop('required', true).prop("value", detail['perangkat'][i]); }
    }

    $("input.alat_kerja:checkbox").prop('required', false);
    for (let i = 0; i < detail['alat_kerja'].length; i++) {
        if(detail['alat_kerja'][i] == "Tang Crimping") { $('#alat_kerja_1').prop("checked", true); }
        else if(detail['alat_kerja'][i] == "Tester Kabel") { $('#alat_kerja_2').prop("checked", true); }
        else if(detail['alat_kerja'][i] == "Laptop") { $('#alat_kerja_3').prop("checked", true); }
        else if(detail['alat_kerja'][i] == "Obeng") { $('#alat_kerja_4').prop("checked", true); }
        else if(detail['alat_kerja'][i] == "Tangga") { $('#alat_kerja_5').prop("checked", true); }
        else if(detail['alat_kerja'][i] == "Senter") { $('#alat_kerja_6').prop("checked", true); }
        else if(detail['alat_kerja'][i] == "Bor") { $('#alat_kerja_7').prop("checked", true); }
        else { $('#alat_kerja_8').prop("checked", true); $('#alat_kerja_lainnya').collapse('show'); $('#alat_kerja_lainnya_form').addClass('focused').addClass('is-focused'); $('#alat_kerja_lainnya_text').prop('required', true).prop("value", detail['alat_kerja'][i]); }
    }
    
    $("input.barang_habis:checkbox").prop('required', false);
    if (detail['barang_habis']['nama_barang'].length == 0) {
        $('#tidak_pakai_barang_habis').prop("checked", true);
    }
    else {
        for (let i = 0; i < detail['barang_habis']['nama_barang'].length; i++) {
            $('#barang_habis_' + detail['barang_habis']['nama_barang'][i]).prop("checked", true); $('.barang_habis_' + detail['barang_habis']['nama_barang'][i] + '_value').css('visibility', 'visible').prop("value", detail['barang_habis']['jumlah'][i]);
        }
    }

    var wrapper = $(".perangkat_sudiskominfotik");
    for (let i = 0; i < detail['perangkat_kominfo']['jenis'].length; i++) {
        $(wrapper).append('<div><label class=""><b>- </b> Jenis/Merk : </label><input type="text" name="perangkat_kominfo_jenis[]" style="border: none; border-bottom: 1px solid black;" value="'+ detail['perangkat_kominfo']['jenis'][i] +'" required><label class="">SN : </label><input type="text" name="perangkat_kominfo_SN[]" value="'+ detail['perangkat_kominfo']['sn'][i] +'" required style="border: none; border-bottom: 1px solid black;"><a href="#" class="delete"><i class="material-icons text-danger">delete</i></a></div></div>');
    }

    $('#ip_1').prop("value", detail['ip_1']);
    $('#ip_2').prop("value", detail['ip_2']);
    $('#penjelasan_pekerjaan').prop("value", penjelasan_pekerjaan);
    $('#penjelasan_pekerjaan_form').addClass('focused').addClass('is-focused');
    $('.perwakilan').addClass('focused').addClass('is-focused');
    $('#nama_perwakilan').prop("value", nama_perwakilan);
    $('#nip_perwakilan').prop("value", nip_perwakilan);
    $('#file-ip-1-preview').prop("src", foto_hasil);
    $('#file-ip-1-preview').prop("hidden", false);
    var img = $('<img>').attr('src', tanda_tangan);
    $('#signature').append($('<p>').text("Tanda tangan:"));
    $('#signature').append(img);

    $('#ticketing').attr('action', form_action);
</script>
<script>

</script>