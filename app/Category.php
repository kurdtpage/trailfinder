<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//notice capital letter, and singular. this will look at the 'categorys' table
class Category extends Model
{
	protected $table = "category";
}
