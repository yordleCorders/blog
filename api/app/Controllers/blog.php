<?php


class Blog
{
	protected $array = [];

	public function index()
	{
		echo "Index Ok";
	}	

	public function create($array)
	{
		var_dump($array);
	}
}