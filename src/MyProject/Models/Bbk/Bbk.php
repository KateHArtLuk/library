<?php 

namespace MyProject\Models\Bbk;

use MyProject\Models\ActiveRecordEntity;

class Bbk extends ActiveRecordEntity
{
	/** @var string */
	protected $bbk;
	/** @var string */
	protected $description;

	/**
	 * @return string
	 */
	public function getBbk(): string
	{
		return $this->bbk;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string 
	{
		return $this->description;
	}

	protected static function getTableName(): string 
	{
		return 'bbk';
	}
}