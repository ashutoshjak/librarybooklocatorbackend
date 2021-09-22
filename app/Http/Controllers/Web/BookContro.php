<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookContro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->book_name=$request->input('book_name');  
        $book->author_name=$request->input('author_name');
        $book->shelf_no=$request->input('shelf_no');
        $book->shelf_image="";
        $book->row_no=$request->input('row_no');
        $book->column_no=$request->input('column_no');
        $book->book_image="";
        $book->book_quantity=$request->input('book_quantity');
        $book->user_id=auth()->user()->user_id;
        if($book->save()){

            $shelf_image = $request->file('shelf_image');
            if($shelf_image != null){
                $ext = $shelf_image->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                //  $shelf_image->getClientOriginalName() . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                    if($shelf_image->move(public_path(), $fileName)){
                        $book = Book::find($book->id);
                        $book->shelf_image = url('/') . '/' . $fileName;
                        $book->save();
                    }
                }

            }
            $book_image = $request->file('book_image');
            if($book_image != null){
                $ext = $book_image->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                    if($book_image->move(public_path(), $fileName)){
                        $book = Book::find($book->id);
                        $book->book_image = url('/') . '/' . $fileName;
                        $book->save();
                    }
                }

            }

            return redirect()->back()->with('success','Save Successfully');
        }
        return redirect()->back()->with('failed','Could not save');
    }

     //dont umcomment below
    // storage_path() . DIRECTORY_SEPARATOR . 'shelfImage';
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
        $book = Book::find($id);
        return view('book.edit',compact('book'));
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
        $book = Book::find($id);
        $book->book_name=$request->input('book_name');  
        $book->author_name=$request->input('author_name');
        $book->shelf_no=$request->input('shelf_no');
        $book->shelf_image="";
        $book->row_no=$request->input('row_no');
        $book->column_no=$request->input('column_no');
        $book->book_image="";
        $book->book_quantity=$request->input('book_quantity');
        $book->user_id=auth()->user()->user_id;
        if($book->save()){
            $shelf_image = $request->file('shelf_image');
            if($shelf_image != null){
                $ext = $shelf_image->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                    if($shelf_image->move(public_path(), $fileName)){
                        $book = Book::find($book->id);
                        $book->shelf_image = url('/') . '/' . $fileName;
                        $book->save();
                    }
                }

            }
            $book_image = $request->file('book_image');
            if($book_image != null){
                $ext = $book_image->getClientOriginalExtension();
                $fileName = rand(10000, 50000) . '.' . $ext;
                if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                    if($book_image->move(public_path(), $fileName)){
                        $book = Book::find($book->id);
                        $book->book_image = url('/') . '/' . $fileName;
                        $book->save();
                    }
                }

            }


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
          if(Book::destroy($id)){
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
          if(Book::find($id)->forcedelete()){
             return redirect()->back()->with('deleted','Force Deleted Successfully');
          }
          return redirect()->back()->with('delete-failed','Could not force delete');
    }

}
