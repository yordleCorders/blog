<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
	protected $table = 'contacts';

	protected $fillable = [
		'name',
		'number',
		'email'
	];
}