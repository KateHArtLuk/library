<?php 

return [
	'~^books/(\d+)$~' => [\MyProject\Controllers\BooksController::class, 'view'],
	'~^books/(\d+)/edit$~' => [\MyProject\Controllers\BooksController::class, 'edit'],
	'~^books/(\d+)/delete$~' => [\MyProject\Controllers\BooksController::class, 'delete'],
	'~^books/add$~' => [\MyProject\Controllers\BooksController::class, 'add'],
	'~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
	'~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
	'~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
	'~^users/logOut~' => [\MyProject\Controllers\UsersController::class, 'logOut'],
	'~^users/(\d+)/delete$~' => [\MyProject\Controllers\UsersController::class, 'delete'],
	'~^users/(\d+)$~' => [\MyProject\Controllers\UsersController::class, 'view'],
	'~^users$~' => [\MyProject\Controllers\MainController::class, 'users'],
	'~^authors/(\d+)/delete$~' => [\MyProject\Controllers\AuthorsController::class, 'delete'],
	'~^authors/(\d+)$~' => [\MyProject\Controllers\AuthorsController::class, 'authorsView'],
	'~^authors$~' => [\MyProject\Controllers\MainController::class, 'authors'],
	'~^issuingbooks/(\d+)/edit$~' => [\MyProject\Controllers\IssuingBooksController::class, 'edit'],
	'~^issuingbooks$~' => [\MyProject\Controllers\MainController::class, 'issuingBooks'],
	'~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];