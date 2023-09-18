<div id="slider" class="inspiro-slider slider-fullscreen dots-creative background-dark" data-fade="true">
    @if($data['foto-keperluan-website']->foto_bangunan)
        <div class="slide kenburns bg-overlay" data-bg-image="{{ asset('storage/files/images/foto/banner/'.$data['foto-keperluan-website']->foto_bangunan) }}"></div>
    @endif
    @if($data['foto-keperluan-website']->foto_banner_1)
        <div class="slide kenburns bg-overlay" data-bg-image="{{ asset('storage/files/images/foto/banner/'.$data['foto-keperluan-website']->foto_banner_1) }}"></div>
    @endif
    @if($data['foto-keperluan-website']->foto_banner_2)
        <div class="slide kenburns bg-overlay" data-bg-image="{{ asset('storage/files/images/foto/banner/'.$data['foto-keperluan-website']->foto_banner_2) }}"></div>
    @endif
    @if($data['foto-keperluan-website']->foto_banner_3)
        <div class="slide kenburns bg-overlay" data-bg-image="{{ asset('storage/files/images/foto/banner/'.$data['foto-keperluan-website']->foto_banner_3) }}"></div>
    @endif
</div>