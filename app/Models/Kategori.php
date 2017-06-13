<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tbl_kategori';
	protected $primaryKey = 'id_kategori';
	public $timestamps = false;

	protected $fillable = [
		'kategori',
		'slug',
	];
}
