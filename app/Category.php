<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//notice capital letter, and singular. this will look at the 'categorys' table
class Category extends Model
{
	protected $table = "categorys";
	function category()
	{
		return $this->belongsTo('App\Track', 'category_id', 'id');
	}
}
