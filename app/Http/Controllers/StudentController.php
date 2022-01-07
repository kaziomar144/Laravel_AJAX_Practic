<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id','DESC')->get();

        return view('student',compact('students'));
    }
    public function addStudent(Request $request)
    {
        $students = new Student();
        $students->firstname = $request->firstname;
        $students->lastname = $request->lastname;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->save();

        return response()->json($students);
    }

    public function getStudentById($id)
    {
        $students = Student::find($id);
        return response()->json($students);
    }

    public function updateStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();

        return response()->json($student);
    }


    public function deleteStudent($id)
    {
          //For Deleting Users
    $students = new Student();
    $students = Student::find($id);
    $students->delete();
    return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);
}
    public function deleteCheckedStudent(Request $request)
    {
        $ids = $request->ids;
        Student::whereIn('id',$ids)->delete();
        return response()->json([
            'success' => 'All record has been deleted successfully!'
        ]);
    }

}
