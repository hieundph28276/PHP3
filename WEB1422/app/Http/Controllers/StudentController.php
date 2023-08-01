<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\DB;  
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request){
        $title = 'hello';
        $name = 'hieund';
        $students = DB::table('students')
        ->select('id','name') //layb theo những trường mong muốn
        ->get();

        if($request->post() && $request->email){
            //ấn vào thì nhảy vào đây
           
            $students = DB::table('students')
            ->select('id','name')
            ->where('name', 'like' , '%'.$request->email.'%')
            ->get();
            }
        return view('student.index', compact('title', 'name', 'students'));
    }
    // public function add(StudentRequest $request){
    //     // nếu như tồn tại re
    //     if($request->post()){
    //         add(123);
    //     }
    //     return view('student.add');
    // }
    public function add(StudentRequest  $request){
        //nếu như tồ tại request post  (khi ng dùng ấn nút thì mới là post)
        if($request->post()){
            dd(123);
        }
        return view('student.add');
    }
        // $studentCondition = DB::table('students')
        // ->where('id','>=', 1)
        // ->where('id','<=', 5)
        // ->orWhere('email','=', 'cblick@example.com')
        // ->get(); 
        //where là và
        //orwhere là hoặc
        //trả về một dòng dữ liệu
        // $students = DB::table('students')->where('id','=', 2) ->get();
        // dd($students);
        // $users = DB::table('users')->get();
        // dd($studentCondition);
          //kiểm tra khi nào là post khi nào là get
          
}
