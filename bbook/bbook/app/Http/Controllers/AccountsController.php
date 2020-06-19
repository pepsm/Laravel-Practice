<?php

namespace bbook\Http\Controllers;

use bbook\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use bbook\User;

class AccountsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.account')->with('user', auth()->user());
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:password',
        ]);

        // Handle file uploading
        if($request->hasFile('cover_image')){

            // Get file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);

        }else{
            $filenameToStore = 'noimage.jpg';
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        if($request->hasFile('cover_image')){
            $user->profile_image = $filenameToStore;
        }

        $user->save();

        return redirect(url('/login'))->with('success', 'Your account was updated');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);


        if($user->profile_image != 'noimage.jpg'){
            // Default Image
            Storage::delete('public/cover_images/'.$user->profile_image);
        }

        // Deleting related post to a user
        $deletedRows = Item::where('user_id', $id)->delete();

        $user->delete();
        return redirect(url('/register'))->with('success', 'Your account was deleted');
    }
}
