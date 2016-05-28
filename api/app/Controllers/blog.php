<?php

class Blog extends Controller
{

	public function index()
	{
		echo Article::whereNull('deleted_at')->get();
	}	

	public function show($id)
	{
		echo Article::where($id)->where('deleted_at', null)->get();
	}

	public function store($blog)
	{
		return Article::create($blog);
	}

	public function update($blog)
	{
		$id = $blog['id'];
		unset($blog['id']);
		return Article::find($id)->update($blog);
	}

	public function delete($id)
	{
		return Article::find(implode('',array_values($id)))->delete();
	}

}