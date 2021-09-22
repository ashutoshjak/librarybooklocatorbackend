<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Map;

class MapContro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Map::all();
        return view('map.index',compact('maps'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('map.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $map = new Map();
        $map->map_image="";
        $map->user_id=auth()->user()->user_id;
        if($map->save()){

            $map_image = $request->file('map_image');
            if($map_image != null){
                $ext = $map_image->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                //  $shelf_image->getClientOriginalName() . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                    if($map_image->move(public_path(), $fileName)){
                        $map = Map::find($map->id);
                        $map->map_image = url('/') . '/' . $fileName;
                        $map->save();
                    }
                }

            }
           

            return redirect()->back()->with('success','Save Successfully');
        }
        return redirect()->back()->with('failed','Could not save');
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
        $map = Map::find($id);
        return view('map.edit',compact('map'));
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
        $map = Map::find($id);
        $map->map_image="";
        $map->user_id=auth()->user()->user_id;
        if($map->save()){

            $map_image = $request->file('map_image');
            if($map_image != null){
                $ext = $map_image->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                //  $shelf_image->getClientOriginalName() . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                    if($map_image->move(public_path(), $fileName)){
                        $map = Map::find($map->id);
                        $map->map_image = url('/') . '/' . $fileName;
                        $map->save();
                    }
                }

            }
           

            return redirect()->back()->with('success','Update Successfully');
        }
        return redirect()->back()->with('failed','Could not update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if(Map::destroy($id)){
             return redirect()->back()->with('deleted','Soft Deleted Successfully');
          }
          return redirect()->back()->with('delete-failed','Could not soft delete');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
          if(Map::find($id)->forcedelete()){
             return redirect()->back()->with('deleted','Force Deleted Successfully');
          }
          return redirect()->back()->with('delete-failed','Could not force delete');
    }

}
