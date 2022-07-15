<?php

namespace App\Blog\Category\Infra\Http\Adapters;

use App\Blog\Category\Domain\CategoryData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestCategoryAdapter extends CategoryData
{
	public function __construct(
		private Request $request
	)
	{
		parent::__construct(
			name: $this->request->input('name'),
			description: $this->request->input('description'),
			slug: Str::slug($this->request->input('name')),
			is_active: $this->request->input('is_active', true),
		);

		foreach ($this->request->all() as $key => $value)
			$this->setField($key, $value);
	}
}
