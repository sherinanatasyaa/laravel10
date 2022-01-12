<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;
use Auth;

class CobaController extends Controller
{
    
    public function index()
    {
        $Friends = Friends::orderBy('id', 'desc')->paginate(3);
        return view('friends.homefriend', compact('Friends'));
    }

    public function create()
    {
        return view('friends.create');
    }

    public function store(Request $request)
    {
        //Validate the Request...
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'pendidikan' => 'required',

        ]);
        
        $friends = new Friends;

        $friends->nama = $request->nama;
        $friends->no_telp = $request->no_telp;
        $friends->alamat = $request->alamat;
        $friends->pendidikan = $request->pendidikan;

        $friends->save();

        return redirect('/homefriend');
    }

    public function show($id)
    {
        $friend = Friends::where('id', $id)->first();
       
        return view('friends.show', ['friend' => $friend]);
    }

    public function edit($id)
    {
        $Friends = Friends::where('id', $id)->first();
        return view('friends.edit', ['Friends' => $Friends]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'pendidikan' => 'required',

        ]);

        Friends::find($id)->update([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan
        ]);

        return redirect('/homefriend');
    }

    public function destroy($id)
    {
        Friends::find($id)->delete();

        return redirect('/homefriend');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
