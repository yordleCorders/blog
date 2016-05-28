<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Blog extends Eloquent
{
	protected $table = 'articles';

	protected $fillable = [
		'title',
		'description',
		'date',
		'author',
		'meta_tags',
		'reference'
	];
}