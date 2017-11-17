<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\StudentRequest;
use Intervention\Image\ImageManager;
use App\Student;

class StudentController extends Controller
{
    private $student;

    private $filesystem;

    private $imageManager;

    public function __construct(Student $student, Filesystem $filesystem, ImageManager $imageManager)
    {
        $this->student = $student;
        $this->filesystem = $filesystem;
        $this->imageManager = $imageManager;
    }

    public function index()
    {
        $students = $this->student->orderBy('id','DESC')->paginate(10);

        return view('student.index', compact('students'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $students = $this->student->where('name', 'LIKE', "%$keyword%")
            ->orderBy('id', 'DESC')->paginate(10);
        $students->appends(['keyword' => $keyword]);

        return view('student.search', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(StudentRequest $request)
    {
        // dapetin data inputan kecuali photo
        $student = $request->except("photo");
           // cek jika ngupload photo
        if($request->hasFile('photo')) {
            $student['photo'] = $this->generatePhoto($request->file('photo'), $request->except('photo')); 
        }
        $this->student->create($student);

        session()->flash('success_message', 'Data tersimpan');

        return redirect('/student');
    }

    public function edit($id)
    {
        $student = $this->student->find($id);

        return view('student.edit', compact('student'));
    }

    public function update($id, StudentRequest $request)
    {
        $studentForm = $request->except('photo');
        
        if($request->hasFile('photo')) {
            $studentForm['photo'] = $this->generatePhoto($request->file('photo'), $studentForm);
        }

        $student = $this->student->find($id);

        if($student) {
            $student->update($studentForm);
        }

        session()->flash('success_message', 'Data terupdate');

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

    private function generatePhoto($photo, $data)
    {
        $filename = date('YmdHis').'-'.snake_case($data['name']).".".$this->filesystem->extension($photo->getClientOriginalName());
        $path = public_path("photos/").$filename;

        $this->imageManager->make($photo->getRealPath())->save($path);

        return "/photos/".$filename;
        
    }
}
