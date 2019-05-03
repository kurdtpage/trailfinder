<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//notice capital letter, and singular. this will look at the 'tracks' table
class Track extends Model
{
	public function category()
	{
		return $this->hasMany('App\Category', 'id', 'category_id');
	}
}
