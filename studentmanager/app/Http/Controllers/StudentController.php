<?php
/**
 * Created by PhpStorm.
 * User: 15840
 * Date: 2018/9/1
 * Time: 1:17
 */
namespace  App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller {
    public function index(){

        $students=Student::paginate(5);
        return view('student.index',['students'=>$students]);
    }

    public function create(Request $request){
        if($request->isMethod('POST'))
        {
/*            //控制器验证
            $this->validate($request,[
                'Student.name'=>'required|max:30',
                'Student.age'=>'required|integer',
                'Student.sex'=>'required'
            ],[
                'required'=>':attribute 为必填项',
                'max'=>':attribute 长度不符合要求',
                'integer'=>':attribute 必须为整数'
            ],[
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'性别'
            ]);*/

            //validator类验证
            $validate=\Validator::make($request->input(),[
                'Student.name'=>'required|max:30',
                'Student.age'=>'required|integer',
                'Student.sex'=>'required'
            ],[
                'required'=>':attribute 为必填项',
                'max'=>':attribute 长度不符合要求',
                'integer'=>':attribute 必须为整数'
            ],[
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'性别'
            ]);

            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withInput();
            }
            $data=$request->input('Student');

            if(Student::create($data)){
                return redirect('student/index')->with('success','添加成功！');
            }else{
                return redirect()->back();
            }
        }

        return view('student/create');


        return view('student.create');
    }

    public function update(Request $request,$id){

        $student=Student::find($id);

        if($request->isMethod('POST')){

            $this->validate($request,[
                'Student.name'=>'required|max:30',
                'Student.age'=>'required|integer',
                'Student.sex'=>'required'
            ],[
                'required'=>':attribute 为必填项',
                'max'=>':attribute 长度不符合要求',
                'integer'=>':attribute 必须为整数'
            ],[
                'Student.name'=>'姓名',
                'Student.age'=>'年龄',
                'Student.sex'=>'性别'
            ]);

            $data=$request->input('Student');
            $student->name=$data['name'];
            $student->age=$data['age'];
            $student->sex=$data['sex'];

            if($student->save()){
                return redirect('student/index')->with('success','修改成功-'.$id);
            }
        }


        return view('student.update',['student'=>$student]);
    }

    public function detail($id){

        $student=Student::find($id);
        return view('student.detail',['student'=>$student]);
    }

    public function delete($id){

        $student=Student::find($id);

        if($student->delete())
        {
            return redirect('student/index')->with('success','删除成功-'.$id);
        }
        else{
            return redirect('student/index')->with('error','删除失败-'.$id);
        }
    }

    public function save(Request $request){
        $data=$request->input('Student');
        $student=new Student();
        $student->name=$data['name'];
        $student->age=$data['age'];
        $student->sex=$data['sex'];

        if($student->save()){
            return redirect('student/index');
        }else{
            return redirect()->back();
        }
    }
}