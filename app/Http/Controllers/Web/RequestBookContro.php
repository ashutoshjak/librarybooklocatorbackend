<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RequestBook;

class RequestBookContro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestbooks = RequestBook::all();
        return view('requestbook.index',compact('requestbooks'));
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
        $requestbook = RequestBook::find($id);
        return view('requestbook.edit',compact('requestbook'));
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
        $requestbook = RequestBook::find($id);
        $requestbook->book_name=$request->input('book_name');  
        $requestbook->author_name=$request->input('author_name');
        if($requestbook->save()){
            return redirect()->back()->with('success','Upadte Successfully');
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
          if(RequestBook::destroy($id)){
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
          if(RequestBook::find($id)->forcedelete()){
             return redirect()->back()->with('deleted','Force Deleted Successfully');
          }
          return redirect()->back()->with('delete-failed','Could not force delete');
    }

}


