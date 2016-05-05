<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
	protected $table = 'api_keys';
	protected $guarded = ['id'];
	protected $hidden = ['id', 'email_check', 'email_retries', 'created_at', 'updated_at'];

	public static function isValid($uuid)
	{
		$uuidObject = self::whereUuid($uuid)->first();

		return ($uuidObject && $uuidObject->status === 'OK');
	}
}