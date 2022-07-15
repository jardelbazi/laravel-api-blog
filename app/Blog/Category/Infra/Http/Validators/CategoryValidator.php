<?php

namespace App\Blog\Category\Infra\Http\Validators;

use App\Libs\Validators\RequestValidator;

class CategoryValidator extends RequestValidator
{
    public function getRules(): array
	{
		return [
			'name' => 'required|max:255|min:2',
			'description' => 'nullable',
		];
	}
}
