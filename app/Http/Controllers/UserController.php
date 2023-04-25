<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::where('email', $id)->first();
        return view("users.show")->with([
            "user" => $user
        ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::where('email', $id)->first();
        return view("users.edit")->with([
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::where('email', $id)->first();
       
        $this->validate($request, [
            'email' => 'required | unique:users,id,'.$user->email,
            'name' => 'required',
            'adresse' => 'required',
            'city' => 'required',
            'country' => 'required',
            'telephone' => 'required',
        ]);
        $data = $request->except(['_token', '_method']);
        $user->update($data);
        return redirect()->route("users.index")->with([
            "success" => "user updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::where('email', $id)->first();
        $user->delete();
        return redirect()->route("users.index")->with([
            "success" => "user deleted successfully"
        ]);
    }
}
