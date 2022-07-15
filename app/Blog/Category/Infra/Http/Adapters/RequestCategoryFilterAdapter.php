<?php

namespace App\Blog\Category\Infra\Http\Adapters;

use App\Blog\Category\Domain\CategoryFilter;
use Illuminate\Http\Request;

class RequestCategoryFilterAdapter extends CategoryFilter
{
	public function __construct(
		Request $request
	) {
		parent::__construct(
			id: $request->route('id', $request->input('id')),
		);
	}
}
