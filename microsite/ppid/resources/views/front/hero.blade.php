<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">{{ strtoupper($page) }}</h1>
            @if($subpage != null)
            <a href="" class="h5 text-white animated wow fadeIn" data-wow-delay="0.3s">{{ $subpage }}</a>
            @endif
        </div>
    </div>
</div>