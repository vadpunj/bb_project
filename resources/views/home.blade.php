@extends('layout')

@section('title')
<title>Home page</title>
@endsection

@section('css')
  <!-- <link href="{{ asset('admin/node_modules/@coreui/icons/css/coreui-icons.min.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('admin/node_modules/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/node_modules/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  <style>
    .word {
      color: #fff !important;
    }
  </style>
@endsection

@section('content')
  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">หน้าแรก</a>
      </li>
      <li class="breadcrumb-item active">ดูข้อมูล</li>
    </ol>
    <!-- end breadcrumb -->
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
          <div class="card-header word">
            @if (session()->has('notification'))
              <div class="notification">
                {!! session('notification') !!}
              </div>
            @endif
          <i class="fa fa-align-justify"></i> Simple Table</div>
            <form class="form-horizontal" action="route('insert')" method="post">
              <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">วันที่ผ่านรายการ</label>
                      <div class="form-group col-sm-4">
                        <div class="input-group">
                          <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                          </span>
                          <input class="form-control" type="date" name="date">
                        </div>
                      </div>
                    <label class="col-md-2 col-form-label">ศูนย์ต้นทุน</label>
                    <div class="form-group col-sm-4">
                      <input class="form-control" type="text" name="source">
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-2 col-form-label">วันที่ผ่านรายการ</label>
                    <div class="form-group col-sm-4">
                      <div class="input-group">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                        <input class="form-control" type="date" name="date">
                      </div>
                    </div>
                    <label class="col-md-2 col-form-label">สาขาหน่วยงาน</label>
                    <div class="form-group col-sm-4">
                      <input class="form-control" type="text" name="source">
                    </div>
                </div>
              </div>
              <div class="col-md-2 form-group form-actions">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </main>
@endsection

@section('js')
  <script src="{{ asset('admin/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/pace-progress/pace.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/@coreui/coreui/dist/js/coreui.min.js') }}"></script>
@endsection