<?php

namespace App\Libs\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

abstract class RequestValidator
{
	public function __construct(
		protected Request $request
	) {
	}

	public function validate(): void
	{
		$data = $this->request->all();
		$rules = $this->getRules();

		FacadesValidator::make($data, $rules)->validate();
	}

	abstract public function getRules(): array;

	protected function mergeValidator(string $mainKey, RequestValidator $validator): array
	{
		$rules = $this->getRules();

		foreach ($validator->getRules() as $key => $value)
			$rules["$mainKey.$key"] = $value;

		return $rules;
	}
}
