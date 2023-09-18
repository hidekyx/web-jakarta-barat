 <!--Inner Header Start-->
<section class="wf100 p100 inner-header">
    <div class="container">
       @if($jenis_page == "Tanaman")
       <h1>Tanaman {{ ucwords($jenis) }} </h1>
       <ul>
          <li><a href="{{ asset('/') }}">Beranda</a></li>
          <li><a href="{{ asset('tanaman/'.$jenis) }}"> Tanaman {{ ucwords($jenis) }} </a></li>
          @if ($subpage == "detail")
          <li><a href="#"> {{ $tanaman->nama_tanaman_indonesia }} </a></li>
          @endif
       </ul>

       @elseif($jenis_page == "Tentang")
       <h1>{{ $jenis_page }} </h1>
       <ul>
          <li><a href="{{ asset('/') }}">Beranda</a></li>
          <li><a href="{{ asset('/tentang') }}">Tentang Walkot Farm</a></li>
       </ul>

       @elseif($jenis_page == "Kegiatan")
       <h1>{{ $jenis_page }} </h1>
       <ul>
          <li><a href="{{ asset('/') }}">Beranda</a></li>
          <li><a href="{{ asset('/kegiatan') }}">Kegiatan Walkot Farm</a></li>
       </ul>
       
       @else
       <h1>{{ $jenis_page }} </h1>
       <ul>
          <li><a href="{{ asset('/') }}">Beranda</a></li>
       </ul>
       @endif
    </div>
 </section>
 <!--Inner Header End-->