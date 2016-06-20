<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Company;
use App\Models\Sector;
use App\Models\Research;
use App\Models\Event;
use Session;
class UserController extends Controller
{
    public $vFolder="user";
    function __construct(){
         $this->middleware('user');
    }

    function index(){
    	 $researches=Research::all();
    	return view('Admin.index')->withResearches($researches);
    }

    function registerAdminGet(){

    }
    function registerUserGet(){
    	
    }
    

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.user.new');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,array(
                'name'=>'required|max:250',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ));
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=bcrypt($request->password);
        $user->save();
         Session::flash('uccess','Saved successfully');
        return redirect('admin/'.$this->vFolder);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('Admin.'.$this->vFolder.'.detail')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user=User::find($id);
        return view('Admin.'.$this->vFolder.'.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $user=User::find($id);
        return view('Admin.'.$this->vFolder.'.delete')->withUser($user);
    }
    public function update(Request $request, $id)
    {
         $this->validate($request,array(
                'name'=>'required|max:250',
                'password' => 'confirmed|min:6',
            ));

        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        if($request->password!=""){
            $user->password=bcrypt($request->password);
        }
        $user->save();
        Session::flash('info','Updated successfully');
        return redirect('admin/'.$this->vFolder);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    function myPrefrences(Request $request){
        $user = $request->user();
        return view('user.prefrences')->withUser($user);
        
    }
    function myPrefrencesPost(Request $request){
        $id=$request->id;
        $user=User::find($id);
        $user->company_update=$request->company_update;
        $user->weekly_update=$request->weekly_update;
        $user->calender_update=$request->calender_update;
        $user->sector_update=$request->sector_update;
        $user->save();
        Session::flash('success','Saved successfully');
        return redirect('user/myPrefrences');        
        
    }
    function changePassword(Request $request){
        $this->validate($request,array(
                
                'password' => 'required|confirmed|min:6',
            ));
        $id=$request->user()->id;
        $user= User::find($id);
        $user->password=bcrypt($request->password);
        $user->save();
        Session::flash('success','Saved successfully');
        return redirect('user/myPrefrences');    
    }
    public function company()
    {
        $company=Company::all();
        //return view('admin.company.list')->withData($company);

        return view('user.company.list')->withData($company);
    }

    public function sector()
    {
        $sector=Sector::all();
        //return view('admin.'.$this->vFolder.'.list')->withData($sector);
        return view('user.sector.list')->withData($sector);
    
    }

    public function research()
    {
        $research=Research::all();
        return view('user.research.list')->withData($research);
    }

    public function event()
    {
        $event=Event::all();
        return view('user.event.list')->withData($event);
    }

    function ajaxDetailsCompany($id){
         $data['company']=Company::find($id);
         $data['researches']=$data['company']->companyResearch;
         return $data;

    }

    function ajaxDetailsSector($id){
        $sector= Sector::find($id);
        $data['sector']=$sector->name;
        $data['researches']= $sector->sectorResearch;
        return $data;
    }
    function ajaxDetailsEventSingle($id){
        return Event::find($id);
    }
    function ajaxDetailsEvents(){
        return Event::all();
    }

}
