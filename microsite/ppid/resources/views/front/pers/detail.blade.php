<div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <img class="img-fluid w-100 rounded" src="#" alt="">
                        <div class="mb-3">
                            <span class="badge bg-success">Topik: {{ $siaran_pers['topic'] }}</span>
                            <span class="badge bg-dark"><i class="far fa-calendar me-2"></i>{{ \Carbon\Carbon::parse($siaran_pers['date_release'])->isoFormat('dddd, DD MMMM Y')}}</span>
                            <hr>
                        </div>
                        
                        <h1 class="mb-4">{{ $siaran_pers['title'] }}</h1>
                        <span style="font-weight: 600;">{{ $siaran_pers['location'] }}</span>
                        {!! htmlspecialchars_decode(htmlspecialchars_decode($siaran_pers['isipers'])) !!}
                        <div class="my-3">
                            <p style="font-weight: 600;" class="mb-0">Suku Dinas Kominfotik Kota Administrasi Jakarta Barat</p>
                            <table>
                                <tr>
                                    <td>Website</td>
                                    <td class="px-3">:</td>
                                    <td><a href="https://barat.jakarta.go.id">barat.jakarta.go.id</a> / <a href="https://barat.jakarta.go.id/ppid">barat.jakarta.go.id/ppid</a></td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td class="px-3">:</td>
                                    <td><a href="https://twitter.com/kotajakbar">@kotajakbar</a></td>
                                </tr>
                                <tr>
                                    <td>Facebook</td>
                                    <td class="px-3">:</td>
                                    <td><a href="https://www.facebook.com/kotaadmjakartabarat">Kota Jakarta Barat</a></td>
                                </tr>
                                <tr>
                                    <td>Instagram</td>
                                    <td class="px-3">:</td>
                                    <td><a href="https://www.instagram.com/kotajakartabarat/">Kota Jakarta Barat</a></td>
                                </tr>
                            </table>
                            <a href="{{ str_replace('save-pers', 'save-pers-wilayah-jakbar', $siaran_pers['linkdownload']) }}" class="btn btn-primary py-2 px-4 mt-2">Download</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <div class="text-center">
                    @isset($siaran_pers['allimage'])
                        @foreach($siaran_pers['allimage'] as $spi)
                            @if($spi['statusimage'] == "ada")
                                <!-- <div class="detail-pic"> -->
                                    <img src="{{ $spi['imagecover'] }}" class="detail-pic rounded zoom mx-auto me-2 ms- mb-2 mt-2">
                                <!-- </div> -->
                            @endif
                        @endforeach
                    @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>






                        