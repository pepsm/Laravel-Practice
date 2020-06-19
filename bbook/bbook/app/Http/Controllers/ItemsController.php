<?php

namespace bbook\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use bbook\Item;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(10);
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
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
        // Create item
        $item = new Item;
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->user_id = auth()->user()->id;
        $item->cover_image = $filenameToStore;
        $item->save();

        return redirect(url('/items'))->with('success', 'Item Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $item = Item::find($id);

        // Check for correct user
        if(auth()->user()->id !== $item->user_id){
            return redirect(url('/items'))->with('error', 'Unauthorized page.');
        }

        return view('items.edit')->with('item', $item);
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
            'title' => 'required',
            'description' => 'required'
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
        // Create item
        //$item = new Item; It should update the current item


        $item = Item::find($id);
        $item->title = $request->input('title');
        $item->description = $request->input('description');

        if($request->hasFile('cover_image')){
            $item->cover_image = $filenameToStore;
        }

        $item->save();

        return redirect(url('/items'))->with('success', 'Item Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        // Check for correct user
        if(auth()->user()->id !== $item->user_id){
            return redirect(url('/items'))->with('error', 'Unauthorized page.');
        }

        if($item->cover_image != 'noimage.jpg'){
            // Default Image
            Storage::delete('public/cover_images/'.$item->cover_image);
        }

        $item->delete();
        return redirect(url('/items'))->with('success', 'Item Deleted');
    }
}
