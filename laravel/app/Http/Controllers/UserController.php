<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Excel;
use App\Exports\UsersExport;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        if ($user->profile_image == null) {
            $user->profile_image = 'avatar.jpg';
        }
        return view('profile',compact('user',$user));
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
        //
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
        $this->validate($request, [
        'profile_image' => 'image|nullable|max:1999',
        ]);
        $user = Auth::user(); 
        $updated_name =  $request->input('name');
        if ($request->hasFile('profile_image')) {
            //get filename with extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('profile_image')->guessClientExtension();
            //Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension; 
            //upload
            $path = $request->file('profile_image')->storeAs('public/profile_images', $filenameToStore);
        }
        // else{
        //      $filenameToStore = 'avatar.jpg';
        // }
        if ($request->hasFile('profile_image')) {
            $user->profile_image = $filenameToStore;    
        }
        if($updated_name){
            $user->name = $updated_name;
        }
        $user->save();
        return redirect('/profile')->with('success');
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
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
