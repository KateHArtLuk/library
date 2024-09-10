<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>Библиотека</title>
	<link rel="stylesheet" href="/styles.css">
</head>

<body>

	<table class="layout">
		<tr>
			<td colspan="2" class="header">
				Библиотека
			</td>
		</tr>
		<tr>
			
			<td colspan="2" style="text-align: right">
				<?php if (!empty($user)) : ?>
					Привет, <a href="http://registrapplication/users/<?= $user->getId() ?>"><?= $user->getLogin() ?></a> | <a href="http://registrapplication/users/logOut">Выйти</a>
				<?php else : ?>
					<a href="http://registrapplication/users/login">Войти</a> | <a href="http://registrapplication/users/register">Зарегистрироваться</a>
				<? endif; ?>
			</td>
		</tr>
		<tr>
			<td>
				