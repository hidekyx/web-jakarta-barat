<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid px-3">
        <img src="{{ asset('storage/assets/img/logo.png') }}" class="navbar-brand-img mr-2" style="height: 30px;" alt="main_logo">
        <a href="{{ asset('/rekrutmen') }}" class="navbar-brand font-weight-bold ms-lg-0 ms-3 ">Sudin Kominfotik JB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""><i class="fa fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link text_link" href="{{ asset('/rekrutmen/status') }}">
                <i class="fa fa-check-circle "></i>
                <span class="text_link">Cek Status Kandidat</span>
            </a>
            </div>
        </div>
    </div>
</nav>
<style>
    .text_link {
        cursor: pointer;
        font-family: inherit;
        font-size: inherit;
        font-style: inherit;
        font-weight: 500;
        color: #000;
    }
    .text_link:hover {
        color: #e91e63;
    }
    .btn {
        text-transform: capitalize;
    }
    .btn-info {
        color: #fff;
        padding-top: 10px;
        font-weight: 500;
        background-color: #1A73E8;
    }
    .btn-info:hover {
        color: #fff;
        background-color: #0dcaf0;
    }
    .btn-success {
        color: #fff;
        padding-top: 10px;
        font-weight: 500;
        background-color: #20c997;
    }
    .btn-success:hover {
        color: #fff;
        background-color: #81E6D9;
    }
    .btn-danger {
        color: #fff;
        padding-top: 10px;
        font-weight: 500;
    }
    .btn-danger:hover {
        color: #fff;
    }
    .btn-primary {
        color: #fff;
        padding-top: 10px;
        font-weight: 500;
        background-color: #e91e63;
    }
    .btn-primary:hover {
        background-color: #d63384;
    }
    .btn-dark {
        padding-top: 10px;
        font-weight: 500;
    }
</style>