@extends('layouts.backendMainLayout')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body"><br><br>
            <a href="/addpejabat" class="btn btn-light-primary">Add</a>
					
				<table class="table table-responsive" id="tabel-data">
                    <th>
                        <tr>
                            <th>No</th>
                            <th>Instansi</th>
                            <th>Jabatan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Email</th>
                            <th>Profil</th>
                            <th>Img</th>
                            <th>Action</th>
                        </tr>
                    </th>
                    @foreach($data as $index => $post)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $post->namaInstansi }}</td>
                            <td>{{ $post->jabatan }}</td>
                            <td>{{ $post->nama }}</td>
                            <td>{{ $post->alamat }}</td>
                            <td>{{ $post->telp }}</td>
                            <td>{{ $post->email }}</td>
                            <td>{!! $post->profil !!}</td>
                            <td><img src="{{ $post->img }}" alt=""></td>
                            <td>
                                <a class="btn btn-danger" onclick="deleteConfirmation({{$post->id}})">delete</a>
								<a href="/addpejabat/editpejabat/{{ $post->id }}" class="btn btn-light-primary">edit</a>
                            </td>
                        </tr>
                    @endforeach
                    <script type="text/javascript">
                        function deleteConfirmation(id) {
                            swal({
                                title: "Delete?",
                                text: "Please ensure and then confirm!",
                                type: "warning",
                                showCancelButton: !0,
                                confirmButtonText: "Yes, delete it!",
                                cancelButtonText: "No, cancel!",
                                reverseButtons: !0
                            }).then(function (e) {
                    
                                if (e.value === true) {
                                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    
                                    $.ajax({
                                        type: 'POST',
                                        url: "{{url('/deletepejabat')}}/" + id,
                                        data: {_token: CSRF_TOKEN},
                                        dataType: 'JSON',
                                        success: function (results) {
                    
                                            if (results.success === true) {
                                                swal("Done!", results.message, "success");
                                            } else {
                                                swal("Error!", results.message, "error");
                                            }
                                        }
                                    });
                    
                                } else {
                                    e.dismiss;
                                }
                    
                            }, function (dismiss) {
                                return false;
                            })
                        }
                    </script>
                    <script>
                        $(document).ready(function(){
                            $('#tabel-data').DataTable();
                        });
                    </script>
                </table>
                Current Page: {{ $data->currentPage() }}<br>
        			Jumlah Data: {{ $data->total() }}<br>
        			Data perhalaman: {{ $data->perPage() }}<br>
        			<br>
        			{{ $data->links() }}
        </div>
    </div>
</div>
@endsection
