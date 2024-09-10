<?php include __DIR__ . '/../header.php'; ?>
<h1>Добавление новой книги</h1>
<?php if (!empty($error)) : ?>
	<div style="color: #FF77FF;"><?= $error ?></div>
<?php endif; ?>
<form action="/books/add" method="post">
	<label for="name">ISBN книги</label><br>
	<input type="text" name="isbn" id="isbn" value="<?= $_POST['isbn'] ?? '' ?>" size="50">
	<br><br>
	<label for="name">Название книги</label><br>
	<input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50">
	<br><br>
	<label for="author">Автор</label><br>
	<select name="author" id="author">
		<?php foreach ($authors as $author) : ?>
			<option value="<?= $author->getId() ?>"><?= $author->getFullName() ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>
	<label for="name">ББК</label><br>
	<select name="bbk">
		<?php foreach ($bbks as $bbk) : ?>
			<option value="<?= $bbk->getId() ?>"><?= $bbk->getBbk() ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>
	<label for="name">Издательство</label><br>
	<select name="publishHouse">
		<?php foreach ($publishHouses as $publishHouse) : ?>
			<option value="<?= $publishHouse->getId() ?>"><?= $publishHouse->getName() ?></option>
		<?php endforeach; ?>
	</select>
	<br><br>
	<label for="name">Зал</label><br>
	<input type="text" name="hall" id="hall" value="<?= $_POST['hall'] ?? '' ?>" size="50"><br>
	<br>
	<label for="name">Полка</label><br>
	<input type="text" name="shelf" id="shelf" value="<?= $_POST['shelf'] ?? '' ?>" size="50"><br>
	<br>
	<label for="name">Год издания</label><br>
	<input type="text" name="yearPublishing" id="yearPublishing" value="<?= $_POST['yearPublishing'] ?? '' ?>" size="50"><br>
	<br>
	<label for="text">Описание книги</label><br>
	<textarea name="description" id="description" rows="10" cols="80"><?= $_POST['description'] ?? '' ?></textarea><br>
	<br>
	<input type="submit" value="Создать">
</form>
<?php include __DIR__ . '/../footer.php'; ?>