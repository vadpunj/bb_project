@extends('layout')

@section('title')
<title>CoreUI</title>
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
  <link href="{{ asset('admin/css/jquery.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/js/jquery-1.12.0.js') }}" rel="stylesheet">

  <style>
    .word {
      color: #fff !important;
    }
  </style>
@endsection
@section('content')
  <main class="main">
   <h3 align="center">Import Excel File</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
    {{ csrf_field() }}
    <div class="form-group">
      <a class="btn btn-primary" href="{{url('export_excel/export')}}">Export</a>
    </div>

   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Electric Data</h3>
    </div>
    <div class="panel-body">
      <div class="card-body">
        <table class="table table-responsive-sm table-bordered myTable">
          <thead>
              <th>TIME KEY</th>
              <th>ASSET ID</th>
              <th>COST CENTER</th>
              <th>METER ID</th>
              <th>M UNIT</th>
              <th>M UNIT PRICE</th>
              <th>M Cost TOTAL</th>
              <th>ACTIVITY CODE</th>
              <th>Create Date</th>
          </thead>
          <tbody>
         @foreach($data as $row)
           <tr>
            <td>{{ $row->TIME_KEY }}</td>
            <td>{{ $row->ASSET_ID }}</td>
            <td>{{ $row->COST_CENTER }}</td>
            <td>{{ $row->METER_ID }}</td>
            <td align="right">{{ number_format($row->M_UNIT) }}</td>
            <td>{{ $row->M_UNIT_PRICE }}</td>
            <td align="right">{{ number_format($row->M_Cost_TOTAL,2) }}</td>
            <td align="center">{{ $row->ACTIVITY_CODE }}</td>
            <td>{{ Func::get_date($row->created_at) }}</td>
           </tr>
         @endforeach
          </tbody>
        </table>
      </div>
     </div>
   </div>
 </main>
@endsection

  @section('js')
  <script src="{{ asset('admin/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('admin/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/pace-progress/pace.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/node_modules/@coreui/coreui/dist/js/coreui.min.js') }}"></script>
  <script type="text/javascript">
    $('.myTable').DataTable({
      select:true,
    });
  </script>
  @endsection
