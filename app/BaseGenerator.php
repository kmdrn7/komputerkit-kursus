<?php

namespace App;

use Illuminate\Http\Request;

class BaseGenerator
{
    public static function public_path()
    {
		if ( env('APP_ENV') == 'prod' || env('APP_ENV') == 'production' ) {
			return '../../public_html/kursus';
		}

		return public_path();
    }
}
