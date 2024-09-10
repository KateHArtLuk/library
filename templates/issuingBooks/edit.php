<?php include __DIR__ . '/../header.php'; ?>
<h1>Редактирование карточки выдачи</h1>
<?php if (!empty($error)) : ?>
	<div style="color: #FF77FF;"><?= $error ?></div>
<?php endif; ?>
<form action="/issuingbooks" method="post">
	<label for="book">Книга</label><br>
	<select name="book" id="book">
		<?php foreach ($books as $book) : ?>
			<option value="<?= $book->getId() ?>"><?= $book->getName() ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>
	<label for="user">Пользователь</label><br>
	<select name="user" id="user">
		<?php foreach ($users as $user) : ?>
			<option value="<?= $user->getId() ?>"><?= $user->getLogin() ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>
	<label for="description">Дата выдачи</label><br>
	<input type="date" name="dateIssue" id="dateIssue" value="<?= $_POST['dateIssue'] ?? $issuingBook->getDateIssue() ?>" size="50"><br>
	<br>
	<label for="dateReturn">Дата возврата</label><br>
	<input type="date" name="dateReturn" id="dateReturn" value="<?= $_POST['dateReturn'] ?? $issuingBook->getDateReturn() ?>" size="50"><br>
	<br>
	<label for="returned">Возвращена</label><br>
	<input type="radio" name="returned" id="1" value="1" rows="10" cols="80">Да</input><br>
	<input type="radio" name="returned" id="0" value="0" rows="10" cols="80" checked>Нет</input><br>
	<br>
	<input type="submit" value="Обновить">
</form>
<?php include __DIR__ . '/../footer.php'; ?>