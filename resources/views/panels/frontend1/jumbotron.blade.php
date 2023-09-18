<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        {{-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true"></button> --}}

    @foreach ($header as $h)
    @if ($h->id == 1)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $h->id-1 }}" class="active" aria-current="true"></button>
    @endif
    @endforeach

    @foreach ($header as $h)
    @if ($h->id > 1 && $h->aktif == "Y")
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $h->id-1 }}"></button>
    @endif
    @endforeach

    </div>
    <div class="carousel-inner">
      @foreach ($header as $h)
      @if ($h->id == 1)
      <div class="carousel-item active">
        <img src="{{ asset('storage/header/'.$h->img) }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 style="font-weight: medium; font-family:'Poppins'; color: white">{{ $h->title }}</h1>
        </div>
      </div>
      @endif
      @endforeach

      @foreach ($header as $h)
      @if ($h->id > 1 && $h->aktif == "Y")
      <div class="carousel-item">
        <img src="{{ asset('storage/header/'.$h->img) }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h1 style="font-weight: medium; font-family:'Poppins'; color: white">{{ $h->title }}</h1>
        </div>
      </div>
      @endif
      @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
{{-- <div class=" jumbotron "> --}}



<section class=" d-flex justify-content-center flex-column align-items-center pt-5 pb-5">
    <div class="container pb-5">
        <div class="col-sm-12 text-center pt-5" >
            <h2 style="font-weight: bold; color: #5e5e5e; font-family: 'Poppins';">JAKARTA <span style="color:orangered;">BARAT </span></h2>
        </div>
        <div class="col-sm-8 offset-sm-2 text-center pt-3">
        <p style="font-size: 17px;  color: #63697a; font-family: 'Poppins';">Website Pemerintah Kota Administrasi Jakarta Barat ini hadir dengan tampilan dan fitur yang baru serta tata letak yang disesuaikan. Hal ini diharapkan dapat meningkatkan ketersediaan informasi yang dibutuhkan serta dengan memberikan kenyamanan masyarakat saat melakukan akses. Silakan jelajahi website ini dengan mengikuti petunjuk menu-menu yang tersedia. <br> Semoga bermanfaat.</p>
        </div>
    </div>
</section>

<marquee diection="up"; class="marquees" style="background-color: orangered; color: white; justify-content: center" width="100%" direction="left" height="50px">
    @foreach ($run as $r)
    <p>
        <img style="height: 20px; width: 20px"  src="/assets/images/icon/infoo.png">&nbsp;&nbsp;   {{$r->teks}}
    </p>
    @endforeach

</marquee>



