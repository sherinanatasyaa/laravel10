<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;
use App\Models\Groups;
use App\Models\History;
use Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    public function showaddmember($id)
    {
        $group = Groups::find($id);
        return view('groups.showaddmember', compact('group'));
    }

    public function addmember($id)
    {
        $friend = Friends::where('groups_id', "=", 0)->get();
        $group = Groups::where('id', $id)->first();
        return view('groups.index', ['group' => $group, 'friend' => $friend]);
    }

    public function updatemember(Request $request, $id)
    {
        $friend = Friends::where('id', $request->friend_id)->first();
        Friends::find($friend->id)->update([
            'groups_id' => $id
        ]);

        History::create([
            'friends_id'=>$request->friend_id,
            'groups_id'=>$id,
            'status'=>'active'
        ]);

        return redirect('/groups/addmember/'. $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the Request...
        $request->validate([
            'name' => 'required|unique:groups|max:255',
            'description' => 'required',

        ]);
        
        $groups = new Groups;

        $groups->name = $request->name;
        $groups->description = $request->description;

        $groups->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Groups::where('id', $id)->first();
        return view('groups.show', ['group' => $group]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
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
        //
    }
}
