<section id="page-content">
    <div class="container">
        <div class="heading-text heading-gradient heading-section text-center">
            <h2><span>Berita Wilayah</span></h2>
        </div>
        <nav class="grid-filter gf-outline" data-layout="#blog">
            <ul>
                <li class="active"><a href="#" data-category="*">Semua</a></li>
                <li><a href="#" data-category=".berita-Pemerintahan">Pemerintahan</a></li>
                <li><a href="#" data-category=".berita-Perekonomian">Perekonomian</a></li>
                <li><a href="#" data-category=".berita-Pembangunan">Pembangunan</a></li>
                <li><a href="#" data-category=".berita-Kesejahteraan-Masyarakat">Kesejahteraan Masyarakat</a></li>
            </ul>
            <div class="grid-active-title">Show All</div>
        </nav>
        <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
            @foreach($data['berita'] as $db)
            <div class="post-item border berita-{{ str_replace(' ','-', $db['kategori']) }} grey-bg">
                <div class="post-item-wrap" style="height: 55vh;">
                    <div class="post-image">
                        @if($db['thumbnail'])
                        <a href="https://barat.jakarta.go.id/detailberita/{{ $db['id'] }}"><img alt="" src="https://barat.jakarta.go.id/storage/berita/thumbnail/{{ $db['thumbnail'] }}" style="width: 100%; height: 200px !important; object-fit: cover;" ></a>
                        @else
                        <a href="https://barat.jakarta.go.id/detailberita/{{ $db['id'] }}"><img alt="" src="https://barat.jakarta.go.id/storage/berita/{{ $db['img'] }}" style="width: 100%; height: 200px !important; object-fit: cover;" ></a>
                        @endif
                        <span class="post-meta-category"><a href="">{{ $db['kategori'] }}</a></span>
                    </div>
                    <div class="post-item-description">
                        <span class="post-meta-date"><i class="fa fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($db['time'])->isoFormat('D MMMM YYYY')}}</span>
                        <span class="post-meta-comments"><a href=""><i class="fa fa-eye"></i>{{ $db['viewed'] }} Dibaca</a></span>
                        <h2><a href="https://barat.jakarta.go.id/detailberita/{{ $db['id'] }}">{{ $db['title'] }}</a></h2>
                        <p>{{ Str::limit(strip_tags($db['content']), 100) }}</p>
                        <a href="https://barat.jakarta.go.id/detailberita/{{ $db['id'] }}" class="item-link">Baca Selengkapnya <i class="icon-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>