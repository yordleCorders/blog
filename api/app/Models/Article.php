<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Article extends Eloquent
{
	protected $table = 'articles';

	protected $fillable = [
		'title',
		'description',
		'author',
		'meta_tags',
		'reference'
	];
}