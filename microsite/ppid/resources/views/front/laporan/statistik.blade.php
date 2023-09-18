<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.js"></script>
<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <h3 class="mb-4">Laporan Statistik PPID - Kota Administrasi Jakarta Barat</h3>
        <div class="row justify-content-center" align="center">
            <div class="col-lg col-12 mb-5">
                <div class="bg-dark shadow align-items-center justify-content-center rounded-circle p-5" style="height: 190px; width: 190px;">
                    <h6 class="text-white mb-0">Daftar Informasi Publik</h6>
                    <h1 class="text-warning mb-0" data-toggle="counter-up">{{ $statistik['jumlah_informasi'] }}</h1>
                </div>
            </div>
            <div class="col-lg col-12 mb-5">
                <div class="bg-dark shadow align-items-center justify-content-center rounded-circle p-5" style="height: 190px; width: 190px;">
                    <h6 class="text-white mb-0">Jumlah Unduh Informasi</h6>
                    <h1 class="text-warning mb-0" data-toggle="counter-up">{{ $statistik['jumlah_download'] }}</h1>
                </div>
            </div>
            <div class="col-lg col-12 mb-5">
                <div class="bg-dark shadow align-items-center justify-content-center rounded-circle p-5" style="height: 190px; width: 190px;">
                    <h6 class="text-white mb-0">Jumlah Permohonan Informasi</h6>
                    <h1 class="text-warning mb-0" data-toggle="counter-up">{{ $statistik['jumlah_permohonan'] }}</h1>
                </div>
            </div>
            <div class="col-lg col-12 mb-5">
                <div class="bg-dark shadow align-items-center justify-content-center rounded-circle p-5" style="height: 190px; width: 190px;">
                    <h6 class="text-white mb-0">Jumlah Pengajuan Keberatan</h6>
                    <h1 class="text-warning mb-0" data-toggle="counter-up">{{ $statistik['jumlah_keberatan'] }}</h1>
                </div>
            </div>
            <div class="col-lg col-12 mb-5">
                <div class="bg-dark shadow align-items-center justify-content-center rounded-circle p-5" style="height: 190px; width: 190px;">
                    <h6 class="text-white mb-0">Jumlah Permohonan Selesai</h6>
                    <h1 class="text-warning mb-0" data-toggle="counter-up">{{ $statistik['jumlah_permohonan_selesai'] }}</h1>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" align="center">
            <div class="col-lg-1"></div>
            <div class="col-lg-4 col-12 mb-5">
                <h6 class="text-white bg-dark shadow p-3">Informasi Publik Berdasarkan Kategori</h6>
                <canvas id="kategori" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-1"></div>
            <div class="col-lg-4 col-12">
                <h6 class="text-white bg-dark shadow p-3">Persentase Permohonan Selesai</h6>
                <canvas id="permohonan" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</div>
<script>
    var setiap_saat = '{{ $statistik['jumlah_setiap_saat'] }}';
    var berkala = '{{ $statistik['jumlah_berkala'] }}';
    var serta_merta = '{{ $statistik['jumlah_serta_merta'] }}';
    var dikecualikan = '{{ $statistik['jumlah_dikecualikan'] }}';
    const selector_kategori = document.getElementById('kategori').getContext('2d');
    const kategori = new Chart(selector_kategori, {
        type: 'pie',
        data: {
            labels: ['Setiap Saat', 'Berkala', 'Serta Merta', 'Dikecualikan'],
            datasets: [{
                data: [setiap_saat, berkala, serta_merta, dikecualikan],
                backgroundColor: [
                    'rgba(52, 173, 84, 1)',
                    'rgba(6, 163, 218, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(220, 53, 69, 1)'
                ]
            }]
        }
    });
</script>
<script>
    var dipersetujui = '{{ $statistik['jumlah_dipersetujui'] }}';
    var ditolak = '{{ $statistik['jumlah_ditolak'] }}';
    var diproses = '{{ $statistik['jumlah_diproses'] }}';
    const selector_permohonan = document.getElementById('permohonan').getContext('2d');
    const permohonan = new Chart(selector_permohonan, {
        type: 'doughnut',
        data: {
            labels: ['Dipersetujui', 'Sedang Proses', 'Ditolak'],
            datasets: [{
                data: [dipersetujui, diproses, ditolak],
                backgroundColor: [
                    'rgba(52, 173, 84, 1)',
                    'rgba(109, 156, 121, 1)',
                    'rgba(125, 125, 125, 1)'
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
                display: false
            },
        }
    });
</script>