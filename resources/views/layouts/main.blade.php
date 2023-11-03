<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Kota Administrasi Jakarta Barat</title>

        <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}"
        type = "image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-211813157-1"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
    @include('layouts.disabilitas')

    <!-- BEGIN: Header-->
    @include('panels.frontend1.header')
    <!-- END: Header-->




    <section class="pt-5" style="background-color: #f3f3f3;">

    @include('panels.frontend1.BeritaTerbaru')

    </section>

    <section>
    @include('panels.frontend1.BeritaFoto')
    </section>

    <section>
        @include('panels.frontend1.VideoTerbaru')
    </section>



    @include('panels.frontend1.PejabatTeras')


    @include('panels.frontend1.Statistik')

    @if ($status_popup == "Y")
        @include('panels.frontend1.popup')
    @endif

    @include('panels.frontend1.Footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var bool;
	    const now = new Date();
        if(localStorage.getItem('views') == undefined){
            const view = {
                value: 1,
                cross : now.getFullYear(),
                expiry: now.getFullYear() * now.getMonth() + now.getDate(),
            }
            localStorage.setItem('views',JSON.stringify(view))
            window.location.href = '/input-stats';
        } else {
            const viewStr = localStorage.getItem('views');
            const viewparse = JSON.parse(viewStr)
            const pagu = now.getFullYear() * now.getMonth() + now.getDate();
            const crossstop = now.getFullYear();
            if(crossstop > viewparse.cross){
                const view = {
                    value: 1,
                    expiry: now.getFullYear() * now.getMonth() + now.getDate(),
                    cross : now.getFullYear
                }
                console.log('hit');
                localStorage.setItem('views',JSON.stringify(view))
                window.location.href = '/input-stats';
            } else if( pagu > expiry){
                const view = {
                    value: 1,
                    expiry: now.getFullYear() * now.getMonth() + now.getDate(),
                    cross : now.getFullYear
                }
                console.log('hit');
                localStorage.setItem('views',JSON.stringify(view))
                window.location.href = '/input-stats';
            }
            else {
                if(localStorage.getItem('key') == undefined){
                    $(window).on('load', function() {
                    if(bool == undefined){
                        $('#popupModal').modal('show');
                    } else {

                    }
                    });
                    $(document).ready(function(){
                        $(document).on('click', '#close', function(){
                            bool = true;
                            const item = {
                                value: 1,
                                expiry: now.getFullYear() * now.getMonth() + now.getDate(),
                            }
                            localStorage.setItem('key',JSON.stringify(item));
                        })
                    })
                } else {
                    const itemStr = localStorage.getItem('key');
                    const item = JSON.parse(itemStr)
                    const pagu = now.getFullYear() * now.getMonth() + now.getDate();
                    if(pagu > item.expiry){
                        localStorage.removeItem('key');
                        $(window).on('load', function() {
                        if(bool == undefined){
                            $('#popupModal').modal('show');
                        } else {

                        }
                        });
                        $(document).ready(function(){
                            $(document).on('click', '#close', function(){
                                bool = true;
                                const item = {
                                    value: 1,
                                    expiry: now.getTime(),
                                }
                                localStorage.setItem('key',JSON.stringify(item));
                            })
                        })
                    }
                }
            }
        }
        // $(window).on('beforeunload', function (){
        //     localStorage.removeItem('key');
        // });
        </script>
    </body>
</html>
