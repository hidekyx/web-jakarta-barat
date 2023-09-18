@extends('layouts.backendMainLayout')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body"><br><br>
            <a href="/addmenu" class="btn btn-light-primary">Add</a>

			<table class="table table-responsive" id="tabel-data">
                <th>
                    <tr>
                        <td>No</td>
                        <td>Nama Menu</td>
                        <td class="text-center">Asal Menu</td>
                        <td class="text-center">Asal Submenu</td>
                        <td>action</td>
                    </tr>
                </th>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>
                            {{ $index+1 }}
                        </td>
                        <td>
                            {{ $item->keterangan }}
                        </td>
                        <td class="text-center">
                            @if ($item->idMenu == null)
                            -
                            @else
                            @foreach ($full as $menu)
                                @if ($item->idMenu == $menu->id)
                                    {{ $menu->keterangan }}
                                @else
                                @endif
                            @endforeach
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($item->idSubMenu == null)
                            -
                            @else
                            @foreach ($full as $submenu)
                                @if ($item->idSubMenu == $submenu->id)
                                    {{ $submenu->keterangan }}
                                @else
                                @endif
                            @endforeach
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($item->deleteable != true && $item->idSubMenu == null)
							    <a class="text-primary"
                                @if ($item->href == 1 && $item->idMenu != null && $item->link == null)
                                    href="/edit-content-menu/{{$item->id}}"
                                @elseif ($item->href == 1 && $item->link != null && $item->idMenu != null)
                                    href="/edit-sublinkmenu/{{$item->id}}"
                                @elseif ($item->href == 1 && $item->link != null && $item->idMenu == null)
                                    href="/edit-linkmenu/{{$item->id}}"
                                @else
                                    href="/edit-menu/{{$item->id}}"
                                @endif
                                ><i class="fas fa-edit"></i></a>
                                | &nbsp;
							    <a class="text-danger" onclick="deleteMenu({{$item->id}})"><i class="fas fa-trash"></i></a>
                            @elseif($item->idSubMenu != null)
							    <a class="text-danger" onclick="deleteMenu({{$item->id}})"><i class="fas fa-trash"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            Current Page: {{ $data->currentPage() }}<br>
            Jumlah Data: {{ $data->total() }}<br>
             <br>
            {{ $data->links() }}
        </div>
        <script type="text/javascript">
            function deleteMenu(id) {
                swal({
                    title: "Delete?",
                    text: "Please ensure and then confirm!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function(e) {

                    if (e.value === true) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            type: 'POST',
                            url: "{{ url('/menu/delete') }}/" + id,
                            data: {
                                _token: CSRF_TOKEN
                            },
                            dataType: 'JSON',
                            success: function(results) {

                                if (results.success === true) {
                                    swal("Done!", results.message, "success");
                                    window.location.reload();
                                } else {
                                    swal("Error!", results.message, "error");
                                }
                            }
                        });

                    } else {
                        e.dismiss;
                    }

                }, function(dismiss) {
                    return false;
                })
            }
        </script>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script>
@endsection
