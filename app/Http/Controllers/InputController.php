<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use App\Imports\FileImport;
use App\Exports\FileExport;
use App\People;
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

    // public function import(Request $request)
    // {
    //   // $this->validate($request, [
    //   //   'select_file' => 'required|mimes:xls,xlsx'
    //   // ]);
    //   // $file = $request->file('select_file');
    //   // var_dump($file);
    //
    //   $fileName = $request->file('select_file')->getClientOriginalName();
    //   $path = storage_path('upload');
    //   $full = $request->file('select_file')->move($path,$fileName);
    //   $sds = Excel::import(new FileImport, $full);
    //
    //   // $fileName = $request->file('select_file')->getClientOriginalName();
    //   // $path = $request->file('select_file')->store('upload/'.$fileName);
    //   dd($full);
    //
    //
    //   // dd($fileName);
    //
    //
    // }
    //
    // public function export()
    // {
    //   return Excel::download(new FileExport,'data.xlsx');
    // }

}
