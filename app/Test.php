<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
	protected $table = 'tbl_test';
	protected $primaryKey = 'id_test';
	public $timestamps = false;

	protected $fillable = [
		'time_from',
		'time_to',
	];

	protected $dates = [
		'time_from',
		'time_to',
	];
}
