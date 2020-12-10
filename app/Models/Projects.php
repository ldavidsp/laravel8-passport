<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Projects extends Model {

	use HasFactory;

	protected $table = 'projects';
	protected $fillable = [
		'name',
		'description'
	];
}
