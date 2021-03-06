<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    protected $table 		= "tbl_kursus";
	protected $primaryKey 	= "id_kursus";
	public $timestamps 		= false;
	public $incrementing	= false;

	protected $fillablle = [
		'id_kursus',
		'slug',
		'kursus',
		'kategori',
		'waktu',
		'ket_kursus',
		'harga',
		'gambar',
		'pembimbing',
		'warna',
	];

	protected $guarded = [];

	public function mtr()
	{
		return $this->hasMany('App\Models\QDetailMateri', 'id_kursus');
	}
}
