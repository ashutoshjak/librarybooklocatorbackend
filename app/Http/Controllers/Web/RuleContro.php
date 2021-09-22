<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rule;

class RuleContro extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Rule::all();
        return view('rule.index',compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = new Rule();
        $rule->rule=$request->input('rule');  
        $rule->user_id=auth()->user()->user_id;
        if($rule->save()){

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
        $rule = Rule::find($id);
        return view('rule.edit',compact('rule'));
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
        $rule = Rule::find($id);
        $rule->rule=$request->input('rule'); 
        $rule->user_id=auth()->user()->user_id; 
        if($rule->save()){

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
        if(Rule::destroy($id)){
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
          if(Rule::find($id)->forcedelete()){
             return redirect()->back()->with('deleted','Force Deleted Successfully');
          }
          return redirect()->back()->with('delete-failed','Could not force delete');
    }

    //    /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function restore($id)
    // {
    //       if(Rule::onlyTrashed()->find()->restore()){
    //          return redirect()->back()->with('success','Restored Successfully');
    //       }
    //       return redirect()->back()->with('failed','Could not restore');
    // }
    
}
