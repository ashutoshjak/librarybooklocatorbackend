<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestBook;
use App\Http\Resources\RequestBookResource;

class RequestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestbooks = RequestBook::all()->toArray();
        //dd($books);
        return new RequestBookResource($requestbooks);
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
        $requestbook = new RequestBook;
        $requestbook->book_name=$request->input('book_name');  
        $requestbook->author_name=$request->input('author_name');
        $requestbook->book_publication=$request->input('book_publication');  
        $requestbook->book_edition=$request->input('book_edition');  
        $requestbook->user_id = $request->input('user_id');
        if($requestbook->save()){
            return new RequestBookResource($requestbook);
        }
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
        $requestbook = RequestBook::findorfail($id);
        $requestbook->book_name=$request->input('book_name');  
        $requestbook->author_name=$request->input('author_name');
        // $requestbook->id_user = $request->input('user');
        if($requestbook->save()){
            return new RequestBookResource($requestbook);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestbook = RequestBook::findOrFail($id);
        $requestbook->delete();
        return new RequestBookResource($requestbook);
    }
}
