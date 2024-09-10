<?php

namespace MyProject\Models\PublishingHouses;

use MyProject\Models\ActiveRecordEntity;

class PublishingHouse extends ActiveRecordEntity
{
	/** @var string */
	protected $name;
	/** @var string */
	protected $founder;
	/** @var string */
	protected $address;
	/** @var int */
	protected $yearFoundation;
	/** @var int */
	protected $yearClosing;

	/** 
	 * @return string
	 */
	public function getName(): string 
	{
		return $this->name;
	}

	/** 
	 * @return string
	 */
	public function getFounder(): string 
	{
		return $this->address;
	}

	/** 
	 * @return string
	 */
	public function getAddress(): string 
	{
		return $this->address;
	}

	/** 
	 * @return int
	 */
	public function getYearFoundation(): int 
	{
		return $this->yearFoundation;
	}

	/** 
	 * @return int
	 */
	public function getYearClosing(): int 
	{
		return $this->yearClosing;
	}

	protected static function getTableName(): string
	{
		return 'publishing_house';
	}
}