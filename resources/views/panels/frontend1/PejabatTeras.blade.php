<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/css/videoTerbaru.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
    <style>
.item:hover img {
  -moz-transform: scale(1.3);
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
}

#detail {
  background-color: #FF4500;
  transition: 0.2s;
}

#detail:hover {
  background-color: #ba3200;
}

.main-content {
  position: relative;

  .owl-theme {
    .custom-nav {
      position: absolute;
      top: 20%;
      left: 0;
      right: 0;

      .owl-prev, .owl-next {
        position: absolute;
        height: 100px;
        color: inherit;
        background: none;
        border: none;
        z-index: 100;

        i {
          font-size: 2.5rem;
          color: #cecece;
        }
      }

      .owl-prev {
      left: 0;
      }

      .owl-next {
      right: 0;
      }
    }
  }
}
    </style>
    <script>
    jQuery(document).ready(function($){
        $('.owl-carousel-premiere').owlCarousel({
        loop:false,
        margin:10,
        nav:false,
        responsive:{
            0:{
            items:1
            },
            600:{
            items:3
            },
            1000:{
            items:3
            }
        }
        })
    })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '#detail', function(){
            console.log("try");
              var nama = $(this).data('nama');
              var jabatan = $(this).data('jabatan');
              var nip = $(this).data('nip');
              var pangkat = $(this).data('pangkat');
              var agama = $(this).data('agama');
              var riwayat_pendidikan = $(this).data('riwayat_pendidikan');
              var riwayat_jabatan = $(this).data('riwayat_jabatan');
              var foto = $(this).data('photo-pejabat');
              if(nip == ''){
                $('.nip').hide();
              } else {
                $('.nip').show();
              }
              if(pangkat == ''){
                $('.pangkat').hide();
              } else {
                $('.pangkat').show();
              }
              if(agama == ''){
                $('.agama').hide();
              } else {
                $('.agama').show();
              }
              if(riwayat_jabatan == ''){
                $('.riwayat_jabatan').hide();
              } else {
                $('.riwayat_jabatan').show();
              }
              if(riwayat_pendidikan == ''){
                $('.riwayat_pendidikan').hide();
              } else {
                $('.riwayat_pendidikan').show();
              }
              $('#nama').text(nama);
              $('#nip').text(nip);
              $('#pangkat').text(pangkat);
              $('#agama').text(agama);
              $('#jabatan').text(jabatan);
              $('#riwayat_jabatan').html(riwayat_jabatan);
              $('#riwayat_pendidikan').html(riwayat_pendidikan);
              $('#photo-pejabat').attr("src", foto);
            })
        })
    </script>

</body>

<section style="background-image: url('/assets/images/Bg Pejabat Teras.png');  background-repeat: no-repeat; background-size: cover; height:750px; padding-top:50px; font-family: 'Poppins';">
    <div class="container">
        <div class="text-center" style="color:white;">
            <h2 >PEJABAT <span style="color:orangered;">TERAS </span></h2>
            <h5 style="color: floralwhite">Daftar Pejabat Di Lingkungan Pemerintah Kota Administrasi Jakarta Barat</h5>
        </div>

        <div style="width: 100% !important">
            <div class="owl-carousel owl-carousel-premiere owl-theme mt-5 text-center" style="width: 100% !important">
                @foreach ($pejabat as $pejabat)
                <div style="width: 100%; display: flex !important; justify-content: center;" class="text-start">
                    <div style="width: 20rem; height: 28rem;" class="card">
                        <div style="height: 80%; width: 100%;">
                            <img  height="100%" width="100%" style="object-fit: cover" class="card-img-top" src="{{ asset('storage/pejabat/'.$pejabat->img) }}" alt="Card image cap">
                        </div>
                        <a class="card-body text-center" style="height:20%;" id="detail" type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#exampleModal2"
                          data-jabatan="{{ $pejabat->jabatan }}"
                          data-nama="{{ $pejabat->nama }}"
                          data-nip="{{ $pejabat->nip }}"
                          data-pangkat="{{ $pejabat->pangkat }}"
                          data-agama="{{ $pejabat->agama }}"
                          data-riwayat_pendidikan="{{ $pejabat->riwayat_pendidikan }}"
                          data-riwayat_jabatan="{{ $pejabat->riwayat_jabatan }}"
                          data-photo-pejabat="{{ asset('storage/pejabat/'.$pejabat->img) }}"
                          data-profil="{{ $pejabat->profil }}">
                          <p class="card-title" style="color: white; font-family: poppins; font-size: 15px; text-decoration:none;">{{ Str::limit($pejabat->nama, 35) }}</p>
                          <p class="card-text" style="color: white; font-family: poppins; font-size: 10px;">{{ $pejabat->jabatan }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div cl>
    </div>
</section>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <img id="photo-pejabat" style="max-width: 300px; width:100%;" class="rounded">
          <h3 class="pt-2" id="nama"></h3>
          <hr>
        </div>

        <h6 class="text-uppercase text-xs font-weight-bolder">Jabatan</h6>
        <label class="text-body ms-3 w-80 mb-3" id="jabatan"></label>

        <div class="nip">
            <h6 class="text-uppercase text-xs font-weight-bolder">NIP / NRK</h6>
            <label class="text-body ms-3 w-80 mb-3" id="nip"></label>
        </div>

        <div class="pangkat">
            <h6 class="text-uppercase text-xs font-weight-bolder">Pangkat / Golongan</h6>
            <label class="text-body ms-3 w-80 mb-3" id="pangkat"></label>
        </div>

        <div class="agama">
            <h6 class="text-uppercase text-xs font-weight-bolder">Agama</h6>
            <label class="text-body ms-3 w-80 mb-3" id="agama"></label>
        </div>

        <div class="riwayat_pendidikan">
            <h6 class="text-uppercase text-xs font-weight-bolder">Riwayat Pendidikan</h6>
            <label class="text-body ms-3 w-80 mb-3" id="riwayat_pendidikan"></label>
        </div>

        <div class="riwayat_jabatan">
            <h6 class="text-uppercase text-xs font-weight-bolder">Riwayat Jabatan</h6>
            <label class="text-body ms-3 w-80 mb-0" id="riwayat_jabatan"></label>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

