<?php

namespace MyProject\Models\Authors;

use MyProject\Models\ActiveRecordEntity;

class Author extends ActiveRecordEntity
{
	/** @var string */
	protected $fullName;
	/** @var string */
	protected $pseudonym;
	/** @var string */
	protected $birthday;
	/** @var string */
	protected $birthplace;
	/** @var string */
	protected $dateDeath;
	/** @var string */
	protected $placeDeath;
	/** @var string */
	protected $yearsCreativity;

	/**
	 * @return string
	 */
	public function getFullName(): string 
	{
		return $this->fullName;
	}

	/**
	 * @return string
	 */
	public function getPseudonym(): string 
	{
		return $this->pseudonym;
	}

	/**
	 * @return string
	 */
	public function getBirthday()
	{
		return $this->birthday;
	}

	/**
	 * @return string
	 */
	public function getBirthplace(): string
	{
		return $this->birthplace;
	}

	/**
	 * @return string
	 */
	public function getDateDeath()
	{
		return $this->dateDeath;
	}

	/**
	 * @return string
	 */
	public function getPlaceDeath(): string 
	{
		return $this->placeDeath;
	}

	/**
	 * @return string
	 */
	public function getYearsCreativity(): string 
	{
		return $this->yearsCreativity;
	}

	protected static function getTableName(): string 
	{
		return 'authors';
	}
}