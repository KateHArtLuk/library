<?php

namespace MyProject\Models\Books;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Authors\Author;
use MyProject\Models\PublishingHouses\PublishingHouse;
use MyProject\Models\Bbk\Bbk;

class Book extends ActiveRecordEntity
{
	/** @var string */
	protected $isbn;
	/** @var string */
	protected $name;
	/** @var int */
	protected $authorId;
	/** @var int */
	protected $bbkId;
	/** @var int */
	protected $publishHouseId;
	/** @var int */
	protected $yearPublishing;
	/** @var string */
	protected $hall;
	/** @var string */
	protected $shelf;
	/** @var string */
	protected $description;

	/**
	 * @return string
	 */
	public function getIsbn(): string
	{
		return $this->isbn;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return Author
	 */
	public function getAuthor(): Author
	{
		return Author::getById($this->authorId);
	}

	/**
	 * @return Bbk
	 */
	public function getBbk(): Bbk
	{
		return Bbk::getById($this->bbkId);
	}

	/**
	 * @return PublishingHouse
	 */
	public function getPublishHouse(): PublishingHouse
	{
		return PublishingHouse::getById($this->publishHouseId);
	}

	/**
	 * @return int
	 */
	public function getYearPublishing(): int
	{
		return $this->yearPublishing;
	}

	/**
	 * @return string
	 */
	public function getHall(): string
	{
		return $this->hall;
	}

	/**
	 * @return string
	 */
	public function getShelf(): string
	{
		return $this->shelf;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	public function setIsbn($isbn): void
	{
		$this->isbn = $isbn;
	}

	public function setName($name): void
	{
		$this->name = $name;
	}
	/**
	 * @param Author $author
	 */
	public function setAuthor(Author $author): void
	{
		$this->authorId = $author->getId();
	}

	/**
	 * @param Bbk $bbk
	 */
	public function setBbk(Bbk $bbk): void
	{
		$this->bbkId = $bbk->getId();
	}

	/**
	 * @param PublishingHouse $publishHouse
	 */
	public function setPublishHouse(PublishingHouse $publishHouse): void
	{
		$this->publishHouseId = $publishHouse->getId();
	}

	public function setYearPublishing($yearPublishing): void
	{
		$this->yearPublishing = $yearPublishing;
	}

	public function setHall($hall): void 
	{
		$this->hall = $hall;
	}

	public function setShelf($shelf): void 
	{
		$this->shelf = $shelf;
	}

	public function setDescription($description): void
	{
		$this->description = $description;
	}

	protected static function getTableName(): string
	{
		return 'books';
	}

	public static function createFromArray(array $fields): Book
	{
		if (empty($fields['isbn'])) {
			throw new InvalidArgumentException('Не передан ISBN');
		}
		if (empty($fields['name'])) {
			throw new InvalidArgumentException('Не передано название книги');
		}
		if (empty($fields['author'])) {
			throw new InvalidArgumentException('Не передан автор');
		}
		if (empty($fields['bbk'])) {
			throw new InvalidArgumentException('Не передан bbk');
		}
		if (empty($fields['publishHouse'])) {
			throw new InvalidArgumentException('Не передано издательство');
		}
		if (empty($fields['yearPublishing'])) {
			throw new InvalidArgumentException('Не передан год издания');
		}
		if (empty($fields['hall'])) {
			throw new InvalidArgumentException('Не передан зал');
		}
		if (empty($fields['shelf'])) {
			throw new InvalidArgumentException('Не передана полка');
		}
		if (empty($fields['description'])) {
			throw new InvalidArgumentException('Не передан текст статьи');
		}

		$book = new Book();
		$author = Author::getById($_POST['author']);
		$bbk = Bbk::getById($_POST['bbk']);
		$publishHouse = PublishingHouse::getById($_POST['publishHouse']);

		$book->setYearPublishing($fields['yearPublishing']);
		$book->setIsbn($fields['isbn']);
		$book->setAuthor($author);
		$book->setBbk($bbk);
		$book->setPublishHouse($publishHouse);
		$book->setHall($fields['hall']);
		$book->setShelf($fields['shelf']);
		$book->setName($fields['name']);
		$book->setDescription($fields['description']);

		$book->save();

		return $book;
	}

	public function updateFromArray(array $fields): Book
	{
		if (empty($fields['name'])) {
			throw new InvalidArgumentException('Не передано название книги');
		}

		if (empty($fields['description'])) {
			throw new InvalidArgumentException('Не передано описание книги');
		}

		$this->setName($fields['name']);
		$this->setDescription($fields['description']);

		$this->save();

		return $this;
	}
}
