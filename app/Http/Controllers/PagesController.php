<?php 

namespace App\Http\Controllers;

class PagesController extends Controller{
	public function getIndex(){
		return view('Pages/welcome');
	}
	public function getAbout(){
		$data['title']="About";
		$data['name']="HAMZA ASLAM";
		$data['email']="imhamza@outlook.com";
		return view('Pages/about')->withData($data);
	}
	public function getContact(){
		$data['title']="Contact";
		return view('Pages/contact')->withData($data);
	}

	public function postContact(){
		
	}
}