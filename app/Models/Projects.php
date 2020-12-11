<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @property mixed id
 * @property mixed name
 * @property mixed description
 */
class Projects extends Model {

	use HasFactory;

	protected $table = 'projects';
	protected $fillable = [
		'id',
		'name',
		'description'
	];
}
