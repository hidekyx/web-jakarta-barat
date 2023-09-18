<!--Blog Start-->
<section class="wf100 p80 team">
   <div class="team-details">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <div class="team-large-img"> <img src="{{ asset('storage/images/tanaman/'.$tanaman->gambar) }}" alt=""><br> </div>
            </div>
            <div class="col-md-7">
               <div class="team-details-txt">
                  <h2>{{ $tanaman->nama_tanaman_indonesia }}</h2>
                  <strong class="trank">{{ $tanaman->nama_tanaman_latin }}</strong>
                  <p>{{ $tanaman->keterangan }}</p>
                  <div class="share-post wf100">
                     <div class="sosmed">
                        <strong>Share tanaman ini:</strong>
                        <a href="#" class="fb"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
                     </div>
                     <div class="panah">
                        @if($paging_tanaman['previous'])
                        <a href="{{ $paging_tanaman['previous'] }}" class="arrow"><i class="fas fa-chevron-left"></i></a>
                        @endif
                        @if($paging_tanaman['next'])
                        <a href="{{ $paging_tanaman['next'] }}" class="arrow"><i class="fas fa-chevron-right"></i></a>
                        @endif
                     </div>
                  </div>

               
                  <a data-toggle="collapse" href="#qrcode" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn contact-team mr-5">Tampilkan QR Code</a>
                  <br></br>
                     
                  <div class="collapse mb-3" id="qrcode">
                     <div class="card" style="width: 13rem;" card-body>
                           <img src="{{ asset('storage/images/qrcode/' .$tanaman->qrcode) }}" alt="gambar barcode tanaman">
                     </div>
                  </div>
                  
                  <!-- Duplicat Button Page -->
                  <!-- <a href="https://barat.jakarta.go.id/walkot-farm/tanaman/hias/3" target="_blank" class="btn contact-team">Previous</a> -->
                  <!-- Duplicat Button Page -->
                  <!-- <a href="https://barat.jakarta.go.id/walkot-farm/tanaman/hias/3" target="_blank" class="btn contact-team ">Next</a> -->

                  
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--Blog End-->
