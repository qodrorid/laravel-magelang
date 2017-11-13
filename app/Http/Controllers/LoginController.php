<?php
namespace App\Http\Controllers;

use App\Student;

class LoginController extends Controller {

    public function index()
    {
        // tampilkan data yang id nya 1
        //return Student::find(1);

      /*   return Student::where('age', 21)
                ->orWhere('age', 25)
                ->get(); */
        
        // tampilkan semua data di students
        //return Student::all();

        // insert Data
       /*  Student::create([
            'name' => 'Asep Saepuloh',
            'address' => 'Cinyaut, Babakan Kaler',
            'age' => 20,
            'email' => 'ptcintasejati@gmail.com'
        ]); */

        // Delete Data
        $student = Student::find(1);
        if($student) {
            $student->delete();    
        }
        ///Student::find(1)->delete();

        // Update Data
        $student2 = Student::find(2);
        if($student2) {
            $student2->update([
                'name' => 'Curanmor',
                'address' => 'Babakan Herang',
                'age' => 17,
                'email' => 'kitakamu@gmail.com'
            ]);
        }

       /*  $nama = "Dika Budiaji";
        $sekolah = "SMKN 1 CIANJUR";
        $dataArray = ['KAMU', 'TAMBAH', 'AKU', 'JADI', 'KITA']; */
        //cara ke1
        //return view('login.login', ['nama' => $nama]);
        
        //cara ke2
        //return view('login.login')->with('nama', $nama);
        
        //cara ke3
       // return view('login.login', compact('nama', 'sekolah', 'dataArray'));
    }
    
}