<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "tbl_materi";
	protected $primaryKey = "id_materi";
	public $timestamps = false;

	protected $fillable = [
		'id_kursus',
		'no_urut',
		'materi',
		'ket_materi',
		'ket_materi_adv',
		'target_kursus',
		'contoh_pekerjaan',
		'yt_embed',
		'yt_id',
		'paket',
	];
}
