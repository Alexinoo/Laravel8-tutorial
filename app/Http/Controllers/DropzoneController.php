<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function dropzone()
    {
        return view('Dropzone.dropzone');
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        // get file extension
        $filename = time() . '.' . $file->getClientOriginalExtension();
        //Use move() to upload the file in the uploads folder
        //Takes 2 parameters - ( location , filename )
        $file->move('uploads/files/', $filename);

        return response()->json([
            'success' => $filename
        ]);
    }
}
