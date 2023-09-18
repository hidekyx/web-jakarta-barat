<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!-- Popup Modal -->
<div id="popModal" class="modal fade" role="dialog" style="font-family: 'Poppins';">
    <div class="modal-dialog">
        @foreach ($pop as $p)
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $p->nama }}</h4>
                <a type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
            </div>
            <div class="modal-body">
                @if ($p->img != null)
                    <img width="100%" src="{{ asset('storage/popup/'.$p->img) }}" alt="">
                @endif
                <p>{!! $p->ket !!}</p>
            </div>
        </div>
        @endforeach

    </div>
  </div>

    <script>
    $(function() {  $("#popModal").modal('show'); });
    </script>
