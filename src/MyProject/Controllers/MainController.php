<?php

namespace MyProject\Controllers;

use MyProject\Models\Authors\Author;
use MyProject\Models\Books\Book;
use MyProject\Models\Users\User;
use MyProject\Exceptions\ForbiddenException;
use MyProject\Models\IssuingBooks\IssuingBook;

class MainController extends AbstractController
{
	public function main()
	{
		$books = Book::findAll();
		$this->view->renderHtml('main/main.php', ['books' => $books]);
	}

	public function authors()
	{
		$authors = Author::findAll();
		$this->view->renderHtml('main/authors.php', ['authors' => $authors]);
	}

	public function users() 
	{
		if (!$this->user->IsAdmin()) {
			throw new ForbiddenException();
		}
		
		$users = User::findAll();
		$this->view->renderHtml('main/users.php', ['users' => $users]);
	}

	public function issuingBooks()
	{
		if (!$this->user->IsAdmin()) {
			throw new ForbiddenException();
		}

		$issuingBooks = IssuingBook::findAll();
		$this->view->renderHtml('main/issuingBooks.php', [
			'issuingBooks' => $issuingBooks
		]);
	}
}
