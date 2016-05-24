<?php

class Blog
{
	public function index()
	{
		echo "Index Ok";
	}	

	public function create($array)
	{
		echo 'This are my array';
		var_dump($array);
	}
}