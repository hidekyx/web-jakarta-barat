<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

<style>


.logojakbar{
		height: 3%;
		width: 3%;
	}
.dropdown-contentq {
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	left:0;
	right:0;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	overflow: hidden
}

.dropdown-contentq .header {
	background: red;
	padding: 16px;
	color: white;
}

.dropdownq:hover .dropdown-contentq {
	display: block;
}

.dropdownq .withoutdesc {
	margin-top: 0;
	margin-left:405px;
	text-align: left;
	text-transform: none;
}

/* Create three equal columns that floats next to each other */
.columnq{
	float: left;
	width: 25%;
	padding: 10px;
	background-color: #ccc;
	height: 350px;
}

.columnq-nosub{
	float: left;
	width: 25%;
	padding: 10px;
	background-color: #ccc;
	height: 1100%;
}

.columnq-nosub a {
	float: none;
	color: black;
	padding: 3px;
	text-decoration: none;
	display: block;
	text-align: left;
}

.columnq-nosub h3 {
	font-size:20px;
}


.columnq-three-col{
	float: left;
	width: 33.3%;
	padding: 10px;
	background-color: #ccc;
	height: 350px;
}

.columnq-three-col a {
	float: none;
	color: black;
	padding: 3px;
	text-decoration: none;
	display: block;
	text-align: left;
}

.columnq-three-col h3 {
	font-size:20px;
}

.columnq h3 {
	font-size:20px;
}

.columnq a {
	float: none;
	color: black;
	padding: 3px;
	text-decoration: none;
	display: block;
	text-align: left;
}

.columnq a:hover {
	background-color: #ddd;
}

.columnq-three-col a:hover {
	background-color: #ddd;
}

.columnq-nosub a:hover {
	background-color: #ddd;
}

/* Clear floats after the columns */
.rowq:after {
	display: table;
	clear: both;
}

.custom-dropdown{
	width: 100% !important;
}

.custom-dropdown-item{
	width: 25% !important;
}

.custom-dropdown-item2{
	width: 200px !important;
}

.dropdown-item-custom{
	text-decoration: none;
	color: black;
	width: 100% !important;
}

.dropdown-item-custom:hover{
	color: black;
}

.ul-custom:hover{
	background-color: rgb(227, 224, 224);
}

.dropdown-menu li {
	position: relative;
}

.dropdown-menu .dropdown-submenu {
	display: none;
	position: absolute;
	left: 100%;
	top: -10px;
}

.dropdown-menu .dropdown-submenu-left {
	right: 100%;
	left: auto;
}

.dropdown-menu > li:hover > .dropdown-submenu {
	display: block;
}

.dropdown-hover:hover>.dropdown-menu {
	display: inline-block;
}

.dropdown-hover>.dropdown-toggle:active {
	/*Without this, clicking will make it sticky*/
	pointer-events: none;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 1000px) {
	.columnq {
		width: 100%;
		height: auto;
	}

	.columnq-three-col {
		width: 100%;
		height: auto;
	}

	.columnq-nosub {
		width: 100%;
		height: auto;
	}

	.custom-dropdown{
		flex-direction: column;
	}
}
</style>
<body>
<marquee behavior="scroll" scrolldelay="2" scrollamount="5" direction="left" class="marquee" style="font-family: 'Poppins';">
	Kantor WALIKOTA JAKARTA BARAT Tempat Kami Menumpahkan Segenap Pikiran & Tenaga Demi Kesejahteran Masyarakat
</marquee>


	<nav class="navbar navbar-expand-xl navbar-light bg-light" style="padding-right: 5% !important; padding-left: 5% !important;">
		<div class="container-fluid">
			<a class="navbar-brand" style="width: 50% !important; font-family:'Poppins';" href="/">
			<img width="40px" src="{{asset('assets/images/logo/logo_jakbar.png')}}"> &nbsp;JAKARTA BARAT</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-family: 'Poppins';">
				<ul class="navbar-nav">
				<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">KECAMATAN & KELURAHAN</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/cengkareng') }}">Kecamatan Cengkareng</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/cengkareng-barat') }}">Kelurahan Cengkareng Barat</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/cengkareng-timur') }}">Kelurahan Cengkareng Timur</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/duri-kosambi') }}">Kelurahan Duri Kosambi</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kapuk') }}">Kelurahan Kapuk</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kedaung-kali-angke') }}">Kelurahan Kedaung Kali Angke</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/rawa-buaya') }}">Kelurahan Rawa Buaya</a></li>
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/palmerah') }}">Kecamatan Palmerah</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kota-bambu-utara') }}">Kelurahan Kota Bambu Utara</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kota-bambu-selatan') }}">Kelurahan Kota Bambu Selatan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/slipi') }}">Kelurahan Slipi</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/jati-pulo') }}">Kelurahan Jati Pulo</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kelpalmerah') }}">Kelurahan Palmerah</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kemanggisan') }}">Kelurahan Kemanggisan</a></li>
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/kalideres') }}">Kecamatan Kalideres</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/pegadungan') }}">Kelurahan Pegadungan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kelkalideres') }}">Kelurahan Kalideres</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/semanan') }}">Kelurahan Semanan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kamal') }}">Kelurahan Kamal</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/tegal-alur') }}">Kelurahan Tegal Alur</a></li>
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/tambora') }}">Kecamatan Tambora</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/jembatan-lima') }}">Kelurahan Jembatan Lima</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/tanah-sereal') }}">Kelurahan Tanah Sereal</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/duri-utara') }}">Kelurahan Duri Utara</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/duri-selatan') }}">Kelurahan Duri Selatan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/roa-malaka') }}">Kelurahan Roa Malaka</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/pekojan') }}">Kelurahan Pekojan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/krendang') }}">Kelurahan Krendang</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/keltambora') }}">Kelurahan Tambora</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kalianyar') }}">Kelurahan Kalianyar</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/angke') }}">Kelurahan Angke</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/jembatan-besi') }}">Kelurahan Jembatan Besi</a></li>
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/taman-sari') }}">Kecamatan Taman Sari</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/maphar') }}">Kelurahan Maphar</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/keagungan') }}">Kelurahan Keagungan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/mangga-besar') }}">Kelurahan Mangga Besar</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/tamansari') }}">Kelurahan Tamansari</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/tangki') }}">Kelurahan Tangki</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/glodok') }}">Kelurahan Glodok</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/krukut') }}">Kelurahan Krukut</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/pinangsia') }}">Kelurahan Pinangsia</a></li>								
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/kebon-jeruk') }}">Kecamatan Kebon Jeruk</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/duri-kepa') }}">Kelurahan Duri Kepa</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kelkebon-jeruk') }}">Kelurahan Kebon Jeruk</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kedoya-selatan') }}">Kelurahan Kedoya Selatan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kedoya-utara') }}">Kelurahan Kedoya Utara</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kelapa-dua') }}">Kelurahan Kelapa Dua</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/sukabumi-selatan') }}">Kelurahan Sukabumi Selatan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/sukabumi-utara') }}">Kelurahan Sukabumi Utara</a></li>								
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/kembangan') }}">Kecamatan Kembangan</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/joglo') }}">Kelurahan Joglo</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kembangan-selatan') }}">Kelurahan Kembangan Selatan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/kembangan-utara') }}">Kelurahan Kembangan Utara</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/meruya-selatan') }}">Kelurahan Meruya Selatan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/meruya-utara') }}">Kelurahan Meruya Utara</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/srengseng') }}">Kelurahan Srengseng</a></li>
								</ul>
							</li>
							<li>
								<a class="dropdown-item" href="{{ asset('/kecamatan/grogol-petamburan') }}">Kecamatan Grogol Petamburan</a>
								<ul class="dropdown-menu dropdown-submenu">
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/grogol') }}">Kelurahan Grogol</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/jelambar') }}">Kelurahan Jelambar</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/jelambar-baru') }}">Kelurahan Jelambar Baru</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/tanjung-duren-selatan') }}">Kelurahan Tanjung Duren Selatan</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/tanjung-duren-utara') }}">Kelurahan Tanjung Duren Utara</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/tomang') }}">Kelurahan Tomang</a></li>
									<li><a class="dropdown-item" href="{{ asset('/kelurahan/wijaya-kusuma') }}">Kelurahan Wijaya Kusuma</a></li>								
								</ul>
							</li>
						</ul>
					</li>
					@foreach ($menu as $index => $item)
					@if ($item->href == true)
						<li class="nav-item">
							<a class="nav-link" href="{{$item->link}}">{{ $item->keterangan }}</a>
						</li>
					@elseif ($index == 0)
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->keterangan }}</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<div class="d-flex custom-dropdown">
								@foreach ($submenu as $sub)
								@if ($sub->idMenu == $item->id)
									<div class="custom-dropdown-item2">
										<li class="px-3 pt-1"><h5>{{$sub->keterangan}}</h5></li>
										@foreach ($mainmenu as $main)
											@if ($main->idSubMenu == $sub->id)
												<li class="px-3 py-1 ul-custom"><a class="dropdown-item-custom" href="/profil/{{strtolower($sub->keterangan)}}/{{$main->id}}/{{strtolower($main->keterangan)}}"><div>{{$main->keterangan}}</div></a></li>
											@else
											@endif
										@endforeach
									</div>
								@else
								@endif
								@endforeach
							</div>
						</ul>
					</li>
					@elseif ($index != 0 && $item->submenu == true)
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->keterangan }}</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<div class="d-flex custom-dropdown">
								@foreach ($submenu as $sub)
								@if ($sub->idMenu == $item->id)
									<div class="custom-dropdown-item2">
										<li class="px-3 pt-1"><h5>{{$sub->keterangan}}</h5></li>
										@foreach ($mainmenu as $main)
											@if ($main->idSubMenu == $sub->id)
												@if (strtolower($main->keterangan) == 'pekppp 2023')
												<li class="px-3 py-1 ul-custom"><a class="dropdown-item-custom" href="/pekppp-2023"><div>{{$main->keterangan}}</div></a></li>
												@else
												<li class="px-3 py-1 ul-custom"><a class="dropdown-item-custom" href="/pemerintahan/{{strtolower($sub->keterangan)}}/{{$main->id}}/{{strtolower($main->keterangan)}}"><div>{{$main->keterangan}}</div></a></li>
												@endif
											@else
											@endif
										@endforeach
									</div>
								@else
								@endif
								@endforeach
							</div>
						</ul>
					</li>
					@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ $item->keterangan }}</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							@foreach ($submenu as $sub)
							@if ($sub->idMenu == $item->id)
								@if ($sub->link != null && $sub->blank == 0)
								<li><a class="dropdown-item" href="{{ $sub->link }}">{{$sub->keterangan}}</a></li>
								@elseif($sub->link != null && $sub->blank == 1)
								<li><a class="dropdown-item" href="{{ $sub->link }}" target="blank">
								@php
								$maxLength = 35;
								
								$keter = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $sub->keterangan, 0, PREG_SPLIT_NO_EMPTY);
								echo $keterangan_split = implode("<br>",$keter);
								
								@endphp
								</a></li>
								@else
								<li><a class="dropdown-item" href="/{{ strtolower($item->keterangan) }}/{{$sub->id}}/{{strtolower($sub->keterangan)}}">{{$sub->keterangan}}</a></li>
								@endif
							@else
							@endif
						@endforeach
						</ul>
					</li>
					@endif
					@endforeach
				</ul>
			</div>
		</div>
	</nav>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-8KL8RBX7ZV"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-8KL8RBX7ZV');
	</script>
</body>
</html>