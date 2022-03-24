<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function uploadForm()
    {

        return view('Files.upload');
    }

    public function uploadFile(Request $request)
    {

        if ($request->has('file')) {

            // if so store in variable file
            $file = $request->file('file');
            // get file extension
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //Use move() to upload the file in the uploads folder
            //Takes 2 parameters - ( location , filename )

            if ($file->move('uploads/files/', $filename)) {

                echo "File stored successfully";
            }

            //Save the filename in the db - NO DB for this Model
            // $model->image = $filename;
        }
    }
}
