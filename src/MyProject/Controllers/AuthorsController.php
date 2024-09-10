<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Authors\Author;
use MyProject\Models\Books\Book;

class AuthorsController extends AbstractController
{
	public function authorsView(int $authorId)
	{
		$author = Author::getById($authorId);
		$books = Book::findAll();

		if ($author === null) {
			throw new NotFoundException();
		}

		$this->view->renderHtml('authors/view.php', [
			'author' => $author,
			'books' => $books
		]);
	}

	public function delete(int $authorId): void
	{
		$author = Author::getById($authorId);

		if ($author === null) {
			throw new NotFoundException();
		}

		$author->delete();
	}
}
