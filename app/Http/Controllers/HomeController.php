<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track; //added for accessing db. "track" is the table name
use App\Category;

class HomeController extends Controller
{
  public function index(){
		$tracks = Track::all(); //get all tracks
		$categorys = Category::all(); //get all categorys
		
		return view('home', [
			'tracks' => $tracks
			,'categorys' => $categorys
		]); //show homepage and pass data in
	}
}
