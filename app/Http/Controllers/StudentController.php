<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Image;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();
        return view('student.index',compact('student'));
        // return response()->json([
        //     'status'=>200,
        //     'student'=>$student,
        //     ]);
    }
    public function store(Request $request){
        
        // $validator = Validator::make($request->all(),[
        //     'name'=>'required|max:191',
        //     'course'=>'required|max:191',
        //     'email'=>'required|max:191',
        //     'phone'=>'required|max:191',
        //     'files.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // if($validator->fails()){
        //     return response()->json([
        //         'status'=>400,
        //         'errors'=>$validator->messages()
        //     ]);
        // }
        // else{
            
            $student = new Student;
            $student->name = $request->input('name');
            $student->course = $request->input('course');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->save();
            // dd($request->hasFile('files'));
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $image = new Image();
                    
                    $image->img_name = $file->getClientOriginalName();
                     
                    // $image->path = $file->store('image');
                    $image->studtb_id = $student->id; // Assign the foreign key value
                    $image->save();
                }
                // return response()->json([
                //     'status'=>200,
                //     'message'=>'Student Added Successfully'
                // ]);
                // $extension = $file->getClientOriginalNameExtension();
                //     $filename =time(). '.' .$extension;
            }
            // $file =$request->file('file');

            // return response()->json([
            //         'status'=>200,
            //         'message'=>'Student Added Successfully'
            //     ]);
            return redirect()->back()->with('status','Student Added Successfully');
        // }
    }  
    

        // $this->validate($request, [
        //     'files' => 'required',
        //     'files.*' => 'required'
        // ]);

        // $files = [];
        // if($request->hasfile('files'))
        // {
        //     foreach($request->file('files') as $file)
        //     {
        //         $name = time().rand(1,100).'.'.$file->extension();
        //         $file->move(public_path('files'), $name);  
        //         $files[] = $name;  
        //     }
        // }

        // $file= new Image();
        // $file->img_name = $files;
        // $file->save();
        
        // Validate the uploaded files
        // $this->validate($request, [
        //     'files' => 'required',
        //     'files.*' => 'required'
        // ]);


        // $request ->validate([
        //     'files.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        
  
        
       
    //     return redirect()->back()->with('status','Student Added Successfully');
    // }
    public function edit($id){
        $student = Student::find($id);
        return response()->json([
            'status'=>200,
            'student'=>$student,
            ]);
    }
    public function update(Request $request){
        $stud_id=$request->input('stud_id');
        $student = Student::find($stud_id);
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function destroy(Request $request){
        $stud_id=$request->input('delete_stud_id');
        $student=Student::find($stud_id);
        $student->delete();
        return redirect()->back()->with('status','Student Deleted Successfully');
    }
}