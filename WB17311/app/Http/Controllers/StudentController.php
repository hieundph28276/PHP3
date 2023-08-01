<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class StudentController extends Controller
{
    public function index(Request $request){
        //chan o dday
        // if(!Auth::user()){
        //     return redirect()->route('login');
        // }
        $title = 'admin';
        $name = 'Student';
        $students = DB::table('students')
        ->select('id', 'name', 'image')
        ->whereNull('deleted_at')
        ->get();
        if($request->post() && $request->name){
            $students = DB::table('students')
            ->select ('id', 'name', 'image')
            ->where('name' , 'like', '%' . $request->name . '%')
            ->get();

        }
        return view('student.index' , compact('title','name','students'));
    }
    public function add(StudentRequest $request) {
        if ($request->isMethod('POST')) { //tồn tại phương thức post/
            //nếu như tồn tại file thì sẽ up file lên
           $params =  $request->except('_token');
           if ($request->hasFile('image') && $request->file('image')->isValid()) {
               $params['image'] = uploadFile('hinh',$request->file('image'));
           }

          $student = Student::create($params);
          if ($student->id) {
              Session::flash('success','thêm mới thành công sinh viên');
              return redirect()->route('route_student_add');
          }
        }
        return view('student.add');
    }
    public function edit(StudentRequest $request, $id){
            $student = Student::find($id);
            if($request->post()){
                $params = $request->except('_token');
                if($request->hasFile('image') && $request->file('image')->isValid()){
                    $resultDl = Storage::delete('/public/'.$student->image);
                    if ($resultDl) {
                        $params['image'] = uploadFile('hinh', $request->file('image'));
                    }
                }
                else{
                    $params['image'] = $student->image;
                }
               $result = Student::where('id',$id)
                ->update($params);
                if($result){
                    Session::flash('success', 'Sửa thành công sinh viên');
                     return redirect()->route('route_student_edit',['id'=>$id]);
                }
            }
          return view('student.edit', compact('student'));
        }
        public function delete($id) {
            Student::where('id',$id)->delete();
            return redirect()->route('route_student_index');
        }
    // public function edit(StudentRequest $request, $id){
    //     // cách 1 DB query
    //     // $student = DB::table('students')
    //     // ->where('id', '=', $id)
    //     // ->first();

    //     // Cách 2 dùng model
    //     $student = Student::find($id);
    //     if($request->post()){
    //        $result = Student::where('id',$id)
    //         ->update($request->except('_token'));
    //         if($result){
    //             Session::flash('success', 'Sửa thành công sinh viên');
    //              return redirect()->route('route_student_edit',['id'=>$id]);
    //         }
    //     }
    //   return view('student.edit', compact('student'));

    // }
    // public function add(StudentRequest $request){
    //     if($request->post()){
    //         $student = Student::create($request->except('_token'));
    //         if($student->id){
    //             Session::flash('success', 'THEM MOI T   HANH CONG');
    //             return redirect()->route('route_student_add'); 
    //         }
    //     }   
    //     return view('student.add');
    // }
    // public function edit(StudentRequest $request, $id){
    // //     c1 DB quẻy
    // //     $student = DB::table('students')
    // //     ->where('id', '=' , $id)
    // //     ->get();
    // // c2 dung model 
    // $student = Student::find($id);
    // if($request->isMethod('POST')){
    //     $params = $request->except('_token');
    //     // neu nhu ton tai file post le
    //     if($request->hasFile('image') && $request->file('image')->isValid()){
    //         $params['image'] = uploadFile('hinh', $request->file('image'));
    //     }
    //     // $result = Student::where('id', $id)
    //     // ->update($request->except('_token'));
    //     $result = Student::created($params);
    //     if($result){
    //         Session::flash('success', 'THEM MOI THANH CONG');
    //         return redirect()->route('route_student_edit', ['id' => $id]); 
    //     }
    // }   

    // // dd($student);
    // return view('student.edit', compact('student'));
    // }
}
