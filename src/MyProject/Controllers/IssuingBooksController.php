<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\ForbiddenException;
use MyProject\Models\IssuingBooks\IssuingBook;
use MyProject\Models\Books\Book;
use MyProject\Models\Users\User;

class IssuingBooksController extends AbstractController
{
	public function edit(int $issuingBookId): void
	{
		/** @var Book $book */
		$issuingBook = IssuingBook::getById($issuingBookId);

		if ($issuingBook === null) {
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
				$issuingBook->updateFromArray($_POST);
			} catch (InvalidArgumentException $e) {
				$this->view->renderHtml('issuingBooks/edit.php', ['error' => $e->getMessage(), 'issuingBook' => $issuingBook]);
				return;
			}

			header('Location: /issuingBooks', true, 302);
			exit();
		}

		$users = User::findAll();
		$books = Book::findAll();

		$this->view->renderHtml('issuingBooks/edit.php', [
			'issuingBook' => $issuingBook,
			'books' => $books,
			'users' => $users
		]);
	}
}
