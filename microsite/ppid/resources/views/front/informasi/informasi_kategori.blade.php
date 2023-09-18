<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div style="overflow-x:auto;">
                <table class="table table-hover">
                    <tbody>
                        @foreach($informasi as $key => $i)
                            <tr class="bg-dark text-white pt-2">
                                <th>{{ $key+1 }}</th>
                                <th colspan="100%"><b>{{ $i->isi }}</b></th>
                            </tr>
                            @foreach($i->judul as $key => $ij)
                            <tr>
                                <td></td>
                                <td>{{ $key+1 }}</td>
                                <td><b>{{ $ij->isi }}</b></td>
                                @if($ij->link)
                                <td><a href="{{ $ij->link }}" target="_blank"><button type="submit" class="btn btn-primary">Lihat</button></a></td>
                                @else
                                <td>-</td>
                                @endif
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>