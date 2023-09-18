var loadFile = function(event) {
    var image = document.getElementById('img-rider');
    image.src = URL.createObjectURL(event.target.files[0]);
};



$('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
});
           