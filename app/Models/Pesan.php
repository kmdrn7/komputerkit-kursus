<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = "tbl_pesan";

	protected $primaryKey = "id_pesan";

	protected $dates = [
		'created_at',
		'updated_at',
	];

	protected $fillable = [
		'id_detail_kursus',
		'dari',
		'pesan',
		'flag_pesan',
		'flag_terkirim'
	];
}
