<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTugas extends Model
{
	protected $table = "tbl_detail_tugas";
	protected $primaryKey = "id_detail_tugas";
	public $timestamps = false;

	protected $fillable = [
		'id_detail_kursus',
		'id_user',
		'id_tugas',
		'jawaban',
		'nilai_siswa',
		'flag'
	];

	protected $guarded = [];
}
