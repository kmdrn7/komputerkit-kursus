<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table = 'tbl_bayar';
	protected $primaryKey = 'id_bayar';
	public $timestamps = false;

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
