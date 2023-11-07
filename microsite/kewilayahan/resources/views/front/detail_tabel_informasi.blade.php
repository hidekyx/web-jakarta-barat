<table id="datatable" class="table table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['ppid'][strtolower($current_subpage)] as $key => $dp)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $dp->judul }}</td>
            <td>{{ $dp->keterangan }}</td>
            <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($dp->created_at)->isoFormat('D MMMM Y')}}</td>
            <td><a target="_blank" href="{{ asset('storage/files/images/foto/ppid_daftar_informasi_publik/'.$dp->file) }}"><button type="button" class="btn btn-sm btn-primary">Lihat File</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>