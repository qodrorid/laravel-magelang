<?php
namespace App\Http\Controllers;

class LoginController extends Controller {

    public function index()
    {
        $nama = "Dika Budiaji";
        $sekolah = "SMKN 1 CIANJUR";
        $dataArray = ['KAMU', 'TAMBAH', 'AKU', 'JADI', 'KITA'];
        //cara ke1
        //return view('login.login', ['nama' => $nama]);
        
        //cara ke2
        //return view('login.login')->with('nama', $nama);
        
        //cara ke3
        return view('login.login', compact('nama', 'sekolah', 'dataArray'));
    }
    
}