<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table = 'tbl_bayar';
	protected $primaryKey = 'id_bayar';

	protected $dates = [
		'created_at',
		'updated_at',
		'tgl_mulai',
		'tgl_bayar',
	];

	protected $fillable = [
		'id_user',
		'id_detail_kursus',
		'faktur',
		'atas_nama',
		'nama_bank',
		'bank_tujuan',
		'ket_bayar',
		'tgl_bayar',
		'status',
	];
}
