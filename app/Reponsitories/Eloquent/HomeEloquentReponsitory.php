<?php
namespace App\Reponsitories\Eloquent;

use App\Reponsitories\Eloquent\abstractEloquentReponsitory;
use App\Reponsitories\Eloquent\HomeEloquentInterface;
use App\Models\Home;
class HomeEloquentReponsitory extends abstractEloquentReponsitory implements HomeEloquentInterface
{
	public function getModel()
	{
		return Home::class;
	}
	// implement chuc nang moi
	
}

