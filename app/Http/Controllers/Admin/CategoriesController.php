<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category=Category::all();
        return view('Admin.Categories.list')->withCategories($Category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category=Category::all();
        return view('Admin.Categories.new')->withCategories($Category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=Validator::make($request->input(),array(
                'name'=>'required|max:250',
                
            ));
        if($validation->fails()){
            return redirect('admin/categories')->withErrors($validation)->withInput();
        }

        $Category=new Category;
        $Category->name=$request->name;
        ;
        $Category->parent_id=$request->parent_id;
        $Category->picture=$request->picture;
        
        $Category->sort_order=$request->sort_order;
        $Category->save();
        Session::flash('success','The Category was saved successfully');
        return redirect('admin/categories');        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category=Category::find($id);
        return view('Admin.categories.detail')->withCategory($Category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category']=Category::find($id);
        $data['categories']=Category::select('ID','name')->get();
        return view('Admin.Categories.edit')->withData($data);
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
        $Category= Category::find($id);
        $Category->name=$request->name;
        $Category->parent_id=$request->parent_id;
        $Category->sort_order=$request->sort_order;
        $Category->save();
        Session::flash('info','The Category was Updated successfully');
        return redirect('admin/categories');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Category=Category::find($id);
        return view('Admin.Categories.delete')->withCategory($Category);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        Session::flash('danger','The Category was Deleted successfully');
        return redirect('admin/categories');   
    }


    function imageUpload(){
        $file=input::file('file');
        $file_name=time().'.'.$file->getClientOriginalExtension();
        $file->move('public/',$file_name);
        return $file_name;
    }

    function imageChange($id){
        $file=input::file('file');
        $file_name=time().'.'.$file->getClientOriginalExtension();
        $file->move('public/',$file_name);
        $Category= Category::find($id);
        $Category->picture=$file_name;
        $Category->save();
        return $file_name;
    }
}
