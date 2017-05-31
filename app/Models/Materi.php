<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "tbl_materi";
	protected $primaryKey = "id_materi";
	public $timestamps = false;
}
