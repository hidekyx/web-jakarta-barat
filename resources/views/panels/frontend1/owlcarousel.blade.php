<script>
    $(document).ready(function() {

 $("#owl-demo").owlCarousel({

     navigation : true, // Show next and prev buttons
     slideSpeed : 300,
     paginationSpeed : 400,
     singleItem:true

     // "singleItem:true" is a shortcut for:
     // items : 1,
     // itemsDesktop : false,
     // itemsDesktopSmall : false,
     // itemsTablet: false,
     // itemsMobile : false

 });

});
</script>

<div id="owl-demo" class="owl-carousel owl-theme">

    <div class="item"><img src="assets/images/Banner.png" alt="The Last of us"></div>
    <div class="item"><img src="assets/images/Header.jpg" alt="GTA V"></div>
    <div class="item"><img src="assets/fullimage3.jpg" alt="Mirror Edge"></div>

</div>
