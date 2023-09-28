<hr>
<div class="row in collapse show" id="absensi">
    <h6 class="mb-5">Laporan Absensi Awal Tahun s/d Sekarang</h6>
    <div class="col-12">
        <div class="card z-index-2  ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div id="grafik_absen_2" style="width: 100%; height: 500px;"></div>
                </div>
                <div class="col-lg-6 col-12">
                    <div id="grafik_absen_1" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>
            <div class="card-body">
                <h6 class="mb-2 "> Rekapitulasi Keterlambatan: </h6>
                <p class="text-sm mb-0"> Total Telat: <span class="font-weight-bolder">{{ $absensi['total_telat'] }} jam</span></p>
                <p class="text-sm "> Total Pulang Cepat: <span class="font-weight-bolder">{{ $absensi['total_pulang_cepat'] }} jam</span></p>
            </div>
        </div>
    </div>
</div>
<script>
let total_cuti = {{ $absensi['total_cuti'] }};
let total_izin = {{ $absensi['total_izin'] }};
let total_alpha = {{ $absensi['total_alpha'] }};
let total_sakit = {{ $absensi['total_sakit'] }};
let total_dinas_luar_penuh = {{ $absensi['total_dinas_luar_penuh'] }};
let total_dinas_luar_awal = {{ $absensi['total_dinas_luar_awal'] }};
let total_dinas_luar_akhir = {{ $absensi['total_dinas_luar_akhir'] }};
Highcharts.chart('grafik_absen_1', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '',
        align: 'left'
    },
    xAxis: {
        categories: ['Cuti', 'Izin', 'Alpha', 'Sakit', 'Dinas Luar Penuh', 'Dinas Luar Awal', 'Dinas Luar Akhir'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah dalam hari',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: ' hari'
    },
    plotOptions: {
        bar: {
            borderRadius: '50%',
            dataLabels: {
                enabled: true
            },
            groupPadding: 0.1
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah',
        data: [total_cuti, total_izin, total_alpha, total_sakit, total_dinas_luar_penuh, total_dinas_luar_awal, total_dinas_luar_akhir]
    }]
});
</script>
<script>
var total_telat_bulanan = [
    {{ $absensi['total_telat_bulanan'][1] }},
    {{ $absensi['total_telat_bulanan'][2] }},
    {{ $absensi['total_telat_bulanan'][3] }},
    {{ $absensi['total_telat_bulanan'][4] }},
    {{ $absensi['total_telat_bulanan'][5] }},
    {{ $absensi['total_telat_bulanan'][6] }},
    {{ $absensi['total_telat_bulanan'][7] }},
    {{ $absensi['total_telat_bulanan'][8] }},
    {{ $absensi['total_telat_bulanan'][9] }},
    {{ $absensi['total_telat_bulanan'][10] }},
    {{ $absensi['total_telat_bulanan'][11] }},
    {{ $absensi['total_telat_bulanan'][12] }},
];

var total_pulang_cepat_bulanan = [
    {{ $absensi['total_pulang_cepat_bulanan'][1] }},
    {{ $absensi['total_pulang_cepat_bulanan'][2] }},
    {{ $absensi['total_pulang_cepat_bulanan'][3] }},
    {{ $absensi['total_pulang_cepat_bulanan'][4] }},
    {{ $absensi['total_pulang_cepat_bulanan'][5] }},
    {{ $absensi['total_pulang_cepat_bulanan'][6] }},
    {{ $absensi['total_pulang_cepat_bulanan'][7] }},
    {{ $absensi['total_pulang_cepat_bulanan'][8] }},
    {{ $absensi['total_pulang_cepat_bulanan'][9] }},
    {{ $absensi['total_pulang_cepat_bulanan'][10] }},
    {{ $absensi['total_pulang_cepat_bulanan'][11] }},
    {{ $absensi['total_pulang_cepat_bulanan'][12] }},
];
Highcharts.chart('grafik_absen_2', {
    chart: {
        type: 'column'
    },
    title: {
        text: '',
        align: 'left'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        title: {
            text: 'Jam (hh:mm:ss)'
        },
        labels: {
            formatter: function () {
                var time = this.value;
                var hours = parseInt(time/3600000);
                var minutes = parseInt((parseInt(time%3600000))/60000);
                var seconds = parseInt(parseInt((parseInt(time%3600000))%60000))/1000;
                return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    tooltip: {
        formatter: function () {
            var time = this.y;
            var hours = parseInt(time/3600000);
            var minutes = parseInt((parseInt(time%3600000))/60000);
            var seconds = parseInt(parseInt((parseInt(time%3600000))%60000))/1000;
            return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')} Jam`;
        }
    },
    series: [{
        name: 'Jam Telat',
        data: total_telat_bulanan
    }, {
        name: 'Jam Pulang Cepat',
        data: total_pulang_cepat_bulanan
    }]
});

</script>