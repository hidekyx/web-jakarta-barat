    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />


    <footer class="pt-5 pb-4" style="background-image: url('/assets/images/footer.png');  height:auto; " style="font-family: 'Poppins';">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-5" align="center">
                    <img style="height: 100px" src="/assets/images/logo/logo_jakbar.png">
                </div>

                <div class="col-lg-3 col-md-12 mb-5">
                    <h4 style="color: #ff4500">Visitor Counter</h4>
                    <script type="text/javascript" src="//counter.websiteout.net/js/7/7/0/0"></script>
                </div>

                <div class="col-lg-3 col-md-12 mb-5">
                    <h4 style="color: #ff4500;">Statistik Pengunjung</h4>
                    <table border="0" align="center" style="  font-size=10px; display: d-flex; color: white">
                        <tbody>
                            @foreach ($stats as $s)
                            <tr>
                            <td width="86" align="left" valign="middle"> Hari Ini</td>
                            <td width="82" align="left" valign="middle">: {{$s->hari}}</td>
                            </tr>
                            <tr>

                                <td align="left" valign="middle">Kemarin</td>
                                <td align="left" valign="middle">: {{$s->kemarin}}</td>
                            </tr>
                            <tr>

                                <td align="left" valign="middle">Bulan ini </td>
                                <td align="left" valign="middle"> : {{$s->bulanIni}}</td>
                            </tr>
                            <tr>

                                <td align="left" valign="middle">Tahun ini </td>
                                <td align="left" valign="middle">: {{$s->tahunIni}}</td>
                            </tr>
                            <tr>

                                <td width="98" align="left" valign="middle">Total</td>
                                <td width="138" align="left" valign="middle">: {{$s->total}}</td>
                            </tr>
                            <tr>

                                <td align="left" valign="middle">Hits Count </td>
                                <td align="left" valign="middle">: {{$s->hari}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>


                <div class="col-lg-3 col-md-12 mb-5">
                    <h4 style="color: #ff4500;">Alamat</h4>
            <p style="color: ghostwhite;  font-size:14px font-weight:bold"><b> Kantor Walikota Administrasi Jakarta Barat </b><br> Jalan Raya Kembangan No.2 Kota Jakarta Barat Provinsi DKI Jakarta <br>Telp : 021-5821740 <br>Fax : 021-5821740 <br>Website : https://barat.jakarta.go.id/
            <br>Email : sekkojakbar@jakarta.go.id</p>

            <p style=" color: white; font-family: 'Poppins';">SOCIAL MEDIA</p>
            <a href="https://www.facebook.com/kotaadmjakartabarat""><img style="height: 20px; width: 20px"  src="/assets/images/icon/facebook.png" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://twitter.com/kotajakbar""><img style="height: 20px; width: 20px"  src="/assets/images/icon/twitter.png" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://www.youtube.com/channel/UChXtiMFK84Q1od1R_SvEbuQ/featured""><img style="height: 20px; width: 20px"  src="/assets/images/icon/youtube.png" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="https://instagram.com/kotajakartabarat?utm_medium=copy_link"><img style="height: 20px; width: 20px"  src="/assets/images/icon/instagram.png" ></a>&nbsp;&nbsp;&nbsp;&nbsp;


                </div>
            </div>
        </div>
        <div style=" color: gray; padding-top: 30px; ">
            <center>
                <small>KOTA ADMINISTRASI JAKARTA BARAT</small>
            </center>
        </div>
    </footer>
