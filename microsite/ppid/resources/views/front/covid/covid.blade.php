<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.js"></script>
<div class="container-fluid facts py-0">
    <div class="container py-5">
        <div class="justify-content-center mb-4" align="center">
            <h2>Data Pemantauan COVID-19 DKI Jakarta</h2>
            <i class="bi bi-calendar text-primary me-2"></i> Sampai hari ini
        </div>
        <table class="table table-bordered mb-5" align="center">
            <thead align="center">
                <th colspan="3" class="bg-light">Kasus Terkonfirmasi COVID-19 DKI Jakarta</th>
            </thead>
            <tbody align="center">
                <tr>
                    <td colspan="3">
                        <h1 class="mb-0 text-primary" data-toggle="counter-up">{{ number_format($data_covid['jumlah_kasus']) }}</h1>
                        <h7 class="mb-0">Jumlah Kasus Positif</h7>
                    </td>
                </tr>
                <tr>
                    <td style="width: 33%;">
                        <h2 class="mb-0 text-success" data-toggle="counter-up">{{ number_format($data_covid['jumlah_sembuh']) }}</h2>
                        <h7 class="mb-0">Jumlah Sembuh</h7>
                    </td>
                    <td style="width: 33%;">
                        <h2 class="mb-0 text-danger" data-toggle="counter-up">{{ number_format($data_covid['jumlah_meninggal']) }}</h2>
                        <h7 class="mb-0">Jumlah Meninggal</h7>
                    </td>
                    <td style="width: 33%;">
                        <h2 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['jumlah_dirawat']) }}</h2>
                        <h7 class="mb-0">Jumlah Dirawat, Isolasi Mandiri, dan Bergejala</h7>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-4 col-12">
                <table class="table table-bordered mb-5" align="center">
                    <thead align="center">
                        <th colspan="3" class="bg-light">Kasus COVID-19 Berdasarkan Jenis Kelamin</th>
                    </thead>
                    <tbody style="height: 160px;" align="center" class="align-middle">
                        <tr>
                            <td style="width: 50%;">
                                <h2 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['jenis_kelamin'][0]['doc_count']) }}</h2>
                                <h7 class="mb-0">Laki-laki</h7>
                            </td>
                            <td style="width: 50%;">
                                <h2 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['jenis_kelamin'][1]['doc_count']) }}</h2>
                                <h7 class="mb-0">Perempuan</h7>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div><canvas id="jenis_kelamin"></canvas></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="col-lg-4 col-12">
                <table class="table table-bordered mb-5" align="center">
                    <thead align="center">
                        <th colspan="5" class="bg-light">Kasus COVID-19 Berdasarkan Kelompok Umur</th>
                    </thead>
                    <tbody style="height: 160px;" align="center" class="align-middle">
                        <tr>
                            <td style="width: 33%;">
                                <h3 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['kelompok_umur'][0]['doc_count']) }}</h3>
                                <h7 class="mb-0">{{ $data_covid['kelompok_umur'][0]['key'] }} tahun</h7>
                            </td>
                            <td style="width: 33%;">
                                <h3 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['kelompok_umur'][1]['doc_count']) }}</h3>
                                <h7 class="mb-0">{{ $data_covid['kelompok_umur'][1]['key'] }} tahun</h7>
                            </td>
                            <td style="width: 33%;">
                                <h3 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['kelompok_umur'][2]['doc_count']) }}</h3>
                                <h7 class="mb-0">{{ $data_covid['kelompok_umur'][2]['key'] }} tahun</h7>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%;">
                                <h3 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['kelompok_umur'][3]['doc_count']) }}</h3>
                                <h7 class="mb-0">{{ $data_covid['kelompok_umur'][3]['key'] }} tahun</h7>
                            </td>
                            <td style="width: 33%;">
                                <h3 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['kelompok_umur'][4]['doc_count']) }}</h3>
                                <h7 class="mb-0">{{ $data_covid['kelompok_umur'][4]['key'] }} tahun</h7>
                            </td>
                            <td style="width: 33%;">
                                <h3 class="mb-0" data-toggle="counter-up">{{ number_format($data_covid['kelompok_umur'][5]['doc_count']) }}</h3>
                                <h7 class="mb-0">{{ $data_covid['kelompok_umur'][5]['key'] }} tahun</h7>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div><canvas id="umur" height="248px"></canvas></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4 col-12">
                <table class="table table-bordered mb-5" align="center">
                    <thead align="center">
                        <th colspan="3" class="bg-light">Data Penerima Vaksinasi COVID-19 DKI Jakarta</th>
                    </thead>
                    <tbody style="height: 160px;" align="center" class="align-middle">
                    @if($data_vaksin != null)
                        <tr>
                            <td style="width: 50%;">
                                <h4 class="mb-0" data-toggle="counter-up">{{ number_format($data_vaksin['jumlah_vaksinasi_1']) }}</h4>
                                <h7 class="mb-0">Vaksinasi Dosis 1</h7>
                            </td>
                            <td style="width: 50%;">
                                <h4 class="mb-0" data-toggle="counter-up">{{ number_format($data_vaksin['jumlah_vaksinasi_2']) }}</h4>
                                <h7 class="mb-0">Vaksinasi Dosis 2</h7>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div><canvas id="vaksin" height="309px"></canvas></div>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>Data Vaksinasi COVID-19 DKI Jakarta sedang maintenance</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
    var laki_laki = '{{ $data_covid['jenis_kelamin'][0]['doc_count'] }}';
    var perempuan = '{{ $data_covid['jenis_kelamin'][1]['doc_count'] }}';
    const selector_jenis_kelamin = document.getElementById('jenis_kelamin').getContext('2d');
    const jenis_kelamin = new Chart(selector_jenis_kelamin, {
        type: 'pie',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [laki_laki, perempuan],
                backgroundColor: [
                    '#aeeaae',
                    '#5dd55d'
                ]
            }]
        }
    });
</script>
<script>
    var umur_0 = '{{ $data_covid['kelompok_umur'][0]['doc_count'] }}';
    var umur_1 = '{{ $data_covid['kelompok_umur'][1]['doc_count'] }}';
    var umur_2 = '{{ $data_covid['kelompok_umur'][2]['doc_count'] }}';
    var umur_3 = '{{ $data_covid['kelompok_umur'][3]['doc_count'] }}';
    var umur_4 = '{{ $data_covid['kelompok_umur'][4]['doc_count'] }}';
    var umur_5 = '{{ $data_covid['kelompok_umur'][5]['doc_count'] }}';
    const selector_umur = document.getElementById('umur').getContext('2d');
    const umur = new Chart(selector_umur, {
        type: 'bar',
        data: {
            labels: ['0-5 Tahun', '6-18 Tahun', '19-30 Tahun', '31-45 Tahun', '46-59 Tahun', '> 60 Tahun'],
            datasets: [{
                data: [umur_0, umur_1, umur_2, umur_3, umur_4, umur_5],
                backgroundColor: [
                    '#b3e6ff',
                    '#80d4ff',
                    '#4dc3ff',
                    '#1ab2ff',
                    '#0099e6',
                    '#0077b3'
                ]
            }]
        }
    });
</script>
@if($data_vaksin != null)
<script>
    var dosis_1 = '{{ $data_vaksin['jumlah_vaksinasi_1'] }}';
    var dosis_2 = '{{ $data_vaksin['jumlah_vaksinasi_2'] }}';
    const selector_vaksin = document.getElementById('vaksin').getContext('2d');
    const vaksin = new Chart(selector_vaksin, {
        type: 'bar',
        data: {
            labels: ['Dosis 1', 'Dosis 2'],
            datasets: [{
                data: [dosis_1, dosis_2],
                backgroundColor: [
                    '#70dbdb',
                    '#33cccc'
                ]
            }]
        }
    });
</script>
@endif