<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $table = 'tbl_keahlian';
	protected $primaryKey = 'id_keahlian';
	public $timestamps = false;

	protected $fillable = [
		'keahlian',
		'desc_keahlian',
		'gambar'
	];

}
