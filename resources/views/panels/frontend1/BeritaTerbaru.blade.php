<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 100%;
        border-radius: 50px;
        margin-bottom: 3rem;
        font-family: 'Poppins';
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .img {
        border-radius: 5px 5px 0 0;
    }
</style>

<center>
    <h2 style="color: #5e5e5e; font-family: 'Poppins';">BERITA <span style="color:orangered;">TERBARU</span></h2>
    <p style="color : #78829d; font-size:20px;">Informasi Teraktual</p>
</center>

<div class="container">
    <nav class="pb-5">
        <div class="nav nav-tabs justify-content-center btn-group" style="border: none !important;" id="btnGroup2" role="tablist">
            <button 
                style="border-radius: 0px !important;" 
                class="nav-link active" id="nav-all-tab" 
                data-bs-toggle="tab" data-bs-target="#nav-all" 
                type="button" role="tab" aria-controls="nav-all" 
                aria-selected="true">SEMUA
            </button>

            @foreach ($kategori as $item)
            @if ( strtolower($item->kategori) == "kesejahteraan masyarakat")
                <?php $item->kategori = str_replace(' ', '', $item->kategori); ?>
                <button 
                    style="border-radius: 0px !important;" 
                    class="nav-link" id="nav-{{strtolower($item->kategori)}}-tab" 
                    data-bs-toggle="tab" data-bs-target="#{{strtolower($item->kategori)}}" 
                    type="button" role="tab" aria-controls="nav-{{$item->kategori}}"
                    aria-selected="false">
                    KESEJAHTERAAN MASYARAKAT
                </button>
            @else
                <button 
                    style="border-radius: 0px !important;" 
                    class="nav-link" id="nav-{{strtolower($item->kategori)}}-tab" 
                    data-bs-toggle="tab" data-bs-target="#{{strtolower($item->kategori)}}" 
                    type="button" role="tab" aria-controls="nav-{{$item->kategori}}"
                    aria-selected="false">
                    {{ strtoupper($item->kategori) }}
                </button>
            @endif
            @endforeach
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent" style="justify-content: center">
        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
            <div class="row" >
                @foreach ($berita as $key => $data)
                <div class="col" style="justify-content: center; display : flex;">
                    <div class="card" style="width: 21rem;" >
                        @if ($data->img != null || $data->img != "")
                        <img width="300px !important" height="300px !important" style="object-fit: cover;" src="{{ asset('storage/berita/'.$data->img) }}" class="card-img-top" alt="...">
                        @else
                        <img width="300px !important" height="300px !important" style="object-fit: cover;"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-header" style="background: gainsboro; height: 3.5rem;">
                            <p style="color: orangered; pb-1 pt-1">{{ $data->kategori }}
                                <br>
                                <span style="color: grey">{{ \Carbon\Carbon::parse($data->published_date)->isoFormat('D MMMM Y')}}</span>
                            </p>
                        </div>
                        <div class="card-body">
                            <a href="/detailberita/{{ $data->id }}" style="text-decoration: none"><b><h5 class="card-title">{{$data->title,10}}</h5></b></a>
                            <p class="card-text">{!! Str::limit($data->content, 130) !!}</em></p>
                        </div>
                        <div class="card-footer" style="font-size: 12px;">
                            <div class="d-flex align-items-center">
                                <img src="/assets/images/Read-more.png" style="width: 6%; height: 5%"alt="">&nbsp;
                                <a href="/detailberita/{{ $data->id }}" class="card-link" style="text-decoration:none">BACA SELENGKAPNYA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                @php if($key == 5) break; @endphp
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <button class="mb-5 btn btn-primary" onclick="muatBerita();" id="tombol-muat">Muat Lebih Banyak</button>
            </div>
            <script type="text/javascript">
            function muatBerita() {
                $('#extend-berita').fadeIn();
                $('#tombol-lihat').fadeIn();
                $('#tombol-muat').hide();
            }
            </script>
            <div class="row" style="display: none;" id="extend-berita">
                @foreach ($berita as $key => $data)
                @php if($key <= 5) continue; @endphp
                <div class="col" style="justify-content: center; display : flex;">
                    <div class="card" style="width: 21rem;" >
                        @if ($data->img != null || $data->img != "")
                        <img width="300px !important" height="300px !important" style="object-fit: cover;" src="{{ asset('storage/berita/'.$data->img) }}" class="card-img-top" alt="...">
                        @else
                        <img width="300px !important" height="300px !important" style="object-fit: cover;"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-header" style="background: gainsboro; height: 3.5rem;">
                            <p style="color: orangered; pb-1 pt-1">{{ $data->kategori }}
                                <br>
                                <span style="color: grey">{{ \Carbon\Carbon::parse($data->published_date)->isoFormat('D MMMM Y')}}</span>
                            </p>
                        </div>
                        <div class="card-body">
                            <a href="/detailberita/{{ $data->id }}" style="text-decoration: none"><b><h5 class="card-title">{{$data->title,10}}</h5></b></a>
                            <p class="card-text">{!! Str::limit($data->content, 130) !!}</em></p>
                        </div>
                        <div class="card-footer" style="font-size: 12px;">
                            <div class="d-flex align-items-center">
                                <img src="/assets/images/Read-more.png" style="width: 6%; height: 5%"alt="">&nbsp;
                                <a href="/detailberita/{{ $data->id }}" class="card-link" style="text-decoration:none">BACA SELENGKAPNYA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <a href="/berita"><button class="mb-5 btn btn-primary" style="display: none;" id="tombol-lihat">Lihat Lebih Banyak Berita</button></a>
            </div>
        </div>

        <?php $data;?>
        <?php $param = 0;?>
        @foreach ($kategori as $item)
        <?php $param = $param + 1;?>
        <div class="tab-pane fade show" id="{{strtolower($item->kategori)}}" role="tabpanel" aria-labelledby="nav-{{strtolower($item->kategori)}}-tab">
        <div class="row" >
            <?php $data = ${'berita'. $param}; ?>
            @foreach ($data as $key => $datas)
            <div class="col" style="justify-content: center; display : flex;">
                <div class="card" style="width: 21rem;" >
                    @if ($datas->img != null || $datas->img != "")
                    <img width="300px !important" height="300px !important" style="object-fit: cover;"  src="{{ asset('storage/berita/'.$datas->img) }}" class="card-img-top" alt="...">
                    @else
                    <img width="300px !important" height="300px !important" style="object-fit: cover;"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                    @endif
                    <div class="card-header" style="background: gainsboro; height: 3.5rem;">
                        <p style="color: orangered">{{ $datas->kategori }}
                            <br>
                            <span style="color: grey">{{ \Carbon\Carbon::parse($datas->published_date)->isoFormat('D MMMM Y')}}</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <a href="/detailberita/{{ $datas->id }}" style="text-decoration: none"><b><h5 class="card-title">{{$datas->title,10}}</h5></b></a>
                        <p class="card-text">{!! Str::limit($datas->content, 130) !!}</em></p>
                    </div>
                    <div class="card-footer" style="font-size: 10px;">
                        <div class="d-flex align-items-center">
                            <img src="/assets/images/Read-more.png" style="width: 6%; height: 5%"alt="">&nbsp;
                            <a href="/detailberita/{{ $datas->id }}" class="card-link" style="text-decoration:none">BACA SELENGKAPNYA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
            @php if($key == 5) break; @endphp
            @endforeach
        </div>
            <div class="d-flex justify-content-center">
                <button class="mb-5 btn btn-primary" onclick="muatBerita{{$item->kategori}}()" id="tombol-muat-{{ $item->kategori }}">Muat Lebih Banyak</button>
            </div>
            <script type="text/javascript">
            function muatBerita{{$item->kategori}}() {
                $('#extend-berita-{{ $item->kategori }}').fadeIn();
                $('#tombol-lihat-{{ $item->kategori }}').fadeIn();
                $('#tombol-muat-{{ $item->kategori }}').hide();
            }
            </script>
            <div class="row" id="extend-berita-{{ $item->kategori }}" style="display: none;">
            <?php $data = ${'berita'. $param}; ?>
            @foreach ($data as $key => $datas)
            @php if($key <= 5) continue; @endphp
            <div class="col" style="justify-content: center; display : flex;">
                <div class="card" style="width: 21rem;" >
                    @if ($datas->img != null || $datas->img != "")
                    <img width="300px !important" height="300px !important" style="object-fit: cover;"  src="{{ asset('storage/berita/'.$datas->img) }}" class="card-img-top" alt="...">
                    @else
                    <img width="300px !important" height="300px !important" style="object-fit: cover;"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                    @endif
                    <div class="card-header" style="background: gainsboro; height: 3.5rem;">
                        <p style="color: orangered">{{ $datas->kategori }}
                            <br>
                            <span style="color: grey">{{ \Carbon\Carbon::parse($datas->published_date)->isoFormat('D MMMM Y')}}</span>
                        </p>
                    </div>
                    <div class="card-body">
                        <a href="/detailberita/{{ $datas->id }}" style="text-decoration: none"><b><h5 class="card-title">{{$datas->title,10}}</h5></b></a>
                        <p class="card-text">{!! Str::limit($datas->content, 130) !!}</em></p>
                    </div>
                    <div class="card-footer" style="font-size: 10px;">
                        <div class="d-flex align-items-center">
                            <img src="/assets/images/Read-more.png" style="width: 6%; height: 5%"alt="">&nbsp;
                            <a href="/detailberita/{{ $datas->id }}" class="card-link" style="text-decoration:none">BACA SELENGKAPNYA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <a href="/berita"><button class="mb-5 btn btn-primary" style="display: none;" id="tombol-lihat-{{ $item->kategori }}">Lihat Lebih Banyak Berita</button></a>
        </div>
        </div>
        @endforeach
    </div>
</div>