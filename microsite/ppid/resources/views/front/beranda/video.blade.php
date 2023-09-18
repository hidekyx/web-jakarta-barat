<div class="container-fluid wow fadeInUp" data-wow-delay="0.5s">
    <div class="container pb-5 pt-0 mb-0">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h3 class="mb-0">Video PPID</h3>
        </div>
        <div class="bg-white text-center">
            <div class="row">

                <div class="col-lg-4 col-12">
                    <img class="rounded wow zoomIn" data-wow-delay="0.9s" width="300" height="200"  src="https://img.youtube.com/vi/sbxAhPYn2Ko/0.jpg">    
                    <button type="button" class="btn btn-outline-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s" data-bs-toggle="modal" data-bs-target="#modalVideo1" style="margin-bottom:50px;">Lihat
                    </button>
                    <div class="modal fade" id="modalVideo1" role="dialog">
                        <div class="modal-dialog modal-lg" >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="width:100%; height:10%; text-align:center;position:relative; top:40%;">PROFIL PPID KOTA ADMINISTRASI JAKARTA BARAT</h5>
                                </div>
                                <div class="modal-body">
                                    <iframe class="w-100" style="height: 350px;" src="https://www.youtube.com/embed/sbxAhPYn2Ko?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-12">
                    <img class="rounded wow zoomIn" data-wow-delay="0.9s" width="300" height="200" src="https://img.youtube.com/vi/3BTWDrlQLXc/0.jpg">                    
                    <button type="button" class="btn btn-outline-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s" data-bs-toggle="modal" data-bs-target="#modalVideo2" style="margin-bottom:50px;">Lihat
                    </button>
                    <div class="modal fade" id="modalVideo2" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="width:100%;height:10%;text-align:center;position:relative;top:40%;">Profil PPID Jakarta Barat Tahun 2022</h5>
                                </div>
                                <div class="modal-body">
                                    <iframe class="w-100" style="height: 350px;" src="https://www.youtube.com/embed/3BTWDrlQLXc?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-12">
                    <img class="rounded wow zoomIn" data-wow-delay="0.9s" width="300" height="200" src="https://img.youtube.com/vi/qffjHuMef3I/0.jpg">                     
                    <button type="button" class="btn btn-outline-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s" data-bs-toggle="modal" data-bs-target="#modalVideo3" style="margin-bottom:50px;">Lihat
                    </button>
                    <div class="modal fade" id="modalVideo3" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="width:100%;height:10%;text-align:center;position:relative;top:40%;">Hari Hak Untuk Tahu Se-dunia</h5>
                                </div>
                                <div class="modal-body">
                                    <iframe class="w-100" id="video-3" style="height: 350px;" src="https://www.youtube.com/embed/qffjHuMef3I?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="button-close-3" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <script>
                $("#button-close-1").on('click', function (e) {
                    $("#video-1").attr("src", $("#video-1").attr("src"));
                });
                $("#button-close-2").on('click', function (e) {
                    $("#video-2").attr("src", $("#video-2").attr("src"));
                });
                $("#button-close-3").on('click', function (e) {
                    $("#video-3").attr("src", $("#video-3").attr("src"));
                });
                </script>
                
            </div>
        </div>
    </div>
</div>

