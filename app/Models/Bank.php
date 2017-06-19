<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	protected $table 		= "tbl_bank";
	protected $primaryKey 	= "id_bank";

	protected $fillablle = [
	   'id_bank',
	   'nama_bank',
	   'atas_nama',
	   'no_rek',
	   'created_at',
	   'updated_at',
	];
}
