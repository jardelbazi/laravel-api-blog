<?php

namespace App\Blog\Category\Infra\DB\Models;

use App\Blog\Category\Infra\DB\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'description',
		'slug',
		'is_active',
	];

	protected $attributes = [
		'is_active' => true,
	];

	protected static function newFactory(): CategoryFactory
	{
		return CategoryFactory::new();
	}
}
