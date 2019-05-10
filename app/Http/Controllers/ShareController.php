<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::all();

        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shares.create');
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
        'share_name'=>'required',
        'share_price'=> 'required|integer',
        'share_qty' => 'required|integer',
      ]);
	  $val ='';
	  if ( $request->hasFile('filepath')){
        if ($request->file('filepath')->isValid()){
            $file = $request->file('filepath');
            $name = $file->getClientOriginalName();
            $file->move('images' , $name);
            $inputs = $request->all();
            $inputs['path'] = $name;
			$val = $file->getClientOriginalName();
        }
		}else{
			$val = 'noimage.jpg';
		}
      $share = new Share([
        'share_name' => $request->get('share_name'),
        'share_price'=> $request->get('share_price'),
        'share_qty'=> $request->get('share_qty'),
		'filepath' => $val,
      ]);
	  //$request->share_img->store('logos');
      $share->save();
      return redirect('/shares')->with('success', 'Stock has been added');
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
        $share = Share::find($id);

        return view('shares.edit', compact('share'));
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
       $share = Share::find($id);
	   $share->delete();

       return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }
}
