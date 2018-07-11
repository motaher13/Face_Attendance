<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        //$dir    = 'E:\sound and image\ACADEMIC\3-2\Networking';
        $dir='uploads/';
        $files1 = scandir($dir);

        $files2='uploads/'.$files1[4];
        $files1=5;
        //rename($files2, "uploadss/abul.docx");
        unlink($files2);
        return view('fileManager.index')->with('files',$files1);
    }
}
