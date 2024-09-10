<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\ForbiddenException;
use MyProject\Models\Books\Book;
use MyProject\Models\Authors\Author;
use MyProject\Models\Bbk\Bbk;
use MyProject\Models\PublishingHouses\PublishingHouse;

class BooksController extends AbstractController
{
	public function view(int $bookId)
	{
		$book = Book::getById($bookId);

		if ($book === null) {
			throw new NotFoundException();
		}

		$this->view->renderHtml('books/view.php', [
			'book' => $book
		]);
	}

	public function edit(int $bookId): void
	{
		/** @var Book $book */
		$book = Book::getById($bookId);

		if ($book === null) {
			throw new NotFoundException();
		}

		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if (!$this->user->isAdmin()) {
			throw new ForbiddenException();
		}

		if (!empty($_POST)) {
			try {
				$book->updateFromArray($_POST);
			} catch (InvalidArgumentException $e) {
				$this->view->renderHtml('books/edit.php', ['error' => $e->getMessage(), 'book' => $book]);
				return;
			}

			header('Location: /books/' . $book->getId(), true, 302);
			exit();
		}

		$this->view->renderHtml('books/edit.php', ['book' => $book]);
	}

	public function delete(int $bookId): void
	{
		$book = Book::getById($bookId);

		if ($book === null) {
			throw new NotFoundException();
		}

		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if (!$this->user->isAdmin()) {
			throw new ForbiddenException();
		}

		$book->delete();
		$this->view->renderHtml('books/delete.php');
	}

	public function add(): void
	{
		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if (!$this->user->IsAdmin()) {
			throw new ForbiddenException();
		}

		if (!empty($_POST)) {
			try {
				$book = Book::createFromArray($_POST);
			} catch (InvalidArgumentException $e) {
				$this->view->renderHtml('books/add.php', ['error' => $e->getMessage()]);
				return;
			}

			header('Location: /books/' . $book->getId(), true, 302);
			exit();
		}

		$authors = Author::findAll();
		$bbks = Bbk::findAll();
		$publishHouses = PublishingHouse::findAll();

		$this->view->renderHtml('books/add.php', [
			'authors' => $authors,
			'bbks' => $bbks,
			'publishHouses' => $publishHouses
		]);
	}
}
