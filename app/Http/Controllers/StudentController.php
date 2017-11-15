<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Student;

class StudentController extends Controller
{
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $students = $this->student->all();

        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(StudentRequest $request)
    {
        $this->student->create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'age' => $request->input('age'),
            'email' => $request->input('email')
        ]);

        return redirect('/student');
    }

    public function edit($id)
    {
        $student = $this->student->find($id);

        return view('student.edit', compact('student'));
    }

    public function update($id, StudentRequest $request)
    {
        $student = $this->student->find($id);

        if($student) {
            $student->update($request->all());
        }

        return redirect('/student');
    }

    public function destroy($id)
    {
        $student = $this->student->find($id);

        if($student) {
            $student->delete();
        }

        return redirect()->back();
    }
}
