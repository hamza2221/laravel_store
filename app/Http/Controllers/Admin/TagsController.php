<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\product_Tag;
use App\Models\Tag;
use App\User;
use Illuminate\Support\Facades\Input;
use Session;
use Image;
use File;
use Validator;

class TagsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $tag = Tag::orderby('sort_order','asc')->get();
        return view('Admin.tag.list')->withTags($tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.tag.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validation=Validator::make($request->input(),array(
                'name'=>'required|unique:tags|max:250',
                
            ));
        if($validation->fails()){
            return redirect('admin/tags/create')->withErrors($validation)->withInput();
        }
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        Session::flash('success','The Tag was saved successfully');
        return redirect('admin/tags/');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tag = Tag::find($id);
        return view('Admin.tag.detail')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['tag'] = Tag::find($id);
        return view('Admin.tag.edit')->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validation=Validator::make($request->input(),array(
                'name'=>'required|max:250',
                
            ));
         if($validation->fails()){
            return redirect("admin/tags/$id/edit")->withErrors($validation)->withInput();
        }
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        Session::flash('info', 'The Tag was Updated successfully');
        return redirect('admin/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $tag = Tag::find($id);
        return view('Admin.tag.delete')->withTag($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $tag = Tag::find($id)->delete();
        Session::flash('danger', 'The tag was deleted successfully');
        return redirect('admin/tags');
    }



    function bulk_delete(Request $request) {

        if (count($request->id) > 0) {
            $count = 0;
            foreach ($request->id as $i) {
                $tag = Tag::find($i)->delete();
                $count++;
            }
            Session::flash('danger', $count . ' tags were deleted successfully');
            return redirect('admin/tags');
        } else {
            Session::flash('danger', 'No tags were selected for delete');
            return redirect('admin/tags');
        }
    }

    function sort_tags(Request $request){
            $orders=input::get('odr');
            foreach ($orders as $id => $sort_order) {
                if ($sort_order !="") {
                    $tag = Tag::find($id);
                    $tag->sort_order=$sort_order;
                    $tag->save();
                }
            }
            //echo "in sort function";
    }

}
