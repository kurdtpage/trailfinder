<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//notice capital letter, and singular. this will look at the 'tracks' table
class Track extends Model
{
	protected $table = "track";
}
