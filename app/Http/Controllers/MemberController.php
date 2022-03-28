<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::all();

        if ($request->ajax()) {

            $allData = DataTables::of($members)
                ->addIndexColumn()
                ->addColumn('operations', function ($row) {
                    // href="javascript:void(0)" - Means don't redirect to anywhere
                    $btn = '<a href="javascript:void(0)" data-toggle = "tooltip" data-id="' . $row->id . '" data-original-title="Edit" class=" edit btn btn-primary btn-sm editMember" >Edit</a>';

                    $btn .= '<a href="javascript:void(0)" data-toggle = "tooltip" data-id="' . $row->id . '" data-original-title="Delete" class=" delete btn btn-danger btn-sm deleteMember" >Delete</a>';

                    return $btn;
                })
                ->rawColumns(['operations'])
                ->make(true);

            return $allData;
        }
        return view('Member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Member::updateOrCreate(['id' => $request->member_id], [
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => 'Member Added successfully',
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();

        return response()->json([
            'success' => 'Member Added successfully',
        ]);
    }
}
