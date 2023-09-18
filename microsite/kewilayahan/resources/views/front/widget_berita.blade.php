<div class="widget">
    <h4 class="widget-title">Berita Terbaru</h4>
    <div class="post-thumbnail-list">
        @foreach($data['berita'] as $key => $db)
        <div class="post-thumbnail-entry">
            @if($db['thumbnail'])
            <img alt="" src="https://barat.jakarta.go.id/storage/berita/thumbnail/{{ $db['thumbnail'] }}" style="width: 60px; height: 48px !important; object-fit: cover;" >
            @else
            <img alt="" src="https://barat.jakarta.go.id/storage/berita/{{ $db['img'] }}" style="width: 64px; height: 48px !important; object-fit: cover;" >
            @endif
            
            <div class="post-thumbnail-content">
                <a href="https://barat.jakarta.go.id/detailberita/{{ $db['id'] }}">{{ $db['title'] }}</a>
                <span class="post-date"><i class="icon-calendar"></i>{{ \Carbon\Carbon::parse($db['time'])->isoFormat('D MMMM YYYY')}}</span>
                <span class="post-category"><i class="fa fa-tag"></i> {{ $db['kategori'] }}</span>
            </div>
        </div>
        @if($key == 4) @break @endif
        @endforeach
    </div>
</div>