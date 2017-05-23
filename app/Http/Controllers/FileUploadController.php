<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{
    public function upload(Request $request){
    	
    	$fileName = request()->fileName;
    	$fileUpload = new \App\fileUpload;


    	//Save uploaded file info to the database
    	$fileUpload->fileName = $fileName;
    	$fileUpload->uploadedBy = Auth::id();
    	$fileUpload->save();
    	

    	//Store the uploaded file in S3 instance
    	$file = request()->file;
    	$s3 = \Storage::disk('s3');
		$s3->put($fileName, file_get_contents($file), 'public');


    	return back();

    }
}
