<?php

namespace App\Libs\Traits;

trait SetField{
	private array $modifiedData = [];

	public function setField(string $field, mixed $value): self
	{
		$this->{$field} = $value;
		$this->modifiedData[$field] = $value;
		return $this;
	}

	public function onlyModifiedData(): array
	{
		return $this->modifiedData;
	}

	public function hasModifiedData(): bool
	{
		return filled($this->modifiedData);
	}
}
