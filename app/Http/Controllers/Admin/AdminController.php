<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Hash;

class AdminController extends Controller {

    public $vFolder = "user";

    function __construct() {
        $this->middleware('admin');
    }

    function index() {
        $users = User::all();
        return view('Admin.user.list')->withUsers($users);
    }
    function dashboard() {
        $users = User::all();
        return view('Admin.dashboard.list')->withUsers($users);
    }

    function registerAdminGet() {
        
    }

    function registerUserGet() {
        
    }

    function myPrefrences(Request $request) {
        $user = $request->user();
        return view('Admin.user.prefrences')->withUser($user);
    }

    function myPrefrencesPost(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        $user->company_update = $request->company_update;
        $user->weekly_update = $request->weekly_update;
        $user->calender_update = $request->calender_update;
        $user->sector_update = $request->sector_update;
        $user->save();
        Session::flash('success', 'Saved successfully');
        return redirect('admin/myPrefrences');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Admin.user.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, array(
            'name' => 'required|max:250',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ));
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->send_email = $request->send_email;
        $user->company_update = $request->company_update;
        $user->weekly_update = $request->weekly_update;
        $user->calender_update = $request->calender_update;
        $user->sector_update = $request->sector_update;
        $user->save();
        Session::flash('uccess', 'Saved successfully');
        return redirect('admin/' . $this->vFolder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        return view('Admin.' . $this->vFolder . '.detail')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('Admin.' . $this->vFolder . '.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $user = User::find($id);
        return view('Admin.' . $this->vFolder . '.delete')->withUser($user);
    }

    public function update(Request $request, $id) {
        $this->validate($request, array(
            'name' => 'required|max:250',
            'password' => 'confirmed|min:6',
        ));

        $user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        if ($request->password != "") {
            $user->password = bcrypt($request->password);
        }
        $user->company_update = $request->company_update;
        $user->weekly_update = $request->weekly_update;
        $user->calender_update = $request->calender_update;
        $user->sector_update = $request->sector_update;
        $user->save();
        Session::flash('info', 'Updated successfully');
        return redirect('admin/' . $this->vFolder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id)->delete();
        Session::flash('danger', 'Deleted successfully');
        return redirect('admin/' . $this->vFolder);
    }

    function ajaxDetails($id) {
        $sector = Sector::find($id);
        $data['sector'] = $sector->name;
        $data['researches'] = $sector->sectorResearch;
        return $data;
    }

    function changePassword(Request $request) {
        $id = $request->user()->id;
        $user = User::find($id);
        if (Hash::check($request->old_password, $user->password)) {
            
        } else {
            Session::flash('danger', 'Your current password does not correct');
            return redirect('admin/myPrefrences');
        }

        $this->validate($request, array(
            'password' => 'required|confirmed|min:6',
        ));

        $user->password = bcrypt($request->password);
        $user->save();
        Session::flash('success', 'Password changed successfully');
        return redirect('admin/myPrefrences');
    }

}
