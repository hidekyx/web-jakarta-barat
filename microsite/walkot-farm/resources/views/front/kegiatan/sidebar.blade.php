<div class="sidebar">
    <!--Widget Start-->
    <div class="side-widget">
        <h5>Search</h5>
        <div class="side-search">
            <form>
            <input type="search" class="form-control" placeholder="Search">
            <button><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <!--Widget End--> 
    <!--Widget Start-->
    <div class="side-widget">
        <h5>Kegiatan Terbaru</h5>
        <ul class="lastest-products">
            @foreach ($widgetkegiatan as $wk)
            <li>
                <img style="width: 100px;" src="{{ asset('storage/images/kegiatan/'.$wk->gambar) }}" alt=""> 
                <strong><a href="{{ asset('/kegiatan/'.$wk->id) }}">{!! Str::limit($wk->judul, 20) !!}</a></strong> 
                <span class="pdate"><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($wk->tanggal)->isoFormat('D MMMM Y')}}</span> 
            </li>
            @endforeach
        </ul>
        
    </div>
    <!--Widget End--> 
</div>