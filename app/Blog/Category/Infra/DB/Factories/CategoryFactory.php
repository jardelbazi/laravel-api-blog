<?php

namespace App\Blog\Category\Infra\DB\Factories;

use App\Blog\Category\Infra\DB\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
	protected $model = Category::class;

	public function definition(): array
	{
		$name = $this->faker->text();

		return [
			'name' => $name,
			'descriprion' => $this->faker->paragraph(),
			'slug' => Str::slug($name),
			'is_active' => $this->faker->boolean(),
		];
	}
}
