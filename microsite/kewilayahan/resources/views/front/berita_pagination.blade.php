@if(isset($data['berita_paginate']['search']))
<ul class="pagination">
    @if($data['berita_paginate']['berita']['current_page'] >= 2)
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?search={{ $data['berita_paginate']['search'] }}&page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?search={{ $data['berita_paginate']['search'] }}&page={{ $data['berita_paginate']['berita']['current_page']-1 }}"><i class="fa fa-angle-left"></i></a></li>
    @else
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
    @endif
    
    @if($data['berita_paginate']['berita']['current_page'] != 1 && $data['berita_paginate']['berita']['current_page'] != 2)
        <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?search={{ $data['berita_paginate']['search'] }}&page={{ $data['berita_paginate']['berita']['current_page']-2 }}">{{ $data['berita_paginate']['berita']['current_page']-2 }}</a></li>
    @endif
    @if($data['berita_paginate']['berita']['current_page'] >= 2)
        <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?search={{ $data['berita_paginate']['search'] }}&page={{ $data['berita_paginate']['berita']['current_page']-1 }}">{{ $data['berita_paginate']['berita']['current_page']-1 }}</a></li>
    @endif

    <li class="page-item active"><a class="page-link" href="#">{{ $data['berita_paginate']['berita']['current_page'] }}</a></li>

    @if($data['berita_paginate']['berita']['current_page'] != $data['berita_paginate']['berita']['last_page'])
        <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?search={{ $data['berita_paginate']['search'] }}&page={{ $data['berita_paginate']['berita']['current_page']+1 }}">{{ $data['berita_paginate']['berita']['current_page']+1 }}</a></li>
        @if($data['berita_paginate']['berita']['current_page']+1 != $data['berita_paginate']['berita']['last_page'])
            <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['current_page']+2 }}">{{ $data['berita_paginate']['berita']['current_page']+2 }}</a></li>
        @endif
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?search={{ $data['berita_paginate']['search'] }}&page={{ $data['berita_paginate']['berita']['current_page']+1 }}"><i class="fa fa-angle-right"></i></a></li>
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?search={{ $data['berita_paginate']['search'] }}&page={{ $data['berita_paginate']['berita']['last_page'] }}"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
    @else
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
    @endif
</ul>
@else
<ul class="pagination">
    @if($data['berita_paginate']['berita']['current_page'] >= 2)
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page=1"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['current_page']-1 }}"><i class="fa fa-angle-left"></i></a></li>
    @else
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left"></i><i class="fa fa-angle-left"></i></a></li>
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
    @endif
    
    @if($data['berita_paginate']['berita']['current_page'] != 1 && $data['berita_paginate']['berita']['current_page'] != 2)
        <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['current_page']-2 }}">{{ $data['berita_paginate']['berita']['current_page']-2 }}</a></li>
    @endif
    @if($data['berita_paginate']['berita']['current_page'] >= 2)
        <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['current_page']-1 }}">{{ $data['berita_paginate']['berita']['current_page']-1 }}</a></li>
    @endif

    <li class="page-item active"><a class="page-link" href="#">{{ $data['berita_paginate']['berita']['current_page'] }}</a></li>

    @if($data['berita_paginate']['berita']['current_page'] != $data['berita_paginate']['berita']['last_page'])
        <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['current_page']+1 }}">{{ $data['berita_paginate']['berita']['current_page']+1 }}</a></li>
        @if($data['berita_paginate']['berita']['current_page']+1 != $data['berita_paginate']['berita']['last_page'])
            <li class="page-item "><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['current_page']+2 }}">{{ $data['berita_paginate']['berita']['current_page']+2 }}</a></li>
        @endif
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['current_page']+1 }}"><i class="fa fa-angle-right"></i></a></li>
        <li class="page-item"><a class="page-link" href="{{ asset('/'.$kewilayahan->username) }}/berita?page={{ $data['berita_paginate']['berita']['last_page'] }}"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
    @else
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></li>
    @endif
</ul>
@endif