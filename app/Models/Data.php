<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'dni'
	];

	protected $table = 'data';
	protected $primaryKey = 'id';
	public $timestamps = false;

}
