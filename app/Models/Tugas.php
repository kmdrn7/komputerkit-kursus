<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
	protected $table = "tbl_tugas";
	protected $primaryKey = "id_tugas";
	public $timestamps = false;

	protected $fillable = [
		'id_kursus',
		'tugas',
		'ket_tugas',
		'jawaban_benar',
		'nilai_patokan',
		'flag_tugas',		
	];
}
