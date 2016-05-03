<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
	protected $table = 'api_keys';
	protected $guarded = ['id'];

	public static function isValid($uuid)
	{
		$uuidObject = self::whereUuid($uuid)->first();

		return ($uuidObject && $uuidObject->status === 'OK');
	}
}