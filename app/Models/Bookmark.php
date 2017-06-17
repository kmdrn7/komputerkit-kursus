<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
	protected $table = "tbl_bookmark";
	protected $primaryKey = "id_bookmark";

	protected $fillable = [
		'id_kursus',
		'id_user',
	];

	protected $guarded = [];
}
