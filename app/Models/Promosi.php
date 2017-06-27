<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    protected $table = 'tbl_promosi';
	protected $primaryKey = 'id_promosi';

	protected $dates = [
		'created_at',
		'updated_at',
	];

	protected $fillable = [
		'promosi',
		'ket_promosi',
		'gambar',
		'flag'
	];
}
