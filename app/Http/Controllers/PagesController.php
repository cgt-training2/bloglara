<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function getIndex(){
    	$first="Vaibhav";
    	$last="Sharma";
    	$fullname=$first." ".$last;
    	return view('pages.welcome')->withFullname($fullname);
    	// return view('welcome')->with('fullname',$fullname);
    	// return view('welcome')->withFullname($fullname);

	}
	public function getAbout(){
		return view('pages.about');

	}
	public function getContact(){
		return view('pages.contacts');

	}
}
