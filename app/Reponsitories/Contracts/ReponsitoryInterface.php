<?php
namespace App\Reponsitories\Contracts;


interface ReponsitoryInterface
{
	public function getAll();
	public function findID($id=null);
	// public function create($id =null, $attribute=array('*') );
	// public function update($id =null, $attribute=array('*') );
	 public function delete($id =null);
}
