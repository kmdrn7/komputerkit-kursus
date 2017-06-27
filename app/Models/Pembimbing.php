<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
	protected $table = 'tbl_pembimbing';
	protected $primaryKey = 'id_pembimbing';
	public $timestamps = false;

	protected $fillable = [
		'pembimbing',
		'keahlian',
	];
}
