<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

	public $table = "tbl_user";
	protected $primaryKey = "id_user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'nickname',
		'email',
		'password',
		'token',
		'status',
		'sekolah',
		'alamat',
		'tgl_lahir',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
		'remember_token',
    ];

	protected $dates = [
		'created_at',
		'updated_at',
		'session_time',
	];

	public function detailkursus()
	{
		return $this->hasMany('App\Models\QDetailKursus', 'id_user');
	}

	public function detailBayar()
	{
		return $this->hasMany('App\Models\QDetailBayar', 'id_user');
	}

	public function bookmark()
	{
		return $this->hasMany('App\Models\QBookmark', 'id_user');
	}
}
