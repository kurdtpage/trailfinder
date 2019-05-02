<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //needed for $request (see below)
use App\Track; //needed for db

class TrackController extends Controller
{
	public function create(Request $request){ //same as $_REQUEST[]
		$track = new Track();
		$track->text = $request->text;
		$track->description = $request->description;
		$track->directions = $request->directions;
		$track->gps_start_x = $request->gps_start_x;
		$track->gps_start_y = $request->gps_start_y;
		$track->gps_end_x = $request->gps_end_x;
		$track->gps_end_y = $request->gps_end_y;
		$track->category_id = $request->category;
		
		$track->save();
		return redirect('/');
	}
	
	public function view($trackId){
		$track = Track::findOrFail($trackId);
		//echo $track->title;
		return view('track', [
			'track' => $track
		]);
	}
}
