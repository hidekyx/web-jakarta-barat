<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <div class="content col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="page-title">
                        <div class="breadcrumb float-left">
                            <ul>
                                <li><a href="#">Beranda</a></li>
                                <li>Berita Wilayah</li>
                                <li class="active">{{ $kewilayahan->nama }}</li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        @include('front.berita_pagination')
                    </div>
                    <div class="col-lg-6">
                        <form role="form">
                            <div class="input-group">
                                <input type="hidden" name="page" class="form-control">
                                <input type="text" name="search" class="form-control" placeholder="Cari konten berita">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span> 
                            </div>
                        </form>
                    </div>
                </div>
                
                <div id="blog" class="post-thumbnails">
                    @foreach($data['berita_paginate']['berita']['data'] as $key => $bp)
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-slider">
                                <div class="carousel dots-inside arrows-visible arrows-only" data-items="1" data-loop="true" data-autoplay="true" data-lightbox="gallery">
                                    <a href="https://barat.jakarta.go.id/storage/berita/{{ $bp['img'] }}" data-lightbox="gallery-image">
                                        <img alt="" src="https://barat.jakarta.go.id/storage/berita/{{ $bp['img'] }}" style="width: 100%; height: 200px !important; object-fit: cover;">
                                    </a>
                                    @if($bp['img_2'] != null)
                                    <a href="https://barat.jakarta.go.id/storage/berita/{{ $bp['img_2'] }}" data-lightbox="gallery-image">
                                        <img alt="" src="https://barat.jakarta.go.id/storage/berita/{{ $bp['img_2'] }}" style="width: 100%; height: 200px !important; object-fit: cover;">
                                    </a>
                                    @endif
                                    @if($bp['img_3'] != null)
                                    <a href="https://barat.jakarta.go.id/storage/berita/{{ $bp['img_3'] }}" data-lightbox="gallery-image">
                                        <img alt="" src="https://barat.jakarta.go.id/storage/berita/{{ $bp['img_3'] }}" style="width: 100%; height: 200px !important; object-fit: cover;">
                                    </a>
                                    @endif
                                    @if($bp['img_4'] != null)
                                    <a href="https://barat.jakarta.go.id/storage/berita/{{ $bp['img_4'] }}" data-lightbox="gallery-image">
                                        <img alt="" src="https://barat.jakarta.go.id/storage/berita/{{ $bp['img_4'] }}" style="width: 100%; height: 200px !important; object-fit: cover;">
                                    </a>
                                    @endif
                                </div>
                                <span class="post-meta-category">{{ $bp['kategori'] }}</span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($bp['time'])->isoFormat('D MMMM YYYY')}}</span>
                                <span class="post-meta-comments"><i class="fa fa-eye"></i>{{ $bp['viewed'] }} Dibaca</span>
                                <h2><a target="_blank" href="https://barat.jakarta.go.id/detailberita/{{ $bp['id'] }}">{{ $bp['title'] }}</a></h2>
                                <p>{{ Str::limit(strip_tags($bp['content']), 130) }}</p>
                                <a target="_blank" href="https://barat.jakarta.go.id/detailberita/{{ $bp['id'] }}" class="item-link">Baca Selengkapnya <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @include('front.berita_pagination')
                <p>Menampilkan berita ke-<b>{{ $data['berita_paginate']['berita']['from'] }}</b> sampai <b>{{ $data['berita_paginate']['berita']['to'] }}</b> dari <b>{{ $data['berita_paginate']['berita']['total'] }}</b> total berita.</p>
            </div>
            <div class="sidebar col-lg-3">
                @include('front.widget_berita')
            </div>
        </div>
    </div>
</section>