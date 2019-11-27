<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\FileImport;
use App\Exports\FileExport;
use App\People;
use App\Branch;
use DB;
use Excel;
use Func;

class InputController extends Controller
{
    public function get_source(Request $request)
    {

      return view('home');

    }

    public function post_data()
    {
      $input1 = $request->input1;
      $input2 = $request->input2;
      $input3 = $request->date;

      $this->validate($request,[
         'start_date'=>'required|date',
         'end_date'=>'required|date',
         'source' => 'required|numeric',
         'branch' => 'required|numeric'
      ]);


      $people = new People;
      $people->username = $input1;
      $people->password = md5($input2);
      $people->birthday = $input3;
      $save = $people->save();
      if(!$save){
        $massage = 'การบันทึกผิดพลาด';
        $class = 'danger';
      }else{
        $massage = 'บันทึกเรียบร้อย';
        $class = 'success';
      }
      return view('home', ['message' => $massage ,'class' => $class]);
    }
    public function ajax_data()
    {
      $branch = $_POST['data'];
      $data = Branch::where('branch_id',$branch)->first();
      if(!empty($data)){
        return response()->json(['success' => $data->branch_name]);
      }else{
        return response()->json(['success' => 'ไม่มีสาขานี้']);
      }

    }
}
