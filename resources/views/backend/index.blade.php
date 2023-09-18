@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            {{-- <section id="dashboard-analytics">
                DASHBOARD
                <p>link template : <a href="https://themeforest.net/item/frest-clean-minimal-bootstrap-admin-dashboard-template/24656841">https://themeforest.net/item/frest-clean-minimal-bootstrap-admin-dashboard-template/24656841</a></p>
            </section> --}}
            <!-- Dashboard Analytics end -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                  </div>
                  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button>
                </div>
              </div>

              <section id="dashboard-analytics">
                <div class="row">
                  <!-- Website Analytics Starts-->
                  <div class="col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Data Statistik Pengunjung</h4>
                      </div>
                      @foreach ($statistik as $stats)
                      <div class="card-body pb-1">
                        <div class="d-flex justify-content-around align-items-center flex-wrap">
                          <div class="user-analytics mr-2">
                            <i class="bx bx-user mr-25 align-middle"></i>
                            <span class="align-middle text-muted">Hari Ini</span>
                            <div class="d-flex">
                              <div id="radial-success-chart"></div>
                              <h3 class="mt-1 ml-50">{{$stats->hari}}</h3>
                            </div>
                          </div>
                          <div class="sessions-analytics mr-2">
                            <i class="bx bx-user mr-25 align-middle"></i>
                            <span class="align-middle text-muted">Kemarin</span>
                            <div class="d-flex">
                              <div id="radial-warning-chart"></div>
                              <h3 class="mt-1 ml-50">{{$stats->kemarin}}</h3>
                            </div>
                          </div>
                          <div class="bounce-rate-analytics">
                            <i class="bx bx-user mr-25 align-middle"></i>
                            <span class="align-middle text-muted">Bulan Ini</span>
                            <div class="d-flex">
                              <div id="radial-danger-chart"></div>
                              <h3 class="mt-1 ml-50">{{$stats->bulanIni}}</h3>
                            </div>
                          </div>
                        </div>
                        <div id="analytics-bar-chart" class="my-75"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="col-xl-5 col-md-6 col-12 activity-card">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Data Input (Bulan Ini)</h4>
                      </div>
                      <div class="card-body pt-1">
                        <div class="d-flex activity-content">
                          <div class="avatar bg-rgba-primary m-0 mr-75">
                            <div class="avatar-content">
                              <i class="bx bx-news text-primary"></i>
                            </div>
                          </div>
                          <div class="activity-progress flex-grow-1">
                            <small class="text-muted d-inline-block mb-50">Berita</small>
                            @foreach ($data as $d)
                                <small class="float-right">{{$d->jumlah}}</small>
                            @endforeach
                          </div>
                        </div>
                        <div class="d-flex activity-content">
                          <div class="avatar bg-rgba-success m-0 mr-75">
                            <div class="avatar-content">
                              <i class="bx bx-photo-album text-success"></i>
                            </div>
                          </div>
                          <div class="activity-progress flex-grow-1">
                            <small class="text-muted d-inline-block mb-50">Berita Foto</small>
                            @foreach ($data2 as $d)
                                <small class="float-right">{{$d->jumlah}}</small>
                            @endforeach
                          </div>
                        </div>
                        <div class="d-flex activity-content">
                          <div class="avatar bg-rgba-warning m-0 mr-75">
                            <div class="avatar-content">
                              <i class="bx bx-video text-warning"></i>
                            </div>
                          </div>
                          <div class="activity-progress flex-grow-1">
                            <small class="text-muted d-inline-block mb-50">Berita Video</small>
                            @foreach ($data3 as $d)
                                <small class="float-right">{{$d->jumlah}}</small>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              {{-- @foreach ($useratt as $user) --}}
                  {{-- <script>
                      var array = $useratt;
                      $(window).on('load', function() {
                        $.each( array, function( key, value ) {
                            const item = {
                                    value: value.aname,
                                    roles: value.id_role,
                                }
                                localStorage.setItem('case',JSON.stringify(item));
                            })
                        })
                  </script> --}}
              {{-- @endforeach --}}
              <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

        </div>
    </div>
</div>
@endsection
