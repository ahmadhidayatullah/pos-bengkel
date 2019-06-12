@extends('layouts.template')

@section('content')
<div class="">
    <div class="row top_tiles">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-users"></i></div>
          <div class="count">179</div>
          <h3>User</h3>
          <p>total master user.</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-table"></i></div>
          <div class="count">179</div>
          <h3>Barang</h3>
          <p>total master barang.</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-windows"></i></div>
          <div class="count">179</div>
          <h3>Kategori</h3>
          <p>total master kategori.</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-cart-plus"></i></div>
          <div class="count">179</div>
          <h3>Transaksi</h3>
          <p>total transaksi.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Transaksi Terakhir <small>10 terakhir</small></h2>
            <div class="filter">
              {{-- <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
              </div> --}}
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div>
                <ul class="list-unstyled top_profiles scroll-view">
                    <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-green profile_thumb">
                        <i class="fa fa-user green"></i>
                        </a>
                        <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-blue profile_thumb">
                        <i class="fa fa-user blue"></i>
                        </a>
                        <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user aero"></i>
                        </a>
                        <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                        </div>
                    </li>
                    <li class="media event">
                        <a class="pull-left border-green profile_thumb">
                        <i class="fa fa-user green"></i>
                        </a>
                        <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                        </div>
                    </li>
                </ul>
               
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Weekly Summary <small>Activity shares</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
              <div class="col-md-7" style="overflow:hidden;">
                <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                              <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                <h4 style="margin:18px">Weekly sales progress</h4>
              </div>

              <div class="col-md-5">
                <div class="row" style="text-align: center;">
                  <div class="col-md-4">
                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                    <h4 style="margin:0">Bounce Rates</h4>
                  </div>
                  <div class="col-md-4">
                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                    <h4 style="margin:0">New Traffic</h4>
                  </div>
                  <div class="col-md-4">
                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                    <h4 style="margin:0">Device Share</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('css')
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection

@section('js')
    <!-- Chart.js -->
    <script src="{{asset('assets/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{asset('assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('assets/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('assets/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('assets/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('assets/vendors/DateJS/build/date.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('assets/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@endsection
