<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Log;
class UserController extends Controller
{
    
    public function index(Request $request)
    {
        Log::info("Requested Header =".json_encode($request->header()));
        $data = [
            'Request Method' => $request->method(),
            'Request Path' => $request->path(),
            'Request Params' => $request->all(),
            'Request IP' => $request->ip(),
            'Origin' => $request->header('host'),
        ];

        Log::info(json_encode($data));

        return $users = User::latest()->orderBy("id","DESC")->first();
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'unique_name' => 'required',
        ]);
 
        $user = User::create($request->all());
        return $user;
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        return $users = User::where("id",$id)->first();
       
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->update($request->all());

        return [
            "status" => 1,
            "data" => $user,
            "msg" => "User updated successfully"
        ];
 
 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return [
            "status" => 1,
            "data" => $user,
            "msg" => "User deleted successfully"
        ];
    }
}
