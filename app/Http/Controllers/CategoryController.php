<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //needed for $request (see below)
use App\Category; //needed for db

class CategoryController extends Controller
{
	
	public function view(){
		$category = Category::all();
		
		return view('category', [
			'categorys' => $category
		]);
	}
}
