<?php

namespace MyProject\Models\IssuingBooks;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Models\Books\Book;
use MyProject\Exceptions\InvalidArgumentException;

class IssuingBook extends ActiveRecordEntity
{
	/** @var int */
	protected $bookId;
	/** @var int */
	protected $userId;
	/** @var string */
	protected $dateIssue;
	/** @var string */
	protected $dateReturn;
	/** @var int */
	protected $returned;

	/**
	 * @return Book
	 */
	public function getBook(): Book 
	{
		return Book::getById($this->bookId);
	}
	/**
	 * @return User
	 */
	public function getUser(): User 
	{
		return User::getById($this->userId);
	}

	/**
	 * @return string
	 */
	public function getDateIssue(): string 
	{
		return $this->dateIssue;
	}

	/**
	 * @return string
	 */
	public function getDateReturn(): string 
	{
		return $this->dateReturn;
	}

	/**
	 * @return int
	 */
	public function getReturned(): int
	{
		return $this->returned;
	}

	protected static function getTableName(): string
	{
		return 'issuing_books';
	}

	public function setBook(Book $book): void 
	{
		$this->bookId = $book->getId();
	}

	public function setUser(User $user): void
	{
		$this->userId = $user->getId();
	}

	public function setDateIssue($dateIssue)
	{
		$this->dateIssue = $dateIssue;
	}

	public function setDateReturn($dateReturn)
	{
		$this->dateReturn = $dateReturn;
	}

	public function setReturned(int $returned)
	{
		$this->returned = $returned;
	}

	public function updateFromArray(array $fields): IssuingBook
	{
		if (empty($fields['book'])) {
			throw new InvalidArgumentException('Не передано название книги');
		}

		if (empty($fields['user'])) {
			throw new InvalidArgumentException('Не передан пользователь');
		}

		if (empty($fields['dateIssue'])) {
			throw new InvalidArgumentException('Не передана дата выдачи книги');
		}

		if (empty($fields['dateReturn'])) {
			throw new InvalidArgumentException('Не передана дата возврата книги');
		}

		if (empty($fields['returned'])) {
			throw new InvalidArgumentException('Не передано, возвращена ли книга');
		}

		$book = Book::getById($_POST['book']);
		$user = User::getById($_POST['user']);

		$this->setBook($book);
		$this->setUser($user);
		$this->setDateIssue($fields['dateIssue']);
		$this->setDateReturn($fields['dateReturn']);
		$this->setReturned($fields['returned']);

		$this->save();

		return $this;
	}
}