<?php
namespace App\Reponsitories\Eloquent\Startup;
use App\Reponsitories\Eloquent\abstractEloquentReponsitory;
use App\Reponsitories\Eloquent\Startup\startupEloquentInterface;
use App\Models\startup;

class StartupEloquentReponsitory extends abstractEloquentReponsitory implements startupEloquentInterface
{
	public function getModel()
	{
		return startup::class;
	}
}