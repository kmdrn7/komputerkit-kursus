<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QBookmark extends Model
{
    protected $table = "q_bookmark";
	protected $primaryKey = "id_bookmark";
	public $timestamps = false;
}
