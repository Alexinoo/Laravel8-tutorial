<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        return view('Worker.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Worker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $worker = new Worker;
        $worker->name = $name;
        $worker->profile_image = $imageName;
        $worker->save();

        return redirect()->back()->with('worker_added', 'Worker added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);

        return view('Worker.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $worker = Worker::find($request->id);

        $worker->name = $request->name;

        //LOGIC - Delete from destination and upload a new image

        if ($request->hasfile('file')) {

            $destination = public_path('images/' . $worker->profile_image);

            // Check if image exists in the destination folder
            if (File::exists($destination)) {

                // IF SO - DELETE
                File::delete($destination);
            }

            //PROCEED WITH THE UPLOAD

            $image = $request->file('file');
            // get file extension
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //Use move() to upload the file in the uploads folder
            //Takes 2 parameters - ( location , filename )
            $image->move(public_path('images'), $filename);
            //Save the filename in the db
            $worker->profile_image = $filename;
        }
        $worker->update();

        return back()->with('worker_updated', 'Worker updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        if ($worker) {

            $destination = public_path('images/' . $worker->profile_image);
            // /Check if image exists in the destination folder
            if (File::exists($destination)) {
                // IF SO - DELETE
                File::delete($destination);
            }

            //Delete category itself
            $worker->delete();

            return redirect()->back()->with('worker_deleted', 'Worker Deleted Successfully');
        } else {
            return "No Worker ID Found";
        }
    }
}
