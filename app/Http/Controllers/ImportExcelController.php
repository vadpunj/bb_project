<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
// use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Log_user;
use App\Electric;
class ImportExcelController extends Controller
{
    public function index()
    {
     $data = DB::table('customers')->orderBy('CustomerID', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    public function import(Request $request)
    {
      set_time_limit(0);
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);
     $path = $request->file('select_file')->getRealPath();
     $name = $request->file('select_file')->getClientOriginalName();
     $pathreal = Storage::disk('log')->getAdapter()->getPathPrefix();
     $data = Excel::load($path)->get();

     $insert_log = new Log_user;
     // $insert_log->user_name = Auth::user()->name;
     $insert_log->user_name = 'phats';
     $insert_log->path = $pathreal.$name;
     $insert_log->type_log = 'water';
     $insert_log->save();

     // $key_name = ['CustomerName','Gender','Address','City','PostalCode','Country'];
     $key_name = ['TIME_KEY','ASSET_ID','COST_CENTER','METER_ID','M_UNIT','M_UNIT_PRICE','M_Cost_TOTAL','ACTIVITY_CODE'];
// var_dump($data);
     if($data->count() > 0)
     {
       $num = 0;
      foreach($data->toArray() as $key => $value)
      {
        $i = 0;
        // var_dump($value);
       foreach($value as $row)
       {
        // print_r($row."<br>");
        $insert_data[$num][$key_name[$i]] = $row;
        // var_dump($row."->".$key_name[$i]."<br>");
        $num++;
        $i++;
       }
      }
      // var_dump($insert_data);
      // dd('3434');
      if(!empty($insert_data))
      {
        for($j = 0; $j < count($insert_data); $j++ ){
          $insert = new Electric;
          $insert->TIME_KEY = $insert_data[$j++]['TIME_KEY'];
          $insert->ASSET_ID = $insert_data[$j++]['ASSET_ID'];
          $insert->COST_CENTER = $insert_data[$j++]['COST_CENTER'];
          $insert->METER_ID = $insert_data[$j++]['METER_ID'];
          $insert->M_UNIT = $insert_data[$j++]['M_UNIT'];
          $insert->M_UNIT_PRICE = $insert_data[$j++]['M_UNIT_PRICE'];
          $insert->M_Cost_TOTAL = $insert_data[$j++]['M_Cost_TOTAL'];
          $insert->ACTIVITY_CODE = $insert_data[$j]['ACTIVITY_CODE'];
          $insert->save();
        }

      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }


}
