<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    protected $table = 'tbl_promosi';
	protected $primaryKey = 'id_promosi';
	public $timestamps = false;

	protected $fillable = [
		'promosi',
		'ket_promosi',
		'gambar',
		'flag'
	];
}
