<!--=========== breadcrumb Section Start =========-->
<div class="sc-breadcrumb-style sc-pt-135 sc-pb-110">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-12">
                <div class="sc-slider-content p-z-idex">
                    @isset($subpage)
                    <div class="sc-slider-subtitle">{{ $page }} - {{ $subpage }}</div>
                    <h2 class="slider-title white-color sc-mb-25 sc-sm-mb-15">{{ $subpage }}</h2>
                    @else
                    <h2 class="slider-title white-color sc-mb-25 sc-sm-mb-15">{{ $page }}</h2>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
<!--=========== breadcrumb Section End =========-->