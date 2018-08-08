<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class startup extends Model
{
		protected $table    ='startups';
		protected $fillable = [
		'title', 'description', 'link','category',
		];

}
