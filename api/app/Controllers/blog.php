<?php

class Blog extends Controller
{

	public function index()
	{
		echo User::whereNull('deleted_at')->get();
	}	

	public function show($id)
	{
		echo User::where($id)->get();
	}

	public function store($blog)
	{
		return User::create($blog);
	}

	public function update($blog)
	{
		$id = $blog['id'];
		unset($blog['id']);
		return User::find($id)->update($blog);
	}

	public function delete($id)
	{
		return User::find(implode('',array_values($id)))->delete();
	}

}